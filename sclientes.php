   <?php 
   include 'header.php';
   include 'menu.php';

   $idclientes=0;
   $idclientes = $_GET['idclientes'];

   $IDconfig = $_SESSION['ID'];
 

   
if ($clienteId>0) {

include 'funciones/conn3.php';

        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
 
            $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
           

           }


//     $_SESSION['NOMBRE_USUARIO'] 

}


   $msg = $_GET['msg'];
if ($msg == 1) 
{
$respuesta = ' 
          <div class="callout callout-info">
          <h4>Registrado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 2) 
{
  
  $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código duplicado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 3) 
{
  
  $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código borrado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 4) 
{
  
  $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código usado no es posible borrarlo</h4>
           <p></p>
        </div>';

}
elseif ($msg == 5) 
{
  
  $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código actualizado </h4>
           <p></p>
        </div>';

}




if(isset($_GET['editar_clientes']))
{

  

$codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_clientes'])));

$usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));
 
 

      $queryList=mysqli_query($conn3,"SELECT * FROM  sclientes where id = '$codigo'");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $nombre = $rowMotorizado['nombre'];
            $rut = $rowMotorizado['rut'];
            $correo = $rowMotorizado['correo'];

     
            $telefono = $rowMotorizado['telefono'];
            $direccion = $rowMotorizado['direccion'];
      
            $nota = $rowMotorizado['nota'];
           $idE = $rowMotorizado['id'];
 
        }


}


      ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="config"><i class="fa fa-gears"></i> Salida de inventarios   </a></li>
        <li><a href="#">Clientes </a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Clientes</h4>
          <br>




           <form action="clientes" method="POST">
            <div class="form-row">
 <div class="col-md-12">
<?php echo $respuesta;?>
  </div>
          <div class="form-group col-md-3"> 
<!-- Fecha para verificar disponiblidad   -->  
RUT      


          <input type="text" class="form-control input-lg"  name="rut" value="<?php echo $rut?>"  pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" onblur="onRutBlur(this);" required/>

           
    <div id="div-results"></div>

          </div>
    <div class="form-group col-md-9">
      Nombre  
          <input type="text"  class="form-control input-lg"  name="nombre" value="<?php echo $nombre?>" id="descripcion" required>
           <div id="div-resultsHora"></div>
    </div> 






       
<div class="form-group col-md-6"> 
Correo      
  <input type="email"  class="form-control input-lg" name="correo"  id="correo"  value="<?php echo $correo?>" > 
</div>
<div class="form-group col-md-6"> 
Teléfono      
  <input type="text"  class="form-control input-lg" name="telefono"  id="telefono"  value="<?php echo $telefono?>" > 
</div>
 



<div class="form-group col-md-6"> 
Dirección       
      
  <input type="text"  class="form-control input-lg" name="direccion"  id="direccion"  value="<?php echo $direccion?>" > 
</div>
 
 

<div class="form-group col-md-6"> 
Notas      
      
  <input type="text"  class="form-control input-lg" name="nota"  id="nota"  value="<?php echo $nota?>" > 
</div>
 

              <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
              
              <input  type="hidden" name="id" value="<?php echo $idE?>">
              
            </div>

          <center>
            <?php 
            if ($idE >0 ) {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_clientes"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
            }
            else 
            {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_clientes"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
            }
            ?>
              

          </form>


        </div>


