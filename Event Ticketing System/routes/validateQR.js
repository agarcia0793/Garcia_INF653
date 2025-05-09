import express from 'express';
import Booking from '../models/Booking.js';

const router = express.Router();

router.get('/validate/:qr', async (req, res) => {
  try {
    const qr = decodeURIComponent(req.params.qr);
    const booking = await Booking.findOne({ qrCode: qr }).populate('event');
    if (!booking) return res.status(404).json({ valid: false, error: 'Invalid or expired QR code' });
    res.json({ valid: true, booking });
  } catch (err) {
    res.status(400).json({ valid: false, error: 'Validation failed' });
  }
});

export default router;