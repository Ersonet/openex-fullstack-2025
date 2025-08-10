const mongoose = require('mongoose');

const usuarioSchema = new mongoose.Schema({
  nombre: { type: String, required: true },
  correo: { type: String, required: true, unique: true },
  rol: { type: String, enum: ['estudiante', 'mentor', 'admin'], default: 'estudiante' },
  fechaRegistro: { type: Date, default: Date.now }
});

module.exports = mongoose.model('usuario', usuarioSchema);
