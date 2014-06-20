<?php

/*
$_SESSION['PrintBuffer'] = "descricao             descricao             descricao\n Fabricaзгo: data_fabricacao      Fabricaзгo: data_fabricacao     Fabricaзгo: data_fabricacao\n Validade: vencimento          Validade: vencimento             Validade: vencimento\n Preзo: valor       Preзo: valor          Preзo: valor";				
$handle = printer_open("zebra");
//printer_set_option($handle, PRINTER_MODE, "RAW");
//print $_SESSION['PrintBuffer'];
printer_write($handle, $_SESSION['PrintBuffer']);
printer_close($handle);
*/

$handle = printer_open("zebra");
$desc = " descricaodescricaode           descricaodescricaode            descricaodescricaode";
$fab="Fabricaзгo: data_fabricacao                    Fabricaзгo: data_fabricacao                Fabricaзгo: data_fabricacao";
$val="Validade: vencimento                               Validade: vencimento                              Validade: vencimento";
$preco="Preзo: valor                              Preзo: valor                           Preзo: valor";		
printer_start_doc($handle, "My Document");
printer_start_page($handle);

$font = printer_create_font("Arial", 25, 7, PRINTER_FW_MEDIUM, false, false, false, 0);
$font_desc = printer_create_font("Arial", 40, 9, PRINTER_FW_MEDIUM, false, false, false, 0);

printer_select_font($handle, $font_desc);
printer_draw_text($handle, "descricao", 1, 12);
printer_draw_text($handle, "descricao", 270, 12);
printer_draw_text($handle, "descricao", 540, 12);

printer_select_font($handle, $font);
printer_draw_text($handle, "Fabricacao:".$fab, 1, 50);
printer_draw_text($handle, "Fabricacao:".$fab, 270, 50);
printer_draw_text($handle, "Fabricacao:".$fab, 540, 50);
printer_draw_text($handle, "Validade:".$val, 1, 80);
printer_draw_text($handle, "Validade:".$val, 270, 80);
printer_draw_text($handle, "Validade:".$val, 540, 80);

printer_select_font($handle, $font_desc);
printer_draw_text($handle, $preco, 1, 110);
printer_draw_text($handle, $preco, 270, 110);
printer_draw_text($handle, "R$".$preco, 540, 110);


printer_delete_font($font);

printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);


?>