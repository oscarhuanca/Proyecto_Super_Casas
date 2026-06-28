<?php
// 1. Lógica de Autenticación
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('../config/database.php');

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $db = $database->getConnection();

    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    // Consulta para verificar usuario
    $stmt = $db->prepare("SELECT id_usuario, contrasena FROM usuarios WHERE correo = :correo");
    $stmt->execute(['correo' => $usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // ✅ Mejora de seguridad: usar password_verify
    if ($user) {
    // Verifica la contraseña contra el hash guardado en la BD
    if (password_verify($password, $user['contrasena'])) {
        $_SESSION['usuario_id'] = $user['id_usuario'];
        header("Location: admin/admin.php");
        exit;
    } else {
        $error = "Credenciales incorrectas.";
    }
} else {
    $error = "Credenciales incorrectas.";
}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SAPN Super Casas | Acceso Administrativo</title>
    <style>
       body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background: url('../assets/img/tu-imagen-de-fondo.jpg') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins', sans-serif;
    }

    .login-box {
        background: rgba(255, 255, 255, 0.85);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        backdrop-filter: blur(10px);
        width: 350px;
        text-align: center;
    }
    .login-box h2 { color: #1e293b; margin-top: 10px; margin-bottom: 5px; }
    .login-box p { color: #555; margin-bottom: 20px; }
    input { 
        width: 100%; 
        padding: 12px; 
        margin: 10px 0; 
        border: 1px solid #ddd; 
        border-radius: 5px; 
        box-sizing: border-box;
    }
    button { 
        background: #28a745; 
        color: white; 
        border: none; 
        padding: 12px; 
        width: 100%; 
        border-radius: 5px; 
        cursor: pointer; 
        font-weight: bold; 
        margin-top: 10px; 
    }
    button:hover { background: #218838; }
    .error { color: #dc3545; margin: 10px 0; font-weight: 500; }
    </style>
</head>
<body>

<div class="login-box">
    <?php if(file_exists("../assets/img/logo.jpeg")): ?>
        <img src="../assets/img/logo.jpeg" alt="Logo" style="max-width: 120px; margin: 0 auto;">
    <?php endif; ?>

    <h2>Iniciar Sesión</h2>
    <p>SAPN Super Casas S.R.L.</p>

    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
    
    <!-- ✅ Agregamos atributos para evitar autocompletado -->
    <form method="POST" autocomplete="off" novalidate>
    <input type="text" name="dummy" style="display:none;">
    <input type="password" name="dummy2" style="display:none;">

    <input type="email" 
           name="usuario" 
           placeholder="Correo electrónico" 
           required
           value="" 
           autocomplete="new-email"
           readonly 
           onfocus="this.removeAttribute('readonly')">

    <input type="password" 
           name="password" 
           placeholder="Contraseña" 
           required
           value="" 
           autocomplete="new-password"
           readonly 
           onfocus="this.removeAttribute('readonly')">

    <button type="submit" name="btn_ingresar">INGRESAR</button>
</form>
    
    <div style="margin-top: 15px;">
        <a href="recuperar.php" style="color: #28a745; font-size: 0.85em;">¿Olvidaste tu contraseña? Clic aquí</a>
    </div>
</div>

</body>
</html>