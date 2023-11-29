<?php require './cabecalho_nao_logado.php'; ?>

<section class="form-entrar forms">
    <div class="form login">
        <div class="form-content">
            <h1 class="header-entrar">Entrar</h1>

            <form action="proc_login.php" method="post">
                <div class="field input-field">
                    <input type="email" placeholder="Digite seu email" name="email" class="input">
                </div>

                <div class="field input-field">
                    <input type="password" placeholder="Digite sua senha" name="senha" class="password">
                    <i class="bx bx-hide eye-icon"></i>
                </div>

                <div class="form-link">
                    <a href="#" class="forgot-pass">Esqueceu sua senha?</a>
                </div>

                <div class="field button-field">
                    <button>Entrar</button>
                </div>

            </form>
            <div class="form-link">
                <span>Não tem uma conta? <a href="cad_candidato.php" class="link signup-link">Cadastre-se</a>.</span>
            </div>

        </div>
        <!-- <div class="line"></div>

            <div class="media-options">
                <a href="#" class="field facebook">
                <i class="bx bxl-facebook facebook-icon"></i>
                <span>Entrar com Facebook</span></a>
            </div>

            <div class="media-options">
                <a href="#" class="field google">
                <img src="./src/img/img-google.svg" alt="Google" class="google-img">
                <span>Entrar com Google</span></a>
            </div> -->
    </div>
</section>


<?php require '../rodape.php'; ?>