
<script>
//version 1 tabla dinamica <table id="Tabla_Rapida_MP"></table>

var data_table = [];//datos que recibe la tabla
var titulo_tabla = "Pacientes";//titulo de la tabla para las impresiones
<?php
include 'funciones/conn3.php';

//query para sacar la informacion
$ID = $_SESSION['ID'];
if ($_SESSION['vista'] == 0) 
{$queryList=mysqli_query($conn3,"SELECT * FROM  cliente order by cliente_id");}
elseif ($_SESSION['vista'] == 1) 
{$queryList=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id =$ID order by cliente_id");} 
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
  $boton1='';
  $cliente_id=$rowMotorizado['cliente_id'];
  $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
  $nombre_cliente=str_replace("'",'"',$rowMotorizado['nombre_cliente']);
  $direccion_cliente=str_replace("'",'"',$rowMotorizado['direccion_cliente']);
  $telefono_cliente=str_replace("'",'"',$rowMotorizado['telefono_cliente']);
  $whatsapp=str_replace("'",'"',$rowMotorizado['whatsapp']);
  $correo_cliente=str_replace("'",'"',$rowMotorizado['correo_cliente']);

  $boton1 .= "<a href='Historia_Clinica.php?clienteId={$cliente_id}' title='Agregar Historia'><i class='fas fa-file-medical'></i> </a> |";
  $boton1 .= "<a href='Historial_Clinico.php?clienteId={$cliente_id}' title='Ver historial'><i class='fas fa-book-medical'></i> </a> |";
  $boton1 .= "<a href='agregarCitas.php?clienteId={$cliente_id}' title='Agregar Cita'><i class='fa fa-calendar'></i> </a> |";
  $boton1 .= "<a href='editarPaciente?clienteId={$cliente_id}' title='Editar Cliente'><i class='fa fa-pencil'></i> </a> |";
  $boton1 .= "<a href='historiaImagenes.php?clienteId={$cliente_id}' title='Anexar Archivos'><i class='fa fa-folder-open-o'></i> </a> |";

?>
//accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
data_table.push( [ "<?php echo $nombre_cliente?>", "<?php echo $CODI_CLIENTE?>", "<?php echo $direccion_cliente?>", "<?php echo $telefono_cliente?>" ,"<?php echo $whatsapp?>" ,"<?php echo $correo_cliente?>" ,"<?php echo $boton1;?>"] );
<?php
}
?>
</script>

/////////////////////////////////////////////////////////////////////

<script>//version 2 tabla rapida <table id="Tabla_Rapida_AJAX"></table>
var titulo_tabla = "Pacientes";
<?php if ($_SESSION['vista'] == 0){?>
query_tabla_ajax="<?php echo "SELECT * FROM  cups"; ?>";
<?php }elseif ($_SESSION['vista'] == 1){  ?>
query_tabla_ajax="<?php echo "SELECT * FROM  cliente where usuario_id = $ID order by cliente_id";?>";
<?php }  ?>

columnas=['codigo'];

columnastablas=[
                { "data": "codigo" },
                { "data": "codigo" },
                { "data": "codigo"},
                { "data": "codigo" },
                { "data": "codigo" },
                { "data": "codigo" },
                { "data": function ( row, type, set ) {
                        botones="";
                        botones+="<a href='Historia_Clinica.php?clienteId="+row.codigo+"' title='Agregar Historia'><i class='fas fa-file-medical'></i> </a>";
                        botones+="<a href='Historial_Clinico.php?clienteId="+row.codigo+"' title='Ver historial'><i class='fas fa-book-medical'></i> </a>";
                        botones+="<a href='agregarCitas.php?clienteId="+row.codigo+"' title='Agregar Cita'><i class='fa fa-calendar'></i> </a>";
                        botones+="<a href='editarPaciente?clienteId="+row.codigo+"' title='Editar Cliente'><i class='fa fa-pencil'></i> </a>";
                        botones+="<a href='historiaImagenes.php?clienteId="+row.codigo+"' title='Anexar Archivos'><i class='fa fa-folder-open-o'></i> </a>";
                        return botones;
                        }
                } 
                
            ];
</script>