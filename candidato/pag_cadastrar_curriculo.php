<?php
require 'validar_candidato.php';
require './cabecalho.php';
if (isset($_GET['id_vaga'])) {
    $id_vaga = $_GET['id_vaga'];

    // Conectar ao banco de dados
    require '../conecta_bd.php'; // Verificando a conexão com o banco de dados
    // Verifica se o cadastro já existe
    $sql = "SELECT * FROM curriculos
WHERE vagas_id_vagas = :id_vaga
AND usuarios_id_usuarios = :id_usuario";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_vaga', $id_vaga);
    $stmt->bindParam(':id_usuario', $_SESSION['id']);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // O cadastro já existe
?>
        <script>
            Swal.fire({
                position: "center",
                icon: "warning",
                title: "Você já está cadastrado nesta vaga!",
                showConfirmButton: true,
                confirmButtonColor: "#2572E8",
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "pag_mostrar_vagas.php"
                }
            });
        </script>
    <?php
        exit();
    }
    ?>
    <section>
        <h1 class="titulos-h1">Candidatar-se à vaga</h1>
        <p class="p-serv">Selecione seu currículo em seus arquivos, envie para que a empresas possam analisar e aguarde ser chamado. Desejamos boa sorte!</p>
        <div class="form login">
                <form action="proc_curriculo.php" method="post" enctype="multipart/form-data" class="formLogin">
                    <div class="label-cad">
                        <label class="arquivo" for="curriculo">Arquivo PDF do Currículo:</label>
                    </div>
                    <div class="input_cur">
                        <input class="curriculo_input" type="file" name="curriculo" accept=".pdf" required>
                    </div>
                    <div class="label-cad">
                        <label class="arquivo" for="vaga_id" hidden>ID da Vaga:</label>
                    </div>
                    <div class="input_cur">
                        <input class="curriculo_input" type="text" name="id_vaga" id="vaga_id" value="<?= $id_vaga ?>" hidden readonly>
                    </div>
                    <div class="field button-field">
                        <button type="submit" class="button">Cadastrar Currículo</button>
                    </div>
                </form>
        </div>
    </section>
<?php
} else {
    echo "ID da vaga não especificado.";
}

require '../rodape.php';
?>