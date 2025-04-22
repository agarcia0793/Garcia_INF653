const Student = require('../models/Student');

exports.getAllStudents = async (req, res) => {
  const students = await Student.find();
  res.json(students);
};

exports.getStudentById = async (req, res) => {
  const student = await Student.findById(req.params.id);
  student ? res.json(student) : res.status(404).json({ msg: 'Not found' });
};

exports.createStudent = async (req, res) => {
  try {
    const student = new Student(req.body);
    await student.save();
    res.status(201).json(student);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
};

exports.updateStudent = async (req, res) => {
  const student = await Student.findByIdAndUpdate(req.params.id, req.body, { new: true });
  student ? res.json(student) : res.status(404).json({ msg: 'Not found' });
};

exports.deleteStudent = async (req, res) => {
  const result = await Student.findByIdAndDelete(req.params.id);
  result ? res.json({ msg: 'Deleted successfully' }) : res.status(404).json({ msg: 'Not found' });
};
