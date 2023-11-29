<?php require "./cabecalho_nao_logado.php"; ?>
<section class="form-entrar forms">

    <div class="form login">
        <div class="form-content">
            <h1 class="header-entrar">Cadastro Candidato</h1>
            <p class="p-cad">Cadastre-se para ter acesso ao conteúdo completo do nosso site e candidatar-se às vagas de empregos disponibilizadas pelas empresas que precisam de você na equipe!</p>

            <form action="proc_cad_candidato.php" method="POST">
                <div class="input-group">
                    <div class="input-box">
                        <div class="label-cad">
                            <label for="nome">Nome completo: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" class="input" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="CPF">CPF: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" id="CPF" name="CPF" placeholder="xxx.xxx.xxx-xx" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="data_nascimento">Data de nascimento: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="date" id="data_nascimento" name="data_nascimento" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="CEP">CEP: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="text" id="CEP" name="CEP" placeholder="xxxxx-xxx" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label>Gênero <span class="obrigatorio">*</span></label>
                        </div>
                        <select name="genero" id="genero" required>
                            <div class="genero-group">
                                <option value="">--Selecione--</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Outros">Outros</option>
                            </div>
                        </select>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="email">Email: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field input-field">
                            <input type="email" id="email" name="email" placeholder="Digite seu email" required>
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

                    <div class="field button-field">
                        <button class="enviar" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- <div class="img-cad">
        <img src="./src/img/img-curriculo.svg" alt="img-cad-candidatos">
    </div> -->
</section>

<?php require "rodape.php"; ?>