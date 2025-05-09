import Booking from '../models/Booking.js';
import Event from '../models/Event.js';
import generateQR from '../utils/generateQR.js';
import sendEmail from '../utils/sendEmail.js';

export const getUserBookings = async (req, res) => {
  try {
    const bookings = await Booking.find({ user: req.user._id }).populate('event');
    res.json(bookings);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch bookings' });
  }
};

export const getBookingById = async (req, res) => {
  try {
    const booking = await Booking.findOne({ _id: req.params.id, user: req.user._id }).populate('event');
    if (!booking) return res.status(404).json({ error: 'Booking not found' });
    res.json(booking);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch booking' });
  }
};

export const createBooking = async (req, res) => {
  const { event: eventId, quantity } = req.body;
  try {
    const event = await Event.findById(eventId);
    if (!event) return res.status(404).json({ error: 'Event not found' });

    if (event.bookedSeats + quantity > event.seatCapacity) {
      return res.status(400).json({ error: 'Not enough seats available' });
    }

    const qrData = `${req.user._id}_${eventId}_${Date.now()}`;
    const qrCode = await generateQR(qrData);

    const booking = await Booking.create({
      user: req.user._id,
      event: eventId,
      quantity,
      qrCode
    });

    event.bookedSeats += quantity;
    await event.save();

    // Email confirmation
    const subject = 'Your Event Booking Confirmation';
    const html = `<h2>Booking Confirmed</h2>
      <p>Event: ${event.title}</p>
      <p>Quantity: ${quantity}</p>
      <p>Date: ${event.date.toDateString()}</p>
      <img src="${qrCode}" alt="QR Code" />`;

    await sendEmail(req.user.email, subject, html);

    res.status(201).json(booking);
  } catch (err) {
    res.status(400).json({ error: 'Booking failed' });
  }
};