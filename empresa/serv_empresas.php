<?php require 'cabecalho.php'?>
<?php require 'validar_login.php'?>
<section>
    <h1 class="titulos-h1">O que sua empresa deseja fazer?</h1>
    <p class="p-serv">Lembre-se que para postar vagas sua empresa deve estar cadastrada.</p>
    <div class="emp_ou_cand">
        <div class="div-serv">
            <div class="imgs-serv">
                <img src="../src/img/postar-vagas.jpg" alt="Imagem Vagas para Empresas" class="img-serv">
            </div>
            <div class="btn-serv">
                <a class="btn-emp-cand" href="./publi_vagas.php">Postar Vagas</a>
            </div>
        </div>

        <div class="div-serv">
            <div class="imgs-serv">
                <img src="../src/img/cadastrar-empresa.jpg" alt="Imagem Cadastro Empresa" class="img-serv">
            </div>
            <div class="btn-serv">
                <a class="btn-emp-cand" href="./atualizar_cad_empresa.php">Atualizar Dados</a>
            </div>
        </div>

    </div>
</section>
<?php require '../rodape.php' ?>