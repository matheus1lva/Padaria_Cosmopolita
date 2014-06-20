<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
form{
	margin:0 auto;
}
form fieldset{border:0;}
form span{
	display:block;
	font:16px "Trebuchet MS", Arial, Helvetica, sans-serif;
	color:#333;
	font-weight:bolder;
	margin:5px;
}
form input[type=text]{
	width:200px;
	color:#000;
	font:Georgia, "Times New Roman", Times, serif;
	font-weight:bolder;
}
form .btn{
	font:14px Tahoma, Geneva, sans-serif;
	font-weight:bolder;
	color:#000;
	width:auto;
	background-color:#e4e4e4;
}


</style>

</head>

<body>
<form method="post" enctype="multipart/form-data" action="" >
<legend>Editar Produto</legend>
<fieldset>
<?php

include_once("conexao.php");
$get = $_GET['id'];

$busca = mysql_query("SELECT * FROM produtos WHERE id = '$get' " );

while($resbusca = mysql_fetch_array($busca)){
		$descricao = $resbusca['descricao'];

		$validade  = $resbusca['validade'];
		$preco = $resbusca['preco'];
		$ingredientes1  = $resbusca['ingredientes1'];
		$ingredientes2 = $resbusca['ingredientes2'];
		$ingredientes3  = $resbusca['ingredientes3'];
		$ingredientes4  = $resbusca['ingredientes4'];
		$ingredientes5  = $resbusca['ingredientes5'];
		$ingredientes6  = $resbusca['ingredientes6'];
		
		

		
?>		
	<label>
		 <span>Descricao</span>
	  <input type="text" value="<?php echo $descricao;?>" name="desc" />
    </label>
		
		
		 <label>
		 <span>Validade</span>
		 <input type="text" value="<?php echo $validade;?>" name="val" />
		 </label>
		
		 <label>
		 <span>Preço</span>
		 <input type="text" value="<?php echo $preco;?>" name="valor" />
		 </label>
		
		 
		 <span>Ingredientes</span>
		 <input type="text" value="<?php echo $ingredientes1;?>" name="ingredientes1" /><br />
		 <input type="text" value="<?php echo $ingredientes2;?>" name="ingredientes2" /><br />
		 <input type="text" value="<?php echo $ingredientes3;?>" name="ingredientes3" /><br />
		 <input type="text" value="<?php echo $ingredientes4;?>" name="ingredientes4" /><br />
		 <input type="text" value="<?php echo $ingredientes5;?>" name="ingredientes5" /><br />
		 <input type="text" value="<?php echo $ingredientes6;?>" name="ingredientes6" /><br />

<?php

}


?>
<?php
if(isset($_POST['update']) && $_POST['update'] == 'atualizar'){
	
	$desc = $_POST['desc'];
	$val = $_POST['val'];
	$valor = $_POST['valor'];
	$ing1 = $_POST['ingredientes1'];
	$ing2 = $_POST['ingredientes2'];
	$ing3 = $_POST['ingredientes3'];
	$ing4 = $_POST['ingredientes4'];
	$ing5 = $_POST['ingredientes5'];
	$ing6 = $_POST['ingredientes6'];
	
$sql = mysql_query("UPDATE produtos SET descricao = '$desc', validade = '$val', preco = '$valor', ingredientes1 = '$ing1', ingredientes2 = '$ing2', ingredientes3 = '$ing3', ingredientes4 = '$ing4', ingredientes5 = '$ing5', ingredientes6 = '$ing6' WHERE id = '$get' ");




		if($sql){
			echo '<script>alert("Produto Alterado");location.href="tudo.php"</script>';


		}else{
			echo '<script>alert("ERRO")</script>';
		}
	

}
?>
<input type="hidden" name="update" value="atualizar" />
<input name="acao" type="submit" value="Enviar" class="btn" id="acao" />
</fieldset>
</form>
<h3><a href="tudo.php">Voltar Para o Painel</a></h3>

</body>
</html>