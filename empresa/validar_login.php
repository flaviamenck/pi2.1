<?php
// Iniciando a sessão
session_start();
?>
<?php
if (isset($_SESSION["id_empresa"]) && isset($_SESSION["email"])) {
} else {
    // Caso o login não seja válido
    header("Location: ./entrar_empresa.php");
    exit();
}
?>
