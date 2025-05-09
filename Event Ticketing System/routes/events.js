import express from 'express';
import {
  getAllEvents,
  getEventById,
  createEvent,
  updateEvent,
  deleteEvent
} from '../controllers/eventController.js';
import { protect, adminOnly } from '../middlewares/auth.js';

const router = express.Router();

router.get('/', getAllEvents);
router.get('/:id', getEventById);
router.post('/', protect, adminOnly, createEvent);
router.put('/:id', protect, adminOnly, updateEvent);
router.delete('/:id', protect, adminOnly, deleteEvent);

export default router;