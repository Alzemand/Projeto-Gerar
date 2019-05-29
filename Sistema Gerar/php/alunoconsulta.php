<?php
$servername = "localhost";
$username = "root";
$password = "toor";
$dbname = "systemag";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM aluno";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["cpf"]. " - Name: " . $row["nome"]. " " . $row["profissao"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 