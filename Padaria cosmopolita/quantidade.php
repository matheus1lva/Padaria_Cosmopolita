<?php
require_once("conexao.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
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
<?php

$get_id = $_GET['id'];
if(isset($_POST['acao']) && $_POST['acao'] == 'imprimir'){

$qtd = $_POST['linhas_etiquetas'];

$select_tudo = mysql_query("SELECT * FROM produtos WHERE id = '$get_id'");

while($pega_tudo = mysql_fetch_array($select_tudo)){
    
    //Nome Do produto, Dias de validade e Preço do bd //
		$descricao = $pega_tudo['descricao'];
		$validade = $pega_tudo['validade'];
		$preco = $pega_tudo['preco'];
		
	
        //Define A fabricação e A data de vencimento
        $fabricao = date('d/m/Y');			
	list($dia, $mes, $ano) = explode('/', date('d/m/Y'));
        $vencimento = strftime('%d/%m/%Y', mktime(0, 0, 0, $mes, $dia + $validade,$ano));

		
		
for($inicio = 0;$inicio < $qtd;$inicio++){	

		
$handle = printer_open("zebra");

printer_start_doc($handle, "My Document");
printer_start_page($handle);

$font = printer_create_font("Arial", 25, 7, PRINTER_FW_MEDIUM, false, false, false, 0);
$font_desc = printer_create_font("Arial", 40, 9, PRINTER_FW_MEDIUM, false, false, false, 0);

//Nome Da Padaria
printer_select_font($handle, $font);
printer_draw_text($handle, "Padaria Cosmopolita", 25, 12);
printer_draw_text($handle, "Padaria Cosmopolita", 297, 12);
printer_draw_text($handle, "Padaria Cosmopolita", 567, 12);


//Descricao
printer_select_font($handle, $font_desc);
printer_draw_text($handle, $descricao, 2, 42);
printer_draw_text($handle, $descricao, 272, 42);
printer_draw_text($handle, $descricao, 542, 42);

//Impressao da Fabricação e da validade
printer_select_font($handle, $font);
printer_draw_text($handle, "Fabricacao:  ".$fabricao, 2, 85);
printer_draw_text($handle, "Fabricacao:  ".$fabricao, 272, 85);
printer_draw_text($handle, "Fabricacao:  ".$fabricao, 542, 85);
printer_draw_text($handle, "Validade:  ".$vencimento, 2, 114);
printer_draw_text($handle, "Validade:  ".$vencimento, 272, 114);
printer_draw_text($handle, "Validade:  ".$vencimento, 542, 114);


//Impressao Do preço.
printer_select_font($handle, $font_desc);
printer_draw_text($handle, "R$  ".$preco, 2, 145);
printer_draw_text($handle, "R$  ".$preco, 272, 145);
printer_draw_text($handle, "R$  ".$preco, 542, 145);

//Finaliza a Font
printer_delete_font($font);
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);


}//Laço do For
	
	
}//Laço do While
	
	
	
}//Laço da verificação se o Form Foi Aplicado.
	


?>
</body>
</html>
