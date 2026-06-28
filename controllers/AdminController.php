<?php

class AdminController
{
    private $db;

    public function __construct()
    {
        require_once __DIR__ . '/../config/database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index()
    {
        $totalPropiedades = 0;
        ?>
        <div class="container-fluid p-4">
            <h2 class="mb-4 text-primary">Resumen General</h2>
            <div class="card shadow-sm border-primary" style="max-width: 320px; border-radius: 8px;">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">Propiedades Activas</h5>
                </div>
                <div class="card-body text-center py-4">
                    <p class="display-4 fw-bold text-primary mb-0"><?= $totalPropiedades ?></p>
                    <small class="text-muted">Total en el sistema</small>
                </div>
            </div>
        </div>
        <?php
    }

    public function probarConexion()
    {
        echo "<h2 style='color:green;'>✅ CONEXIÓN EXITOSA A POSTGRESQL</h2>";
        exit;
    }

    public function cargarVista($archivo)
    {
        $archivo = trim($archivo);
        $acciones = [
            'guardar_usuario', 
            'probar_conexion', 
            'obtener_usuario', 
            'actualizar_usuario', 
            'eliminar_usuario',
            'activar_usuario',
            'desactivar_usuario'
        ];
        
        if (in_array($archivo, $acciones)) return;

        $ruta = __DIR__ . '/../views/admin/' . $archivo . '.php';

        if (!file_exists($ruta)) {
            echo "<div class='alert alert-danger'>❌ No encontrado: " . htmlspecialchars($ruta) . "</div>";
            return;
        }

        $controller = $this;
        require $ruta;
    }

    public function guardarUsuario()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') throw new Exception("❌ Método no permitido");

            $nombre     = trim($_POST['nombre'] ?? '');
            $apellido   = trim($_POST['apellido'] ?? '');
            $correo     = trim($_POST['correo'] ?? '');
            $contrasena = $_POST['contrasena'] ?? '';
            $telefono   = trim($_POST['telefono'] ?? '');
            $id_rol     = intval($_POST['id_rol'] ?? 0);

            if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasena) || empty($telefono) || $id_rol < 1) {
                throw new Exception("❌ Todos los campos son obligatorios");
            }

            $passHash = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (id_rol, nombre, apellido, correo, contrasena, telefono, fecha_registro)
                    VALUES (?, ?, ?, ?, ?, ?, NOW())";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id_rol, $nombre, $apellido, $correo, $passHash, $telefono]);

            echo "✅ Usuario guardado correctamente";
            exit;

        } catch (PDOException $e) {
            if ($e->getCode() === '23505') echo "❌ Error: Ya existe un usuario con este correo";
            else echo "❌ Error en la base de datos: " . $e->getMessage();
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function obtenerUsuario() {
        try {
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) throw new Exception("ID de usuario no válido");

            $id = intval($_GET['id']);
            $sql = "SELECT id_usuario, id_rol, nombre, apellido, correo, telefono
                    FROM usuarios WHERE id_usuario = ?";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$usuario) throw new Exception("Usuario no encontrado");

            header('Content-Type: application/json');
            echo json_encode($usuario);
            exit;

        } catch (Exception $e) {
            header('Content-Type: application/json');
            echo json_encode(["error" => $e->getMessage()]);
            exit;
        }
    }

    public function listarUsuarios() {
        try {
            $sql = "SELECT 
                        u.id_usuario, 
                        u.nombre, 
                        u.apellido, 
                        u.correo, 
                        u.telefono, 
                        COALESCE(r.nombre_rol, 'Sin rol') AS rol, 
                        u.fecha_registro, 
                        u.estado
                    FROM usuarios u
                    LEFT JOIN roles r ON u.id_rol = r.id_rol
                    ORDER BY u.id_usuario DESC";

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("❌ Error en listarUsuarios: " . $e->getMessage());
            return [];
        }
    }

    public function actualizarUsuario() {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') throw new Exception("Método no permitido");

            $id = intval($_POST['id_usuario'] ?? 0);
            $nombre = trim($_POST['nombre'] ?? '');
            $apellido = trim($_POST['apellido'] ?? '');
            $correo = trim($_POST['correo'] ?? '');
            $telefono = trim($_POST['telefono'] ?? '');
            $id_rol = intval($_POST['id_rol'] ?? 0);
            $contrasena = $_POST['contrasena'] ?? '';

            if ($id < 1 || !$nombre || !$apellido || !$correo || !$telefono || $id_rol < 1) {
                throw new Exception("❌ Todos los campos son obligatorios");
            }

            if (!empty($contrasena)) {
                $hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $sql = "UPDATE usuarios 
                        SET nombre=?, apellido=?, correo=?, telefono=?, id_rol=?, contrasena=?
                        WHERE id_usuario=?";
                $valores = [$nombre, $apellido, $correo, $telefono, $id_rol, $hash, $id];
            } else {
                $sql = "UPDATE usuarios 
                        SET nombre=?, apellido=?, correo=?, telefono=?, id_rol=?
                        WHERE id_usuario=?";
                $valores = [$nombre, $apellido, $correo, $telefono, $id_rol, $id];
            }

            $stmt = $this->db->prepare($sql);
            $stmt->execute($valores);

            echo "✅ Usuario actualizado correctamente";
        } catch (PDOException $e) {
            if ($e->getCode() === '23505') echo "❌ Ya existe un usuario con ese correo";
            else echo "❌ Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        exit;
    }

    public function eliminarUsuario() {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') throw new Exception("Método no permitido");
            $id = intval($_POST['id_usuario'] ?? 0);
            if ($id < 1) throw new Exception("ID inválido");

            $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);

            echo "✅ Usuario eliminado correctamente";
        } catch (PDOException $e) {
            if ($e->getCode() === '23503') echo "❌ No se puede eliminar: tiene registros asociados";
            else echo "❌ Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "❌ Error: " . $e->getMessage();
        }
        exit;
    }

    public function activarUsuario() {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') throw new Exception("Método no permitido");

            $id = intval($_POST['id_usuario'] ?? 0);
            if ($id < 1) throw new Exception("ID de usuario inválido");

            $sql = "UPDATE usuarios SET estado = 'activo' WHERE id_usuario = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);

            echo "✅ Usuario activado correctamente";
            exit;
        } catch (Exception $e) {
            echo "❌ Error: " . $e->getMessage();
            exit;
        }
    }

    public function desactivarUsuario() {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') throw new Exception("Método no permitido");

            $id = intval($_POST['id_usuario'] ?? 0);
            if ($id < 1) throw new Exception("ID de usuario inválido");

            $sql = "UPDATE usuarios SET estado = 'inactivo' WHERE id_usuario = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);

            echo "✅ Usuario desactivado correctamente";
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() === '23503') echo "❌ No se puede desactivar: tiene registros asociados";
            else echo "❌ Error: " . $e->getMessage();
            exit;
        } catch (Exception $e) {
            echo "❌ Error: " . $e->getMessage();
            exit;
        }
    }

        // ==================================================
    // ✅ MÓDULOS: GESTIÓN DE TALENTO HUMANO
    // ==================================================

    // Vista principal de Talento Humano
    public function Gtalentohumano()
    {
        include __DIR__ . '/../views/admin/Gtalentohumano.php';
    }

    // Vista: Registro de Personal
    public function Registropersonal()
    {
        include __DIR__ . '/../views/admin/RegistroPersonal.php';
    }

    // Vista: Capacitación de Personal
    public function Capacitacionpersonal()
    {
        include __DIR__ . '/../views/admin/Capacitacionpersonal.php';
    }

    // Vista: Evaluación de Personal
    public function Evaluacionpersonal()
    {
        include __DIR__ . '/../views/admin/Evaluacionpersonal.php';
    }
}
?>