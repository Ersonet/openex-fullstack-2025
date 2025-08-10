<?php
$conexion = new mysqli("localhost", "root", "", "openex_db");

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// Eliminar registro
if (isset($_GET['eliminar'])) {
  $id = $_GET['eliminar'];
  $conexion->query("DELETE FROM usuarios WHERE id=$id");
  header("Location: crud.php");
}

// Obtener registros
$resultado = $conexion->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestión | OPENEX</title>
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

  <section class="crud">
    <h2>Gestión de Contactos</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Mensaje</th>
        <th>Acciones</th>
      </tr>
      <?php while($fila = $resultado->fetch_assoc()): ?>
      <tr>
        <td><?= $fila['id'] ?></td>
        <td><?= $fila['nombre'] ?></td>
        <td><?= $fila['correo'] ?></td>
        <td><?= $fila['mensaje'] ?></td>
        <td>
          <a href="editar.php?id=<?= $fila['id'] ?>">Editar</a> |
          <a href="crud.php?eliminar=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar este registro?')">Eliminar</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </section>

  <footer>
    <p>&copy; 2025 OPENEX. Todos los derechos reservados.</p>
  </footer>

</body>
</html>
