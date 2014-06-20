<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form enctype="multipart/form-data" action="print.php" method="post">
  <fieldset>
    <label>
    <span>Selecione Produto</span>
      <select name="produto">
        <?php
					require_once("conexao.php");
					
					$consulta = mysql_query("SELECT * FROM jaquinha");
					
					while($resconsulta = mysql_fetch_array($consulta)){
						$id = $resconsulta['id'];
						$descricaoProd = $resconsulta['descricao'];
						
						echo "<option value=\"$id\">$descricaoProd</option>";
						
						
					}
				
				
				?>
      </select>
    </label>
    
    <label>
    	<span>Quantidade de etiquetas</span>
      <input type="text" name="quantidade" />
    </label>
 
 
   <input name="acao" type="hidden" value="procurar" />
  <input name="enter" type="submit" value="Enter" />
  </fieldset>
  

</form>
</body>
</html>