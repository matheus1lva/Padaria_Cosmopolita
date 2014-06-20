<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Impressão</title>
<link href="im.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<ul id="et">
<?php
require_once("conexao.php");

if(isset($_POST['acao']) && $_POST['acao'] == 'procurar'){
	$idProd = $_POST['produto'];
	$qtd = $_POST['quantidade'];

for($contador = 0;$contador < $qtd; $contador++){
	
	$query = mysql_query("SELECT * FROM jaquinha WHERE id = '$idProd'");
		while($resprint = mysql_fetch_array($query)){
			$descricao = $resprint['descricao'];
			
			$validade_dias = $resprint['validade'];
			$preco = $resprint['preco'];
			$ingredientes = $resprint['ingredientes'];
			
			$fabricacao = date('d/m/Y');
			
					
	    list($dia, $mes, $ano) = explode('/', date('d/m/Y'));
        $vencimento = strftime('%d/%m/%Y', mktime(0, 0, 0, $mes, $dia + $validade_dias,$ano));
								



			
	
			
/*$_SESSION['PrintBuffer'] = "$descricao                                                   $descricao \n Fabricação: $data_fabricacao                                     Fabricação: $data_fabricacao\n Validade: $vencimento 				          Validade: $vencimento\n Preço: $valor";				
$handle = printer_open("ZDesigner TLP 2844");
//printer_set_option($handle, PRINTER_MODE, "RAW");
//print $_SESSION['PrintBuffer'];
printer_write($handle, $_SESSION['PrintBuffer']);
printer_close($handle);
	*/
	
?>			
		
            	<li>
                	<h2><?php	echo $descricao;?></h2>
                    <?php echo $fabricacao; ?><br />
					<?php echo $vencimento; ?><br />
					<h2><?php echo $preco; ?></h2>
                
                </li>
            
        

<?php
			
		}	



	}
}

?>
</ul>


</body>
</html>