<?php
// sempre colocar esta parte antes de qualquer código
// Iniciando a sessão
session_start();
// Apaga o conteúdo das variáveis
session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sair da sessão!</title>
</head>

<body>
    <?php
    echo '<script type="text/javascript">alert("Você saiu da conta. Até breve!"); window.location.href = "index.php";</script>';
    ?>

</body>

</html>