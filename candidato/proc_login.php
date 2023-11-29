<?php
session_start();

// Verificando se as inputs foram preenchidas.
if (!empty($_POST["email"]) && !empty($_POST["senha"]) ) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

        // Conectar ao banco de dados
        require '../conecta_bd.php'; // Verificando a conexão com o banco de dados

            // Consultar o banco de dados para verificar se os dados do usuário são válidos
            // Consulta os dados do usuário
            $query = 'SELECT * FROM usuarios WHERE email = :email AND senha = :senha';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':senha', $senha);
            $stmt->execute();

            // Verifica se o usuário foi encontrado
            if ($stmt->rowCount() > 0) {
                // O usuário foi encontrado
                // Armazena o ID do usuário na sessão
                $usuario = $stmt->fetch();
                $_SESSION['id'] = $usuario['id_usuario'];
                $_SESSION['email'] = $usuario['email'];
                echo '<script type="text/javascript">alert("Muito bem vindo(a) ao Sênior Job!"); window.location.href = "serv_candidatos.php";</script>';
                exit();
            } else {
                // Caso o login não seja válido
                echo '<script type="text/javascript">alert("Login inválido! Tente novamente."); window.location.href = "entrar.php";</script>';
                exit();
            }

} else {
    // Inputs não preenchidas
    echo '<script type="text/javascript">alert("Preencha todos os campos, por favor."); window.location.href = "entrar.php";</script>';
}
?>
