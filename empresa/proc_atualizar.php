<?php
require('cabecalho.php');
if (
    !empty($_POST['nome_fantasia']) && !empty($_POST['email'])
) {
    // // Validar o formato do email
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        // Conecta no banco de dados
        require "../conecta_bd.php";
        if (array_key_exists('id_empresa', $_SESSION) && $_SESSION['id_empresa'] && !isset($empresa)) {
            $res = $pdo->query("SELECT * FROM empresa WHERE empresa_id = '{$_SESSION['id_empresa']}'");
            $empresa = $res->fetch();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_SESSION['id_empresa'];
            $razao_social = $_POST['razao_social'];
            $nome_fantasia = $_POST['nome_fantasia'];
            $CNPJ = $_POST['CNPJ'];
            $IE = $_POST['IE'];
            $CEP = $_POST['CEP'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            $stmt = $pdo->prepare("UPDATE empresa SET razao_social = :razao_social, nome_fantasia = :nome_fantasia, CNPJ = :CNPJ, IE = :IE, CEP = :CEP, email = :email, senha = :senha WHERE empresa_id = :empresa_id");

            $stmt->bindParam(':empresa_id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':razao_social', $razao_social, PDO::PARAM_STR);
            $stmt->bindParam(':nome_fantasia', $nome_fantasia, PDO::PARAM_STR);
            $stmt->bindParam(':CNPJ', $CNPJ, PDO::PARAM_STR);
            $stmt->bindParam(':IE', $IE, PDO::PARAM_STR);
            $stmt->bindParam(':CEP', $CEP, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $linhas_afetadas = $stmt->execute();            

        } // fim if verifica utilização fora do POST  
        else {
            echo 'Método inválido. Utilize o método POST para atualizar os dados.';
        }
    } else {
        echo '<script type="text/javascript">alert("O email fornecido não é válido!."); window.location.href = "atualizar_cad_empresa.php";</script>';
        exit;
    }
} // fim if verifica os campos preenchidos 
else {
    echo '<script type="text/javascript">alert("Preencha todos os campos, por favor!."); window.location.href = "atualizar_cad_empresa.php";</script>';
}
?>
<?php require 'rodape.php'; ?>