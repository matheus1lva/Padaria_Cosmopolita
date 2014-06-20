<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listagem De Produtos</title>

<style type="text/css">
table{
	margin:0 auto;
}


</style>


</head>

<body>
<table width="100%" border="1" cellpadding="1">
  <tr class="principal">
    <td align="center" valign="middle" bgcolor="#333333" style="color:#FFF; font-weight:bold;">Produto</td>
    <td align="center" valign="middle" bgcolor="#333333" style="color:#FFF; font-weight:bold;">Valor</td>

    <td align="center" valign="middle" bgcolor="#333333" style="color:#FFF; font-weight:bold;">Validade</td>
    <td align="center" valign="middle" bgcolor="#333333" style="color:#FFF; font-weight:bold;">Ingredientes</td>
    <td align="center" valign="middle" bgcolor="#333333" style="color:#FFF; font-weight:bold;">A&ccedil;&atilde;o</td>
  </tr>
  <?php
  include("conexao.php");
  
  $lista_itens = mysql_query("SELECT * FROM produtos ORDER BY descricao ASC");
  
  while($pega_itens = mysql_fetch_array($lista_itens)){
	$id = $pega_itens['id'];
	$descricao = $pega_itens['descricao'];  

	$val	= $pega_itens['validade'];
	$preco = $pega_itens['preco'];

	$ingredientes1 = $pega_itens['ingredientes1'];
	$ingredientes2 = $pega_itens['ingredientes2'];
	$ingredientes3 = $pega_itens['ingredientes3'];
	$ingredientes4 = $pega_itens['ingredientes4'];
	$ingredientes5 = $pega_itens['ingredientes5'];
	$ingredientes6 = $pega_itens['ingredientes6'];	
	
	
 
  ?>
  
  
  <tr class="sec">
    <td><?php echo $descricao; ?></td>
     <td><?php echo $preco; ?></td>
    

   <td><?php echo $val; ?></td>
    <td><?php echo $ingredientes1.'<br />';
	echo $ingredientes2.'<br />';
	echo $ingredientes3.'<br />';
	echo $ingredientes4.'<br />';
	echo $ingredientes5.'<br />';
	echo $ingredientes6;
			
	 ?></td>
    <td><?php echo '<a href="editar.php?id='.$id.'">Editar</a><br />';
		echo '<a href="quantidade.php?id='.$id.'">Imprimir</a><br />';
		echo '<a href="print_ingredientes.php?id='.$id.'">Imprimir Ingredientes</a>';
		?>
	</td>
    
  </tr>
 
 <?php  } ?>
</table>
</body>
</html>