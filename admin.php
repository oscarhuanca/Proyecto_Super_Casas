<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php"); // Si no está logueado, regresa al inicio
    exit();
}

require_once 'controllers/AdminController.php';
$controller = new AdminController();
$controller->index();
?>