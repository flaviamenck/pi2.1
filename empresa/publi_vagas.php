<?php require "cabecalho.php"; ?>
<section class="form-entrar forms">
    <div class="form login">
        <div class="form-content">
            <h1 class="header-entrar">Cadastro de Vagas</h1>
            <p class="p-cad">Cadastre aqui uma vaga disponível em sua empresa.</p>
            <form action="proc_publi_vagas.php" method="POST">
                <div class="input-group">
                    <div class="input-box">
                        <div class="label-cad">
                            <label for="funcao">Função: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field textarea-field">
                            <input type="text" class="input" id="funcao" name="funcao" placeholder="Digite a função disponível" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="salario">Salário: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field textarea-field">
                            <input type="text" class="input" id="salario" name="salario" placeholder="R$0000,00" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="carga_horaria">Carga horária: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field textarea-field">
                            <input type="text" class="input" id="carga_horaria" name="carga_horaria" placeholder="00h" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="descricao">Descrição: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field textarea-field">
                            <input type="text" class="input" id="descricao" name="descricao" placeholder="Descreva os requisitos da vaga" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label for="local">Local: <span class="obrigatorio">*</span></label>
                        </div>
                        <div class="field textarea-field">
                            <input type="text" class="input" id="local" name="local" placeholder="Cidade localizada" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="label-cad">
                            <label>Tipo de vaga: <span class="obrigatorio">*</span></h4>
                        </div>
                        <select name="tipo_vaga" id="tipo_vaga" required>
                            <div class="genero-group">
                                <option value="">--Selecione--</option>
                                <option value="Home Office">Home Office</option>
                                <option value="Presencial">Presencial</option>
                                <option value="Híbrido">Híbrido</option>
                            </div>
                        </select>
                    </div>
                    <div class="input-box">
                        <div class="label-cad">
                            <label>Contratação: <span class="obrigatorio">*</span></h4>
                        </div>
                        <select name="contratacao" id="contratacao" required>
                            <div class="genero-group">
                                <option value="">--Selecione--</option>
                                <option value="Carteira assinada (CLT)">Carteira assinada (CLT)</option>
                                <option value="Freelancer">Freelancer</option>
                                <option value="Estágio">Estágio</option>
                                <option value="Trabalho Temporário">Trabalho Temporário</option>
                            </div>
                        </select>
                    </div>

                    <div class="field button-field">
                        <button class="enviar" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php require "../rodape.php"; ?>