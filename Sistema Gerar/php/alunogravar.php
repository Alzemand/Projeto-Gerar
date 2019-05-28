<?php

$servername = "localhost";
$username = "root";
$password = "toor";
$database = "systemag";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Validador
$path = dirname(__DIR__);
$file = $path . '/validador/cpf.php';
$file2 = $path . '/validador/campo.php';
$file3 = $path . '/validador/formatar.php';
include($file);
include($file2);
include($file3);


$cpf = $_POST['cpf'];
$cpf = preg_replace("/[^0-9]/", "", $cpf);
$rg = $_POST['rg'];
$nome = $_POST['nome'];
$nome = formataCampo($nome);
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$profissao = $_POST['profissao'];
$profissao = formataCampo($profissao);

// Iniciar sessão
session_start();

$_SESSION['cpf'] = $cpf;
$_SESSION['rg'] = $rg;
$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['telefone'] = $telefone;
$_SESSION['profissao'] = $profissao;

if (validaCPF($cpf) == true && validaCampo($nome) == true) {
    $sql = "INSERT INTO aluno (cpf, rg, nome, telefone, email, profissao)
    VALUES ('$cpf', '$rg', '$nome', '$telefone', '$email', '$profissao')";
    if (mysqli_query($conn, $sql)) {
        unset($_SESSION['cpf']);
        unset($_SESSION['rg']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        unset($_SESSION['telefone']);
        unset($_SESSION['profissao']);
        header("location: ../aluno_cadastrar.php?cpf=cadastrado&nome=$nome");
    }elseif (mysqli_errno($conn) == 1062) {
        header("location: ../aluno_cadastrar.php?cpf=duplicado");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} elseif (validaCPF($cpf) == true && validaCampo($nome) == false) {
    header("location: ../aluno_cadastrar.php?nome=erro");
} elseif (validaCPF($cpf) == false && validaCampo($nome) == true) {
    header("location: ../aluno_cadastrar.php?cpf=erro");
} else {
    header("location: ../aluno_cadastrar.php?cpf=erro&nome=erro");
}

mysqli_close($conn);

?>
