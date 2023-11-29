<?php
require 'validar_candidato.php';
require './cabecalho.php';
require '../conecta_bd.php'; // Verificando a conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    $curriculo_nome = $_FILES['curriculo']['name'];
    $curriculo_tmp = $_FILES['curriculo']['tmp_name'];
    $id_vaga = $_POST['id_vaga'];

    try {
        // Verifique se o ID da vaga é válido
        $query_verifica_vaga = "SELECT * FROM vagas WHERE id_vagas = :id_vaga";
        $stmt_verifica_vaga = $pdo->prepare($query_verifica_vaga);
        $stmt_verifica_vaga->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT);
        $stmt_verifica_vaga->execute();

        if ($stmt_verifica_vaga->rowCount() == 0) {
            die("ID da vaga inválido.");
        }

        // Prepare a query de inserção
        $query = "INSERT INTO curriculos (arquivo_pdf, usuarios_id_usuarios, vagas_id_vagas) 
                  VALUES (:arquivo_pdf, :usuarios_id_usuario, :id_vaga)";

        // Ler o conteúdo do arquivo
        $curriculo_conteudo = file_get_contents($curriculo_tmp);

        // Prepare a declaração
        $stmt = $pdo->prepare($query);

        // Execute a declaração
        $stmt->bindParam(':arquivo_pdf', $curriculo_conteudo, PDO::PARAM_LOB);
        $stmt->bindParam(':usuarios_id_usuario', $_SESSION['id'], PDO::PARAM_INT);
        $stmt->bindParam(':id_vaga', $id_vaga, PDO::PARAM_INT);
        $stmt->execute();
        ?>     
        <script type="text/javascript">alert("Seu currículo foi enviado com sucesso!"); window.location.href = "vagas.php";</script>          
        <?php 
    } catch (PDOException $erro) {
        echo "Erro ao cadastrar o currículo: " . $erro->getMessage();
    }
}
?>
