<?php
$conecta = mysql_connect("localhost", "root", "") or die(mysql_error());
if($conecta){
    mysql_select_db("padaria") or die(mysql_error());
}