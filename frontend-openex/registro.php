<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "openex_db");


if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $correo = $_POST["correo"];
  $mensaje = $_POST["mensaje"];

  $sql = "INSERT INTO usuarios (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";

  if ($conexion->query($sql) === TRUE) {
    echo "<p>¡Registro exitoso! Gracias por contactarnos.</p>";
  } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro | OPENEX</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

  <header>
    <nav class="navbar">
      <h1>OPENEX</h1>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="registro.php">Registro</a></li>
        <li><a href="crud.php">Gestión</a></li>
        <li><a href="#contacto">Contacto</a></li>
      </ul>
    </nav>
  </header>

  <section class="formulario">
    <h2>Contáctanos</h2>
    <form method="POST" action="registro.php">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" required>

      <label for="correo">Correo electrónico:</label>
      <input type="email" name="correo" required>

      <label for="mensaje">Mensaje:</label>
      <textarea name="mensaje" rows="5" required></textarea>

      <button type="submit">Enviar</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2025 OPENEX. Todos los derechos reservados.</p>
  </footer>

</body>
</html>
