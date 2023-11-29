<?php require 'cabecalho.php'; ?>

<section>
    <h1 class="titulos-h1">Vagas disponíveis</h1>
    <p class="p-serv">Aqui poderá pesquisar a vaga ideal para você e candidatar-se enviando seu currículo para análise.</p>

    <?php
    // Estabeleça a conexão com o banco de dados
    require '../conecta_bd.php';

    try {
        // Prepare a consulta para selecionar todas as vagas da tabela
        $stmt = $pdo->query("SELECT * FROM vagas");

        // Verifique se há pelo menos uma linha retornada
        if ($stmt->rowCount() > 0) {
            // Itere sobre os resultados da consulta
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="div_vagas">
                        <article>
                            <div class="div_article">
                                <h3>' . $row['funcao'] . '</h3>
                                <p><strong>Salário:</strong> ' . $row['salario'] . '</p>
                                <p><strong>Carga Horária:</strong> ' . $row['carga_horaria'] . '</p>
                                <p><strong>Descrição:</strong> ' . $row['descricao'] . '</p>
                                <p><strong>Local:</strong> ' . $row['local'] . '</p>
                                <p><strong>Tipo de Vaga:</strong> ' . $row['tipo_vaga'] . '</p>
                                <p><strong>Contratação:</strong> ' . $row['contratacao'] . '</p>
                            </div>
                            <div class="btn-serv">
                                <a class="btn-emp-cand" href="./pag_cadastrar_curriculo.php?id_vaga=' . $row['id_vagas'] . '">Candidatar-se</a>
                            </div>
                        </article>
                    </div>';
            }
        } else {
            echo '<p>Nenhuma vaga cadastrada.</p>';
        }
    } catch (PDOException $e) {
        echo "Erro no banco de dados: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Erro inesperado: " . $e->getMessage();
    }

    // Feche a conexão com o banco de dados
    $pdo = null;
    ?>
</section>

<script>
    function candidatar(empresaId) {
        // Lógica para candidatar-se à vaga, você pode redirecionar para outra página ou executar ação específica
        alert('Candidatando-se à vaga com ID: ' + empresaId);
    }
</script>

<?php require 'rodape.php'; ?>