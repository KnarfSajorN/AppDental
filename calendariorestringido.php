<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

</head>
<body>
<form action="#" id="elForm">
  <label>Feche inicio</label>


  <input 
   id="infechaini" 
   type="date" name="infechaini" onChange="sinDomingos();" 
   onblur="obtenerfechafinf1();" style="height:30px;" required="required"/>
   <input id="elSubmit" type="submit" style="display:none;" />


</form>

<?php

function saber_dia($nombredia) 
{
$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
$fecha = $dias[date('N', strtotime($nombredia))];
echo $fecha;
}
// ejecutamos la función pasándole la fecha que queremos

$fecha1 = date("Y-m-d");
saber_dia('2019-04-21');
echo $fecha1 ;
saber_dia($fecha1);

?>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  <script>
  $(function() {
   $('#txtDate').datepicker({ 
       beforeShowDay: $.datepicker.noWeekends 
   });
});



var elDate = document.getElementById('infechaini');
var elForm = document.getElementById('elForm');
var elSubmit = document.getElementById('elSubmit');

function sinDomingos(){
    var day = new Date(elDate.value ).getUTCDay();
    // Días 0-6, 0 es Domingo 6 es Sábado
    // 1 lunes
    // 2 martes
    // 3 miercoles
    // 4 jueves
    // 5 viernes
    // 6 sabado
<?php

$cuantos = 2;
if ($cuantos>0) 
{
 ?>
    elDate.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
    if( day == <?php echo 0?> )
    {
       elDate.setCustomValidity('Domingos no disponibles, por favor seleccione otro día');
    } 
    else if( day == 6 )
    {
       elDate.setCustomValidity('Sabados no disponibles, por favor seleccione otro día');
    } 
    else {
       elDate.setCustomValidity('');
    }
    if(!elForm.checkValidity()) {elSubmit.click()};
<?php }  ?>

}

function obtenerfechafinf1(){
    sinDomingos();
}





</script>


</body>
</html>



