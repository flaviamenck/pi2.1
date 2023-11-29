<?php
session_start();

// Verificando se as inputs foram preenchidas.
if (!empty($_POST["email"]) && !empty($_POST["senha"]) && !empty($_POST["rsenha"])) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $rsenha = $_POST["rsenha"];

    if ($senha === $rsenha) {
        // Conectar ao banco de dados
        require '../conecta_bd.php'; // Verificando a conexão com o banco de dados

            // Consultar o banco de dados para verificar se os dados do usuário são válidos
            // Consulta os dados do usuário
            $stmt = $pdo->prepare("INSERT INTO `empresa`(`empresa_id`, `email`, `senha`) VALUES (null, :email, :senha)");

            // Associe os valores aos marcadores de posição
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);

            // Execute a consulta
            if ($stmt->execute()) {
                echo '<script type="text/javascript">alert("Cadastro realizado com sucesso! Faça o login para aproveitar as vantagens do nosso site."); window.location.href = "entrar.php";</script>';
            } else {
                echo "Erro, não foi possível realizar o cadastro no banco de dados";
            }
    } else {
        // Senhas não conferem
        echo '<script>alert("As senhas não são iguais. Digite novamente, por favor!");</script>';
    }
} else {
    // Inputs não preenchidas
    echo '<script>alert("Por favor, preencha todos os campos!");</script>';
}
?>
