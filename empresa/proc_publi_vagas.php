<?php 
session_start();
require 'cabecalho.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['funcao']) && !empty($_POST['salario']) && !empty($_POST['carga_horaria']) && !empty($_POST['descricao']) && !empty($_POST['local']) && !empty($_POST['tipo_vaga']) && !empty($_POST['contratacao'])) {
        require '../conecta_bd.php';

        try {
            $pdo->beginTransaction(); // Inicia a transação

            $funcao = $_POST['funcao'];
            $salario = $_POST['salario'];
            $carga_horaria = $_POST['carga_horaria'];
            $descricao = $_POST['descricao'];
            $local = $_POST['local'];
            $tipo_vaga = $_POST['tipo_vaga'];
            $contratacao = $_POST['contratacao'];
            $id_empresa = $_SESSION['id_empresa'];

            $stmt = $pdo->prepare("INSERT INTO `vagas`(`id_vagas`, `funcao`, `salario`, `carga_horaria`, `descricao`, `local`, `tipo_vaga`, `contratacao`, `empresa_empresa_id`) VALUES (null, :funcao, :salario, :carga_horaria, :descricao, :local, :tipo_vaga, :contratacao, :id_empresa)");

            $stmt->bindValue(':funcao', $funcao, PDO::PARAM_STR);
            $stmt->bindValue(':salario', $salario, PDO::PARAM_STR);
            $stmt->bindValue(':carga_horaria', $carga_horaria, PDO::PARAM_STR);
            $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindValue(':local', $local, PDO::PARAM_STR);
            $stmt->bindValue(':tipo_vaga', $tipo_vaga, PDO::PARAM_STR);
            $stmt->bindValue(':contratacao', $contratacao, PDO::PARAM_STR);
            $stmt->bindValue(':id_empresa', $id_empresa, PDO::PARAM_STR);

            $linhas_afetadas = $stmt->execute();

            if ($linhas_afetadas > 0) {
                $pdo->commit(); // Confirma a transação
                echo '<script type="text/javascript">alert("Vaga publicada com sucesso!."); window.location.href = "serv_empresa.php";</script>'; // Redireciona após o sucesso
                exit();
            } else {
                $pdo->rollBack(); // Desfaz a transação em caso de falha
                $errorInfo = $stmt->errorInfo();
                echo "Erro ao executar a consulta: " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            $pdo->rollBack(); // Desfaz a transação em caso de exceção
            echo "Erro no banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
            $pdo->rollBack(); // Desfaz a transação em caso de exceção
            echo "Erro inesperado: " . $e->getMessage();
        }
    } else {
        echo '<script type="text/javascript">alert("Preencha todos os campos obrigatórios, por favor."); window.location.href = "cad_empresa.php";</script>';
    }
}

require 'rodape.php';
?>