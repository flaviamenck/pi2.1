<?php
// Iniciando a sessão
session_start();
?>
<?php
if (isset($_SESSION["id"]) && isset($_SESSION["email"])) {
    // se estiver logado não faz nada
} else {
    // Caso o login não seja válido
    header("Location: ./entrar.php");
    exit();
}
?>
