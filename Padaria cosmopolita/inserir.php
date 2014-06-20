
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Inserir Produtos</title>
	<link href="inserir.css" rel="stylesheet" media="screen" />
	
</head>

<body>
<form method="post" action="" enctype="multipart-form/data">
	<fieldset>
		*Todos os campos requeridos.
		<label>
			<span>Descrição*(Máximo de 20 caracteres)</span>
			<input type="text"  name="descricao" id="descricao"/>
		</label>
		<label>
			<span>Validade em n&uacute;meros(quantidade de dias)*</span>
			<input type="text"  name="validade" id="validade"/>
		</label>
		<label>
			<span>Preço*(Com ,[virgula])</span>
			<input type="text"  name="preco" id="preco"/>
		</label>		
		
			<span>Ingredientes*<br>
           (máximo de 28 caracteres por campo incluindo ,[virgula])</span>
			<input name="ingredientes1" type="text" maxlength="28">
            <input name="ingredientes2" type="text" maxlength="28">
            <input name="ingredientes3" type="text" maxlength="28">
            <input name="ingredientes4" type="text" maxlength="28">
            <input name="ingredientes5" type="text" maxlength="28">
            <input name="ingredientes6" type="text" maxlength="28">
		
	</fieldset>
	<input type="hidden" name="acao" value="cadastrar" />
	<input type="submit" class="btn" value="Cadastrar" />
	
</form>

<?php
include_once("conexao.php");

if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
	$descricao = trim($_POST['descricao']);
	$validade = trim($_POST['validade']);
	$preco = trim($_POST['preco']);
	$ingredientes1 = trim($_POST['ingredientes1']);
	$ingredientes2 = trim($_POST['ingredientes2']);
	$ingredientes3 = trim($_POST['ingredientes3']);
	$ingredientes4 = trim($_POST['ingredientes4']);
	$ingredientes5 = trim($_POST['ingredientes5']);
	$ingredientes6 = trim($_POST['ingredientes6']);

	
	//Verificação
	if(empty($descricao)){
		echo '<div id="erro">Preencha o campo Descrição!</div>';
	}
	if(empty($validade)){
		echo '<div id="erro">Preencha o campo Validade!</div>';
	}
	if(empty($preco)){
		echo '<div id="erro">Preencha o campo Preço!</div>';
	}else{
	

	
	
	//list($dia, $mes, $ano) = explode('/',date('d/m/Y'));
    //  $vencimento = strftime('%d/%m/%Y', mktime(0, 0, 0, $mes, $dia + $validade,$ano));
	
	
	
	
	
	
	
	$insert = mysql_query("INSERT INTO produtos (descricao, validade, preco, ingredientes1, ingredientes2, ingredientes3, ingredientes4, ingredientes5, ingredientes6) 
	VALUES ('$descricao','$validade', '$preco', '$ingredientes1', '$ingredientes2', '$ingredientes3', '$ingredientes4', '$ingredientes5', '$ingredientes6')");
	
	if($insert){
		echo '<script>alert("Cadastrado Com sucesso")</script>';
	}else{
		echo '<script>alert("Erro ao cadastrar, tente novamente!")</script>';
	}

}

//chave da verificação
}

?>

</body>
</html>
