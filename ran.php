<?php

$fecha = date("Y-m-d");
echo $fecha.'<br>';

$fecha7 = date("Y-m-d", strtotime($fecha."+ 7 days"));
echo $fecha7;


?>