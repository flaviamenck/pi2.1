<?php require "./cabecalho_nao_logado.php";

session_start();
require "../conecta_bd.php";

// Verifica se o usuário está logado e carrega seus dados
if (array_key_exists('id_empresa', $_SESSION) && $_SESSION['id_empresa'] && !isset($empresa)) {
    $res = $pdo->query("SELECT * FROM empresa WHERE empresa_id  = '{$_SESSION['id_empresa']}'");
    $empresas = $res->fetch();
}

// Consulta os dados do usuário
$consulta = $pdo->query("SELECT * FROM empresa WHERE empresa_id  = '{$_SESSION['id_empresa']}'");
$empresas = $consulta->fetchAll();
foreach ($empresas as $empresa) {

}

?>
<section class="form-entrar forms">
    <div class="form login">
        <div class="form-content">
            <h1 class="header-entrar">Cadastro Empresa</h1>
            <p class="p-cad">Cadastre-se para ter acesso ao conteúdo completo do nosso site e publicar as vagas disponíveis em sua empresa!</p>

            <form action="proc_cad_empresa.php" method="POST">
                <div class="input-group">
                    <div class="input-box">
                        <div class="label-cad">
                            <label for="nome_fantasia">Nome Fantasia: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" class="input" id="nome_fantasia" name="nome_fantasia" placeholder="Digite o nome da empresa" value="<?php echo $empresa['nome_fantasia']; ?>" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="razao_social">Razão Social: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" class="input" id="razao_social" name="razao_social" placeholder="Digite a razão social da empresa" value="<?php echo $empresa['razao_social']; ?>" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="CNPJ">CNPJ: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" class="input" id="CNPJ" name="CNPJ" placeholder="xx.xxx.xxx/xxxx-xx" value="<?php echo $empresa['CNPJ']; ?>" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="IE">I.E: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" class="input" id="IE" name="IE" placeholder="xxxxxxxxx" value="<?php echo $empresa['IE']; ?>" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="CEP">CEP: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" class="input" id="CEP" name="CEP" placeholder="xxxxx-xxx" value="<?php echo $empresa['CEP']; ?>" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="email">Email: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="email" class="input" id="email" name="email" placeholder="user@email.com" value="<?php echo $empresa['email']; ?>" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="senha">Nova senha: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="password" placeholder="Digite sua nova senha" name="senha" class="password">
                            <i class="bx bx-hide eye-icon"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <div class="label-cad">
                            <label for="senha">Confirme a senha: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="password" placeholder="Confirme sua senha" name="rsenha" class="password">
                            <i class="bx bx-hide eye-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="field button-field">
                    <button class="enviar" type="submit">Atualizar</button>
                </div>
        </div>
        </form>
    </div>
    </div>
    <!-- <div class="img-cad">
        <img src="./src/img/vagas.svg" alt="img-cad-empresas">
    </div> -->
</section>
<?php require "../rodape.php"; ?>