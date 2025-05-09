import express from 'express';
import {
  getUserBookings,
  getBookingById,
  createBooking
} from '../controllers/bookingController.js';
import { protect } from '../middlewares/auth.js';

const router = express.Router();

router.use(protect);
router.get('/', getUserBookings);
router.get('/:id', getBookingById);
router.post('/', createBooking);

export default router;