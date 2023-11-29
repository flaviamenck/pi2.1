<?php require 'proc_cad_candidato.php';
require 'cabecalho.php'; ?>

<h1>Informações do usuário</h1>

<?php
// Conecta no banco de dados
require "conecta_bd.php";

// Verifica se o usuário está logado e carrega seus dados
if (array_key_exists('id_usuario', $_SESSION) && $_SESSION['id_usuario'] && !isset($usuario)) {
    $res = $db->query("SELECT * FROM usuarios WHERE id_usuario = '{$_SESSION['id_usuario']}'");
    $usuario = $res->fetch();
}

// Consulta os dados do usuário
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

<form action="proc_atualizar_dados.php" method="post">
    <h1>Formulário para atualizar o cadastro</h1>

    <label for="id_nome">Nome:</label>
    <!-- Input para o nome com o valor preenchido com o nome do usuário -->
    <input type="text" name="nome" id="id_nome" value="<?php echo $usuario['nome']; ?>">


    <label for="id_email">Email:</label>
    <!-- Input para o email com o valor preenchido com o email do usuário -->
    <input type="text" name="email" id="id_email" value="<?php echo $usuario['email']; ?>">


    <label for="id_senha">Nova senha:</label>
    <!-- Input para a senha com o valor preenchido com a senha do usuário -->
    <input type="text" name="senha" id="id_senha" value="">


    <label for="rsenha">Confirme a senha:</label>
    <input type="password" name="rsenha" id="rsenha" value="">

    <!-- Botão para atualizar o cadastro -->
    <button type="submit" class="button">Atualizar</button>
</form>
<?php require 'rodape.php'; ?>