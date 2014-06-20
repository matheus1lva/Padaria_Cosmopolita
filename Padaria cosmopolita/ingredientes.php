<?php


$handle = printer_open("zebra");

$fab="xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$fab1="xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$fab2="xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$fab3="xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$fab4="xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$fab5="xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx             xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
printer_start_doc($handle, "My Document");
printer_start_page($handle);

$font = printer_create_font("Arial", 25, 7, PRINTER_FW_MEDIUM, false, false, false, 0);

printer_select_font($handle, $font);
printer_draw_text($handle, $fab, 1, 12);
printer_draw_text($handle, $fab1, 1, 32);
printer_draw_text($handle, $fab2, 1, 52);
printer_draw_text($handle, $fab3, 1, 72);
printer_draw_text($handle, $fab4, 1, 92);
printer_draw_text($handle, $fab5, 1, 112);

printer_delete_font($font);

printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);


?>