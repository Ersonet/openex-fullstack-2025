import Usuario, { find } from '../models/usuario';

// Obtener todos los usuarios
export async function obtenerUsuarios(req, res) {
  try {
    const usuarios = await find();
    res.json(usuarios);
  } catch (error) {
    res.status(500).json({ mensaje: 'Error al obtener usuarios', error });
  }
}

// Crear nuevo usuario
export async function crearUsuario(req, res) {
  try {
    const nuevoUsuario = new Usuario(req.body);
    await nuevoUsuario.save();
    res.status(201).json(nuevoUsuario);
  } catch (error) {
    res.status(400).json({ mensaje: 'Error al crear usuario', error });
  }
}