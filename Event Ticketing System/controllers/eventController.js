import Event from '../models/Event.js';

export const getAllEvents = async (req, res) => {
  try {
    const { category, date } = req.query;
    let query = {};
    if (category) query.category = category;
    if (date) query.date = new Date(date);

    const events = await Event.find(query);
    res.json(events);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch events' });
  }
};

export const getEventById = async (req, res) => {
  try {
    const event = await Event.findById(req.params.id);
    if (!event) return res.status(404).json({ error: 'Event not found' });
    res.json(event);
  } catch (err) {
    res.status(500).json({ error: 'Failed to fetch event' });
  }
};

export const createEvent = async (req, res) => {
  try {
    const event = await Event.create(req.body);
    res.status(201).json(event);
  } catch (err) {
    res.status(400).json({ error: 'Invalid event data' });
  }
};

export const updateEvent = async (req, res) => {
  try {
    const event = await Event.findById(req.params.id);
    if (!event) return res.status(404).json({ error: 'Event not found' });

    if (req.body.seatCapacity < event.bookedSeats) {
      return res.status(400).json({ error: 'seatCapacity cannot be less than bookedSeats' });
    }

    Object.assign(event, req.body);
    const updated = await event.save();
    res.json(updated);
  } catch (err) {
    res.status(400).json({ error: 'Update failed' });
  }
};

export const deleteEvent = async (req, res) => {
  try {
    const event = await Event.findById(req.params.id);
    if (!event) return res.status(404).json({ error: 'Event not found' });

    // TODO: Optionally check for existing bookings and block or cascade
    await event.remove();
    res.json({ message: 'Event deleted' });
  } catch (err) {
    res.status(500).json({ error: 'Delete failed' });
  }
};
