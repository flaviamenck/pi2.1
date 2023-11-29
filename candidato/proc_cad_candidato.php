<?php require 'cabecalho.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['nome']) && !empty($_POST['CPF']) && !empty($_POST['data_nascimento']) && !empty($_POST['CEP']) && isset($_POST['genero']) && !empty($_POST['email']) && isset($_POST['senha']) && isset($_POST['rsenha'])) {

        // Estabeleça a conexão com o banco de dados
        require '../conecta_bd.php'; // Verificando a conexão com o banco de dados

        // Coletar dados do formulário
        $nome = $_POST['nome'];
        $CPF = $_POST['CPF'];
        $data_nascimento = $_POST['data_nascimento'];
        $CEP = $_POST['CEP'];
        $genero = $_POST['genero'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $rsenha = $_POST['rsenha'];

        if ($senha == $rsenha) {
            // verifica se o cadastro já existe no banco de dados
            $stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();  
            if ($stmt->rowCount()>0) {
                // se o cadastro já existe no banco de dados avisa
                echo '<script type="text/javascript">alert("Email já cadastrado!"); window.location.href = "cad_candidato.php";</script>';            
            }else {
            // Verifique se os dados são válidos (adicionar validações adicionais conforme necessário)
            $CPF = preg_replace('/[^0-9]/', '', $CPF);

            // Verifique se o CPF tem 11 dígitos
            if (strlen($CPF) !== 11) {
                echo 'CPF inválido. Deve conter 11 dígitos.';
            } else {
                $data_nascimento = $_POST['data_nascimento'];

                // Verifique se a data está em um formato válido (AAAA-MM-DD)
                if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_nascimento)) {
                    echo 'Data de nascimento inválida. Use o formato AAAA-MM-DD.';
                } else {
                    $CEP = preg_replace('/[^0-9]/', '', $CEP);

                    // Verifique se o CEP tem 8 dígitos
                    if (strlen($CEP) !== 8) {
                        echo 'CEP inválido. Deve conter 8 dígitos.';
                    } else {
                        // Prepare a consulta usando prepared statement
                        $stmt = $pdo->prepare("INSERT INTO `usuarios`(`id_usuario`, `nome`, `email`, `senha`, `CPF`, `data_nascimento`, `CEP`, `genero`) VALUES (null, :nome, :email, :senha, :CPF, :data_nascimento, :CEP, :genero)");


                        // Vincule os parâmetros
                        $stmt->bindParam(':nome', $nome);
                        $stmt->bindParam(':CPF', $CPF);
                        $stmt->bindParam(':data_nascimento', $data_nascimento);
                        $stmt->bindParam(':CEP', $CEP);
                        $stmt->bindParam(':genero', $genero);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':senha', $senha);

                        // Execute a consulta
                        $linhas_afetadas = $stmt->execute();

                        if ($linhas_afetadas > 0) {
                            echo '<script type="text/javascript">alert("Cadastro realizado com sucesso!"); window.location.href = "./serv_candidatos.php";</script>';
                        } else {
                            echo 'Nenhuma linha foi afetada!';
                        }
                    }
                }
            }
        }
        } else {
            echo '<script type="text/javascript">alert("As senhas não conferem. Por favor, digite novamente!"); window.location.href = "./cad_candidato.php";</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Preencha todos os campos obrigatórios, por favor."); window.location.href = "./cad_candidato.php";</script>';
    }
}

require 'rodape.php';