<html>
<head>
	<title></title>
</head>
<body>

<?php
//tratando os erros
error_reporting(E_ALL ^ E_NOTICE);

// coletando o nome do curso
$curso = $_GET["c"];

echo $curso;

// Abre a conexão com o mysql:
$conexao = mysqli_connect("localhost", "id5005369_admin", "suzi1986", "id5005369_qr_code") or die ("Foi impossível conectar na base.");

// executando a consulta no banco de dados:
$query = mysqli_query($conexao, "SELECT * FROM qr_tabela WHERE curso = '$curso' GROUP BY professor") 
or die("<br>Erro: ".mysqli_error($conexao));
?>

<table>
<tr>
	<td><strong>Professor</strong></td>
	
</tr>
<?php
// Colocando os dados retornados pela consulta em um vetor $resultado
while ($resultado = mysqli_fetch_array($query)) { 
	?>
<tr>
	<td><a href="exibe_sala.php?p=<?php echo $resultado["professor"]?>"><?php echo $resultado["professor"]?></a></td>
	
</tr>
<?php
	} // fim while
?>
</table>
</body>
</html>