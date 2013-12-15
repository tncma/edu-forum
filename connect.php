<?php
$con=mysql_connect("localhost","root","");
if(!$con){
    die("Database connection failed: " . mysql_error());
                }
$selec=mysql_select_db("querysoverflow",$con);
?>
