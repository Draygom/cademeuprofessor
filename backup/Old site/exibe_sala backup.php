<html>
<head>
	<title></title>
</head>
<body>

<?php
// tratando os erros
error_reporting(E_ALL ^ E_NOTICE);

// recebendo o nome do professor
$professor = $_GET["p"];

// recebendo o nome da disciplina
$disciplina = $_GET["d"];

// Array com os dias da semana
$diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');

// Dia atual:
$data = date('Y-m-d');

// Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
$diasemana_numero = date('w', strtotime($data));

// Exibe o dia da semana com o Array
$hoje = $diasemana[$diasemana_numero];

// Abre a conexão com o mysql:
$conexao = mysqli_connect("localhost", "id5005369_admin", "suzi1986", "id5005369_qr_code") or die ("Foi impossível conectar na base.");

if ($professor <> ""){
	// executando a consulta no banco de dados:
	$query = mysqli_query($conexao, "SELECT * FROM qr_tabela WHERE professor = '$professor' AND dia = '$hoje'")
	or die("<br>Erro: ".mysqli_error($conexao));
}

if ($disciplina <> ""){
	// executando a consulta no banco de dados:
	$query = mysqli_query($conexao, "SELECT * FROM qr_tabela WHERE disciplina = '$disciplina' AND dia = '$hoje'")
	or die("<br>Erro: ".mysqli_error($conexao));
}



?>

<table>
<tr>
	<td><strong>Professor</strong></td>
	<td><strong>Sala</strong></td>
	<td><strong>Disciplina</strong></td>

</tr>
<?php
// Colocando os dados retornados pela consulta em um vetor $resultado
while ($resultado = mysqli_fetch_array($query)) {
	?>
<tr>
	<td><?php echo $resultado["professor"]?></td>
	<td><?php echo $resultado["sala"]?></td>
	<td><?php echo $resultado["disciplina"]?></td>

</tr>
<?php
	} // fim while
?>
</table>
</body>
</html>
