<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];


// Verificar si las variables de entorno se cargaron correctamente
if (!$servername || !$username || !$password || !$dbname) {
    die('Error: No se pudieron cargar las variables de entorno');
}

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Buscar usuario en la base de datos
$stmt = $conn->prepare("SELECT password_hash FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
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
