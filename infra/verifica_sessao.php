<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id_administrador"]) || !isset($_SESSION["id_perfil"])) {
    header("Location: ../login/tela-login.php");
    exit;
}