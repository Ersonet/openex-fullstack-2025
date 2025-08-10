// Importar dependencias
const express = require('express');
const mongoose = require('mongoose');
const usuariosRoutes = require('./routes/usuarios');

const app = express();
const PORT = 3000;

// Middleware para manejar JSON
app.use(express.json());

// Ruta principal
app.get('/', (req, res) => {
  res.send('Bienvenido a OPENEX');
});

// Rutas modulares
app.use('/api/usuarios', usuariosRoutes);

// Conexión a MongoDBs
mongoose.connect('mongodb://localhost/openex', {
  useNewUrlParser: true,
  useUnifiedTopology: true
})
.then(() => console.log('✅ Conectado a MongoDB'))
.catch(err => console.error('❌ Error al conectar a MongoDB:', err));

// Iniciar servidor
app.listen(PORT, () => {
  console.log(`🚀 Servidor corriendo en http://localhost:${PORT}`);
});