<br>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th class="text-center">Nombre</th>
                    <th class="text-center">RUT </th>
                    <th class="text-center">Correo  </th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Dirección</th>
                    <th class="text-center">   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                     
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
 
                 $queryListA=mysqli_query($conn3,"SELECT * FROM  sclientes  where usuario_id = '$ID'  order by nombre");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $rut= $row_recordset32A['rut'];
                      $correo= $row_recordset32A['correo'];
         
                      $telefono = $row_recordset32A['telefono'];
 
                      $direccion = $row_recordset32A['direccion'];
                      $nota = $row_recordset32A['nota'];
                      




                      
                      echo '      
                      <tr>
                      <td> '.$nombre.'</td>
                      <td> '.$rut.'</td>
                      <td> '.$correo.'</td>
                      <td> '.$telefono.'</td>
                  
                      <td> '.$direccion.'</td>
                     
                      <td>

                      <form method>
                      <font color="#04CC05"> <a href="clientes?borrar_clientes='.$id.'&usuario_id='.$ID.'"> <i class="fa fa-trash" title="Borrar" name="Borrar"></i>  </a></font> |
                      <font color="#04CC05"> <a href="clientes?editar_clientes='.$id.'&usuario_id='.$ID.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>
                      </td>
                      </tr>';

                  }


 ?>


  
                </tbody>
                <tfoot>
                <tr>
                    
                    <th class="text-center">Nombre</th>
                    <th class="text-center">RUT </th>
                    <th class="text-center">Correo  </th>
                    <th class="text-center">Teléfono</th>
            
                    <th class="text-center">Dirección</th>
                    <th class="text-center">   </th>

                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>

 <!-- Funciona para consultar disponibilidad -->

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">


      function validar(){
// estas son las variables que enviamos

        var codigo = $("#codigo").val();
        var usuario_id = $("#usuario_id").val();
       

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_clientes_verificar.php",
            data: {codigo:codigo, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

 

 
</script>


<script type="text/javascript">

    function onRutBlur(obj) {
        if (VerificaRut(obj.value))
                $('#div-results').html(response);
        //alert("Rut correcto");
        //Rut correcto
        else 
          alert("Rut incorrecto");
      }

</script>

 
<script type="text/javascript">
function VerificaRut(rut) {
    if (rut.toString().trim() != '' && rut.toString().indexOf('-') > 0) {
        var caracteres = new Array();
        var serie = new Array(2, 3, 4, 5, 6, 7);
        var dig = rut.toString().substr(rut.toString().length - 1, 1);
        rut = rut.toString().substr(0, rut.toString().length - 2);

        for (var i = 0; i < rut.length; i++) {
            caracteres[i] = parseInt(rut.charAt((rut.length - (i + 1))));
        }

        var sumatoria = 0;
        var k = 0;
        var resto = 0;

        for (var j = 0; j < caracteres.length; j++) {
            if (k == 6) {
                k = 0;
            }
            sumatoria += parseInt(caracteres[j]) * parseInt(serie[k]);
            k++;
        }

        resto = sumatoria % 11;
        dv = 11 - resto;

        if (dv == 10) {
            dv = "K";
        }
        else if (dv == 11) {
            dv = 0;
        }

        if (dv.toString().trim().toUpperCase() == dig.toString().trim().toUpperCase())
            return true;
        else
            return false;
    }
    else {
        return false;
    }
}



function Valida_Rut( Objeto )
{
  var tmpstr = "";
  var intlargo = Objeto.value
  if (intlargo.length> 0)
  {
    crut = Objeto.value
    largo = crut.length;
    if ( largo <2 )
    {
      alert('rut inválido')
      Objeto.focus()
      return false;
    }
    for ( i=0; i <crut.length ; i++ )
    if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
    {
      tmpstr = tmpstr + crut.charAt(i);
    }
    rut = tmpstr;
    crut=tmpstr;
    largo = crut.length;
 
    if ( largo> 2 )
      rut = crut.substring(0, largo - 1);
    else
      rut = crut.charAt(0);
 
    dv = crut.charAt(largo-1);
 
    if ( rut == null || dv == null )
    return 0;
 
    var dvr = '0';
    suma = 0;
    mul  = 2;
 
    for (i= rut.length-1 ; i>= 0; i--)
    {
      suma = suma + rut.charAt(i) * mul;
      if (mul == 7)
        mul = 2;
      else
        mul++;
    }
 
    res = suma % 11;
    if (res==1)
      dvr = 'k';
    else if (res==0)
      dvr = '0';
    else
    {
      dvi = 11-res;
      dvr = dvi + "";
    }
 
    if ( dvr != dv.toLowerCase() )
    {
      alert('El Rut Ingreso es Invalido')
      Objeto.focus()
      return false;
    }
    alert('El Rut Ingresado es Correcto!')
    Objeto.focus()
    return true;
  }
}

 
</script>

