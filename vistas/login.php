<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="" method="POST">
        <?php if (isset($errorLogin)): ?>
        <p><?php echo $errorLogin; ?></p>
        <?php endif; ?>
        <h2>Iniciar sesión</h2>
        <input type="text" name="username" placeholder="Nombre de usuario">
        <input type="password" name="password" placeholder="Contraseña">
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>