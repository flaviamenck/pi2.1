<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/style_header_footer.css">
    <link rel="stylesheet" href="./css/style_index.css">
    <link rel="stylesheet" href="./css/style_servicos.css">
    <link rel="stylesheet" href="./css/style_entrar.css">
    <link rel="stylesheet" href="./css/style_sobre_nos.css">
    <link rel="stylesheet" href="./css/style_cadastro.css">
    <!-- <link rel="stylesheet" href="./css/style_responsivo.css"> -->
    <title>Senior Job</title>
</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <h1>SENIOR JOB</h1>
            </div>

            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="../index.php" class="nav-link">Início</a></li>
                    <li class="nav-item"><a href="../servicos.php" class="nav-link">Serviços</a></li>
                    <li class="nav-item"><a href="../sobre_nos.php" class="nav-link">Sobre</a></li>
                </ul>
            </div>

            <div class="login-button">
                <button><a href="../servicos.php">Entrar</a></button>
            </div>

            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="../src/img/menu_white_36dp.svg"></button>
            </div>
        </nav>

        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="../index.php" class="nav-link">Início</a></li>
                <li class="nav-item"><a href="../servicos.php" class="nav-link">Serviços</a></li>
                <li class="nav-item"><a href="../sobre_nos.php" class="nav-link">Sobre</a></li>
            </ul>

            <div class="login-button">
            <button><a href="../servicos.php">Entrar</a></button>
            </div>
        </div>
    </header>
</body>

</html>