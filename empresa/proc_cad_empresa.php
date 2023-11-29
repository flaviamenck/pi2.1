<?php require 'cabecalho.php' ?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['nome_fantasia']) && !empty($_POST['razao_social']) && !empty($_POST['CNPJ']) && !empty($_POST['IE']) && !empty($_POST['CEP']) && !empty($_POST['senha']) && !empty($_POST['rsenha'])) {
        // Estabeleça a conexão com o banco de dados
        require '../conecta_bd.php'; // Verificando a conexão com o banco de dados

        // Coletar dados do formulário
        $nome_fantasia = $_POST['nome_fantasia'];
        $razao_social = $_POST['razao_social'];
        $CNPJ = $_POST['CNPJ'];
        $IE = $_POST['IE'];
        $CEP = $_POST['CEP'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $rsenha = $_POST['rsenha'];

        if ($senha == $rsenha) {
            // verifica se o cadastro já existe no banco de dados
            $stmt = $pdo->prepare("SELECT empresa_id FROM empresa WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // se o cadastro já existe no banco de dados avisa
                echo '<script type="text/javascript">alert("Email já cadastrado!"); window.location.href = "cad_empresa.php";</script>';
            } else {
                // Remova caracteres especiais e espaços em branco do CNPJ
                $CNPJ = preg_replace('/[^0-9]/', '', $CNPJ);

                // Verifique se o CNPJ tem 14 dígitos
                if (strlen($CNPJ) !== 14) {
                    echo 'CNPJ inválido. Deve conter 14 dígitos.';
                } else {
                    // Prepare a consulta usando prepared statement
                    $stmt = $pdo->prepare("INSERT INTO `empresa`(`empresa_id`, `razao_social`, `nome_fantasia`, `CNPJ`, `IE`, `CEP`, `email`, `senha`) VALUES (null, :razao_social, :nome_fantasia, :CNPJ, :IE, :CEP, :email, :senha)");

                    // Vincule os parâmetros
                    $stmt->bindParam(':nome_fantasia', $nome_fantasia);
                    $stmt->bindParam(':razao_social', $razao_social);
                    $stmt->bindParam(':CNPJ', $CNPJ);
                    $stmt->bindParam(':IE', $IE);
                    $stmt->bindParam(':CEP', $CEP);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':senha', $senha);

                    // Execute a consulta
                    $linhas_afetadas = $stmt->execute();

                    if ($linhas_afetadas > 0) {
                        echo '<script type="text/javascript">alert("Cadastro realizado com sucesso!"); window.location.href = "./serv_empresas.php";</script>';
                    } else {
                        echo 'Nenhuma linha foi afetada!';
                    }
                }
            }
        } else {
            echo '<script type="text/javascript">alert("As senhas não conferem. Por favor, digite novamente!"); window.location.href = "./cad_empresa.php";</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Preencha todos os campos obrigatórios, por favor."); window.location.href = "./cad_empresa.php";</script>';
    }
}

require '../rodape.php';
?>