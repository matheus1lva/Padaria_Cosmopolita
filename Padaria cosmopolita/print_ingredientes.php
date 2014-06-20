<?php
include_once("conexao.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Imprimir Ingredientes</title>
    <style type="text/css">
		form fieldset{
			border:0;
		}
		form span{
			font:16px Tahoma, Geneva, sans-serif;
			color:#000;
			font-weight:bolder;
		display:block;
		}
		
	
	</style>
</head>

<body>
<form name="form1" method="post" action="">
<fieldset>
    <span>Linhas De Etiquetas (3 etiquetas por linha)</span>
    <input type="text" name="linhas_etiquetas" id="linhas_etiquetas"><br>

    
    <input name="acao" type="hidden" id="acao" value="imprimir">
    <input type="submit" value="Imprimir" />

</fieldset>
</form>
</body>
<?php

$get_id = $_GET['id'];
if(isset($_POST['acao']) && $_POST['acao'] == 'imprimir'){

$qtd = $_POST['linhas_etiquetas'];
$select_tudo = mysql_query("SELECT * FROM produtos WHERE id = '$get_id'");



while($pega_tudo = mysql_fetch_array($select_tudo)){
		$ingredientes1 = $pega_tudo['ingredientes1'];
		$ingredientes2 = $pega_tudo['ingredientes2'];
		$ingredientes3 = $pega_tudo['ingredientes3'];
		$ingredientes4 = $pega_tudo['ingredientes4'];
		$ingredientes5 = $pega_tudo['ingredientes5'];
		$ingredientes6 = $pega_tudo['ingredientes6'];
		
		
		
		for($inicio = 0;$inicio < $qtd;$inicio++){	
		
		
		$handle = printer_open("zebra");
		printer_start_doc($handle, "My Document");
printer_start_page($handle);

$font = printer_create_font("Arial", 25, 7, PRINTER_FW_MEDIUM, false, false, false, 0);

printer_select_font($handle, $font);
printer_draw_text($handle, $ingredientes1, 1, 12);
printer_draw_text($handle, $ingredientes2, 1, 32);
printer_draw_text($handle, $ingredientes3, 1, 52);
printer_draw_text($handle, $ingredientes4, 1, 72);
printer_draw_text($handle, $ingredientes5, 1, 92);
printer_draw_text($handle, $ingredientes6, 1, 112);


printer_draw_text($handle, $ingredientes1, 270, 12);
printer_draw_text($handle, $ingredientes2, 270, 32);
printer_draw_text($handle, $ingredientes3, 270, 52);
printer_draw_text($handle, $ingredientes4, 270, 72);
printer_draw_text($handle, $ingredientes5, 270, 92);
printer_draw_text($handle, $ingredientes6, 270, 112);

printer_draw_text($handle, $ingredientes1, 540, 12);
printer_draw_text($handle, $ingredientes2, 540, 32);
printer_draw_text($handle, $ingredientes3, 540, 52);
printer_draw_text($handle, $ingredientes4, 540, 72);
printer_draw_text($handle, $ingredientes5, 540, 92);
printer_draw_text($handle, $ingredientes6, 540, 112);

printer_delete_font($font);

printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);
		
		
		
		
		}
		
		
		
		
}
		
}


?>

</html>

