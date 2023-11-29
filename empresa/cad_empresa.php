<?php require "./cabecalho_nao_logado.php"; ?>
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
                            <input type="text" class="input" id="nome_fantasia" name="nome_fantasia" placeholder="Digite o nome da empresa" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="razao_social">Razão Social: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" class="input" id="razao_social" name="razao_social" placeholder="Digite a razão social da empresa" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="CNPJ">CNPJ: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" class="input" id="CNPJ" name="CNPJ" placeholder="xx.xxx.xxx/xxxx-xx" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="IE">I.E: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" class="input" id="IE" name="IE" placeholder="xxxxxxxxx" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="CEP">CEP: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" class="input" id="CEP" name="CEP" placeholder="xxxxx-xxx" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="email">Email: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="email" class="input" id="email" name="email" placeholder="user@email.com" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="senha">Senha: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="password" placeholder="Digite sua senha" name="senha" class="password">
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
                    <button class="enviar" type="submit">Enviar</button>
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