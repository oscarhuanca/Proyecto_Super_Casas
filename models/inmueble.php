<?php
class Inmueble {
    private $conn;
    private $table_name = "inmuebles";

    public function __construct($db){
        $this->conn = $db;
    }

    // Método para obtener todas las propiedades
    public function leerTodo(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

   
// Método para mostrar solo lo disponible (lo que ve el cliente)
public function leerDisponibles(){
    $query = "SELECT * FROM " . $this->table_name . " WHERE estado = 'Disponible' ORDER BY id DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

// Método para "Dar de baja" (Cambiar estado)
public function darDeBaja($id, $nuevoEstado){
    // $nuevoEstado puede ser 'Vendido' o 'Alquilado'
    $query = "UPDATE " . $this->table_name . " SET estado = :estado WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    
    $stmt->bindParam(':estado', $nuevoEstado);
    $stmt->bindParam(':id', $id);
    
    return $stmt->execute();
}

// Método para el Historial (lo que ves tú como administrador)
public function leerHistorial(){
    $query = "SELECT * FROM " . $this->table_name . " WHERE estado != 'Disponible' ORDER BY fecha_registro DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
}