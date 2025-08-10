const Contacto = require('../models/contacto');

exports.crearContacto = async (req, res) => {
  try {
    const nuevo = new Contacto(req.body);
    await nuevo.save();
    res.status(201).json(nuevo);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.obtenerContactos = async (req, res) => {
  try {
    const contactos = await Contacto.find();
    res.json(contactos);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

exports.eliminarContacto = async (req, res) => {
  try {
    await Contacto.findByIdAndDelete(req.params.id);
    res.json({ mensaje: 'Contacto eliminado' });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};