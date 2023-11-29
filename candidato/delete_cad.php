<?php require 'proc_login.php'; ?>
<?php require 'cabecalho.php'; ?>
<script>
    // Script para mudar nome do título da página.
    document.title = "Apagar cadastro";
</script>
<h1>Informações do Usuário</h1>
        <?php
        // Conecta no banco de dados
        require "conecta_bd.php";
        if (array_key_exists('id_usuario', $_SESSION) && $_SESSION['id_usuario'] && !isset($usuario)) {
            $res = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
            $usuario = $res->fetch();
        }
        $consulta = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
        $usuarios = $consulta->fetchAll();
        foreach ($usuarios as $u) {
            echo "";
            echo "Nome: " . $u['nome'];
            echo "Email: " . $u['email'];
            echo "Senha: " . md5($u['senha']);
            echo "";
        }
        ?>
<form action="proc_cad.php" method="post">
    <h1>Tem certeza que deseja excluir a conta?</h1>
    <button type="submit" class="button">Sim</button>
</form>
<?php require 'rodape.php'; ?>