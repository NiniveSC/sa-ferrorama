<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id_administrador"])) {
    header("Location: ../login/tela-login.php");
    exit;
}