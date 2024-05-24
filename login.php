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
$username = $_POST['username'];
$password = $_POST['password'];

// Buscar usuario en la base de datos
$stmt = $conn->prepare("SELECT password FROM usuario WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($hash);
$stmt->fetch();

if (password_verify($password, $hash)) {
    echo "Inicio de sesión exitoso.";
} else {
    echo "Nombre de usuario o contraseña incorrectos.";
}

$stmt->close();
$conn->close();
?>
