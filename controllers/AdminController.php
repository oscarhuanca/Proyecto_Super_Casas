<?php
// controllers/AdminController.php
require_once 'config/database.php'; // Incluimos tu clase Database

class AdminController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index() {
        // Ejemplo: contar propiedades
        $stmt = $this->db->query("SELECT COUNT(*) FROM propiedades");
        $totalPropiedades = $stmt->fetchColumn();

        // Llamamos a la vista y le pasamos la variable
        require_once 'views/admin/dashboard.php';
    }
}