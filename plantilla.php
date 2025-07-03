
<script src="js/sweetalert2.all.min.js"></script>
<style type="text/css">
  .swal2-popup
  {
    width: 50%;
  }
</style>
<script type="text/javascript">

var text_areas = document.getElementsByTagName('textarea');

  for (i = 0; i < text_areas.length; i++) {
    text_areas[i].setAttribute('class','Plantillas'+i+' '+text_areas[i].className);

    var boton = document.createElement("a");
    boton.setAttribute('title','Aplicar Planilla');
    boton.setAttribute('style','float: right;top: -35px;left: -5px;position: relative;color: #3c8dbc;');
    boton.setAttribute('onclick','PlantillaTextarea('+i+')');
    boton.innerHTML='<i class="fas fa-scroll"></i>';

    text_areas[i].insertAdjacentElement("afterend", boton);

    //K.C
  }

  var data = [];
  <?php
  include 'funciones/conn3.php';
  $queryList=mysqli_query($conn3,"SELECT id,titulo,plantilla FROM  Plantilla_Textarea");
  $nrowl=mysqli_num_rows($queryList);
  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
    $id=$rowMotorizado['id'];
    $plantilla=trim(preg_replace('/\r\n/', '\n', $rowMotorizado['plantilla']));
    $titulo=str_replace('"',"'",$rowMotorizado['titulo']);

    $opciones .= '<option value="'.$id.'">'.$titulo.'</option>';
    ?>
    data[<?php echo $id?>] = ( ["<?php echo $titulo?>", "<?php echo $plantilla?>"]);
    <?php
  }
  ?>

function PlantillaTextarea(valor)
{

  (async () => {

  const { value: formValues } = await Swal.fire({
    title: 'Plantillas',
    html:
      '<select id="swal-input1" class="swal2-input" onchange="plantilla(this.value);" style="width:100%;position: relative;left: -25px;"><option value="">Seleccione</option><?php echo $opciones ?></select>' +
      '<textarea id="swal-input2" class="swal2-input" style="max-width:100%; height:493px; width:100%;position: relative;left: -25px;"></textarea>',
    focusConfirm: false,
    preConfirm: () => {
      return [
        document.getElementById('swal-input1').value,
        document.getElementById('swal-input2').value
      ]
    }
  })

  if (formValues) {
    document.getElementsByClassName('Plantillas'+valor)[0].value=(formValues[1]);
  }

  })()
}

function plantilla(valor)
{
    document.getElementById('swal-input2').value=data[valor][1];
}
</script>