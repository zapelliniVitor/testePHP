<?php
//conexão com o banco de dados
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//consulta SQL
$sql = "SELECT Tb_banco.nome, Tb_convenio.verba, Tb_contrato.codigo, Tb_contrato.data_inclusao, Tb_contrato.valor, Tb_contrato.prazo 
FROM Tb_banco 
JOIN Tb_convenio ON Tb_banco.codigo = Tb_convenio.banco 
JOIN Tb_convenio_servico ON Tb_convenio_servico.convenio = Tb_convenio.convenio 
JOIN Tb_contrato ON Tb_contrato.convenio_servico = Tb_convenio_servico.codigo";

$result = $conn->query($sql);

//exibição dos resultados
if ($result->num_rows > 0) {
    echo "<table><tr><th>Nome do banco</th><th>Verba</th><th>Código do contrato</th><th>Data de inclusão</th><th>Valor</th><th>Prazo</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["verba"] . "</td><td>" . $row["codigo"] . "</td><td>" . $row["data_inclusao"] . "</td><td>" . $row["valor"] . "</td><td>" . $row["prazo"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum resultado encontrado.";
}

$conn->close();
