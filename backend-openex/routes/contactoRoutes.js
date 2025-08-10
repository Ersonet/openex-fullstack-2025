const express = require('express');
const router = express.Router();
const { crearContacto, obtenerContactos, eliminarContacto } = require('../controllers/contactoController');

router.post('/', crearContacto);
router.get('/', obtenerContactos);
router.delete('/:id', eliminarContacto);

module.exports = router;
