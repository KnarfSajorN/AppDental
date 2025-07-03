<?php
$Sala = rand(1009999, 999999999);


?>

<a href="javascript:otra_ventana('https://appr.tc/r/<?php echo $Sala?>')">
aqui 
</a>




<script languaje="JavaScript">
function otra_ventana(direccion)
{
var ruta=direccion;
var caracteristicas="toolbar=0, location=0, directories=0, resizable=0, scrollbars=0, height=500, width=500, top=0, left=0";
win=window.open(ruta ,"",caracteristicas);
}
</script>
