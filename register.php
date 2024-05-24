<?php
$servername = "localhost";
$username = "root";
$password = "PLautykpo12!n";
$dbname = "compras";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$username = $_POST['username'];
$password = $_POST['password'];

// Hashear la contraseña
$hash = password_hash($password, PASSWORD_BCRYPT);

// Insertar usuario en la base de datos
$stmt = $conn->prepare("INSERT INTO usuario (nombre, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $username, $hash);

if ($stmt->execute()) {
    echo "Usuario registrado con éxito.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
