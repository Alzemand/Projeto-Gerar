<?php
include('conexao.php');

$sql = "SELECT * FROM aluno";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo('
        <tr>
            <th scope="row">' . $row . '</th>
            <td>' . $row["cpf"] . '</td>
            <td>' . $row["nome"] . '</td>
            <td>' . $row["email"] . '</td>
            <td>
            <a class="btn btn-primary" href="#" role="button">Link</a>
            <a class="btn btn-primary" href="#" role="button">Link</a>
            <a class="btn btn-primary" href="#" role="button">Link</a>
            </td>
        </tr>');

    }
} else {
    echo "0 results";
}

$conn->close();
