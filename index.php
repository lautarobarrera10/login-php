<?php

include "./includes/Database.php";
include "./includes/User.php";
include "./includes/UserSession.php";

$userSession = new UserSession;
$user = new User;

if (isset($_SESSION['USER'])) {
    // echo "Hay sesión";
    $user->setUser($userSession->getCurrentUser());
    include_once("./vistas/home.php");
} else if (isset($_POST['username']) && isset($_POST['password'])){
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if ($user->userExists($userForm, $passForm)){
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once("./vistas/home.php");
    } else {
        $errorLogin = "Nombre de usuario y/o contraseña incorrectos";
        include_once("./vistas/login.php");
    }
} else {
    include_once("./vistas/login.php");
}