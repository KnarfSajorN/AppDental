<?php 
   include 'header.php';
   include 'menu.php';?>

<?php
            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_GET['usuarioId']; 
            $idr = $_GET['idr']; 

            $ID_Usuario  =  $_SESSION['ID'];
               $fecha    = date("Y-m-d");
        $hora     = date("H:i:s");
        
            
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
            
            $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $ID_Usuario");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $moneda=$rowMotorizado['moneda'];
                $impuestoF=$rowMotorizado['impuestoF'];
            }
 



 
  
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
            $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
            $celular_cliente=$rowMotorizado['celular_cliente'];
            $ciudad_cliente=$rowMotorizado['ciudad_cliente'];
            $correo_cliente=$rowMotorizado['correo_cliente'];
            $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
            $id_uso_servicio=$rowMotorizado['id_uso_servicio'];
            $tipo_cliente=$rowMotorizado['tipo_cliente'];
            $fechar=$rowMotorizado['fechar'];
            $fecha_actualizado=$rowMotorizado['fecha_actualizado'];
            $activo=$rowMotorizado['activo'];
            $genero=$rowMotorizado['genero'];
            $direccion_cliente=$rowMotorizado['direccion_cliente'];
            $telefono_cliente=$rowMotorizado['telefono_cliente'];
            $edad_cliente=$rowMotorizado['edad_cliente'];
            $profesion_cliente=$rowMotorizado['profesion_cliente'];
            $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
            $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
            $antecedentes=$rowMotorizado['antecedentes'];   
            $email=$rowMotorizado['correo_cliente'];   
            $fechaNacimiento=$rowMotorizado['fechaNacimiento'];   
            
          }
      ?>
     


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Generar Recipe
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Generar Recipe</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
 

          <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body">

        
        <div class="form-row">
              <div class="col-md-6">
                
                <label for="nombre"><strong>Correo:</strong></label>
                <label for="nombre"> <?php echo $correo_cliente;?>  </label>
              </div>

              <div class="col-md-6">
                <label for="inputPassword4"><strong>Nombre:</strong></label>
                 <label for="nombre"><?php echo $nombre_cliente;?> </label>
              </div>

              <div class="col-md-6">
                <label for="inputAddress"><strong>Celular:</strong></label>
                <label for="nombre"><?php echo $CODI_CLIENTE;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress"><strong>Ciudad:</strong></label>
                <label for="nombre"><?php echo $ciudad_cliente;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress"><strong>Fecha Registro:</strong></label>
                <label for="nombre"><?php echo $fechar;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress"><strong>Genero:</strong></label>
                <label for="nombre"><?php echo $genero;?></label>
              </div>
       
               <div class="col-md-6">
                <label for="inputAddress"><strong>  Direcci&oacuten Cliente:</strong></label>
                <label for="nombre"><?php echo $direccion_cliente ;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress"><strong> Tel&eacutefono :</strong></label>
                <label for="nombre"><?php echo $telefono_cliente ;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress"><strong> Edad :</strong></label>
                <label for="nombre"><?php 
                if ($fechaNacimiento <> '') {
                  
                                echo calculaedad($fechaNacimiento) ;
                }
                else
                {
                  echo 'Fecha de nacimiento no cargada';
                }

                ?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress"><strong> Profesi&oacuten :</strong></label>
                <label for="nombre"><?php echo $profesion_cliente ;?></label>
              </div>
              
               
            </div>
            
    
       
      <form action="guardarFormula.php" method="POST" name="" enctype="multipart/form-data">
                                <div class="form-row">
<div class="form-group col-md-12">
<div align="left">  


  <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
                                  <input type="hidden" name="idcliente" id="idcliente"  value="<?php echo $clienteId?>">
                                  <input type="hidden" name="idReceta" id="idReceta" value="<?php echo $idr?>">
                                    
                                  <input type="hidden" name="nomedicamento" value="<?php echo $descripcion?>">
                                 


 <br>  <br>
  <label>Recetas preestablecidas</label> </div>


 <select id="codigoFor" name="codigoFor" class="form-control select2" style="width: 100%;" onChange="verformula();" >
      <option value="" selected="selected">Seleccione ...</option>
 <?php

                                                                  
                                                                  
                        $queryList=mysqli_query($conn3,"SELECT * FROM  nombre_formulas");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                          $ID      = $row_recordset32['ID'];
                                         
                                          $descripcion      = $row_recordset32['nombre'];
                                    
  echo "<option value='$ID'> $descripcion </option>";
                

 }


 ?> </select>


<br>
 <div class="form-group col-md-12" id="div-resultsFor"></div>

  <div class="col-sm-12">
                              <br>
                              <br>
                              <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>

                            </div>     

</div>

    </form>                              

        <div class="col-md-12 content-card">
          <div class="card-big-shadow">
              <div class="card card-just-text" data-background="color" data-color="azul">
                  <div class="content">
                      <h4 class="title"><a href="#"><h2> Agregar Receta</h2></a></h4>
                      <div class="description">

                                 
                                  <div class="form-group col-md-6">
                                  <div align="left"> Agregar Medicamento </div>
                                    <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="usuario_id" value="<?php echo  $usuario_id?>">
                                    <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" >
                                        <option value="" selected="selected">Seleccione Medicamento</option>
                                        <?php
                                        //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                                          echo selectMaster("","id","descripcion,concentracion","pos");
                                        ?>
                                        
                                    </select>
                                  </div>

                                 <div class="form-group col-md-3">
                                  <div align="left"> Cantidad </div>
                                  <input type="text" class="form-control input-lg" name="cantidad"  id="cantidad" placeholder="Cantidad">
                                  
                                </div>

                                <div class="form-group col-md-3">
                                  <div align="left" style="left: 17px;position: relative;"> Presentacion</div>
                                    <select class="form-control posologia select2" name="posologia" id="posologia" style="width: 100%;" >
                                      <option value=" ">Seleccione...</option>
                                       <option value="Miligramos">Miligramos </option>
                                       <option value="Milimetros">Milimetros</option>
                                       <option value="Microgramos">Microgramos</option>
                                       <option value="Gramos">Gramos</option>
                                       <option value="Milimetros">CC</option>
                                       <option value="Unidad">Unidad</option>
                                       <option value="Sobre">Sobre</option>
                                       <option value="Frasco">Frasco</option>
                                       <option value="Onza">Onza</option> 
                                       <option value="Tabletas">Tabletas</option>
                                       <option value="Ampollas">Ampollas</option>
                                       <option value="Capsulas">Cápsulas</option>
                                        <option value="Comprimidos">Comprimidos</option>
                                       <option value="Crema">Crema</option>
                                       <option value="Jarabe">Jarabe</option>
                                       <option value="Ovulos">Ovulos</option>
                                       <option value="Sobre">Sobre</option>
                                       <option value="Tubo">Tubo</option>
                                       <option value="Geles y jaleas- Espuma">Geles y jaleas- Espuma</option>
                                       <option value="Loción">Loción</option>
                                       <option value="Jabones y champú">Jabones y champú</option>
                                       <option value="Unguento">Unguento</option>
                                       <option value="Otras soluciones">Otras soluciones</option>
                                       <option value="Ampolla">Ampolla</option>
                                       <option value="Anillo">Anillo</option>
                                       <option value="Aplicador">Aplicador</option>
                                       <option value="Atomizador(spray)">Atomizador(spray)</option>
                                       <option value="Barra">Barra</option>
                                       <option value="Bolo">Bolo</option>
                                       <option value="Bolsa">Bolsa</option>
                                       <option value="Caja">Caja</option>
                                       <option value="Cartón">Cartón</option>
                                       <option value="Cartucho">Cartucho</option>
                                       <option value="Cilindro">Cilindro</option>
                                       <option value="Contenedor">Contenedor</option>
                                       <option value="Disco">Disco</option>
                                       <option value="Esponja">Esponja</option>
                                       <option value="Estuche">Estuche</option>
                                       <option value="Frasco">Frasco</option>
                                       <option value="Generador">Generador</option>
                                       <option value="Gotas">Gotas</option>
                                       <option value="Implante">Implante</option>
                                       <option value="Inhalador">Inhalador</option>
                                       <option value="Jarra">Jarra</option>
                                       <option value="Jeringa">Jeringa</option>
                                       <option value="Kit">Kit</option>
                                       <option value="Lata">Lata</option>
                                       <option value="Litro">Litro</option>
                                       <option value="Parche">Parche</option>
                                       <option value="Pluma">Pluma</option>
                                       <option value="Supositorio">Supositorio</option>
                                       <option value="Tampón">Tampón</option>
                                       <option value="Tanque">Tanque</option>
                                       <option value="Tira">Tira</option>
                                       <option value="Unidades">Unidades</option>
                                       <option value="Vial">Vial</option>
                                     </select>
                                </div>
                                             
                                  <div class="form-group col-md-3">
                                      <div align="left">Duración Prescripción</div>
                                      <input type="text" name="duracion" id="duracion" class="form-control" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"> 
                                  </div>

                                  <div class="form-group col-md-3">
                                      <div align="left">Método de administración</div>
                                      <input type="text" name="metodo" id="metodo" class="form-control"  pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"> 
                                  </div>

                                  <div class="form-group col-md-3">
                                      <div align="left">Frecuencia de administración</div>
                                      <input type="text" name="frecuencia" id="frecuencia" class="form-control" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"> 
                                  </div>

                                  <div class="form-group col-md-3">
                                      <div align="left">Dosis</div>
                                      <input type="text" name="dosis" id="dosis" class="form-control" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"> 
                                  </div>

                                  <div class="form-group col-md-6">
                                    <div align="left">  Indicaciones </div>
                                    <textarea  name="nota"  id="nota" placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMENTO" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" ></textarea>
                                  </div>


                                  <div class="form-group col-md-6">
                                    <div align="left">  Indicaciones generales de la Recetas </div>
                                    <textarea  name="nota2" id="nota2"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" placeholder="INDICACIONES GENERALES DE LA RECETA , LLENAR AL FINAL." ></textarea>
                                  </div>
        

                                  <div class="form-group col-md-12">

                                  <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
                                  <input type="hidden" name="idcliente" id="idcliente"  value="<?php echo $clienteId?>">
                                  <input type="hidden" name="idReceta" id="idReceta" value="<?php echo $idr?>">
                                    
                                  <input type="hidden" name="nomedicamento" value="<?php echo $descripcion?>">
                                  <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">

                                  <center><button type="button" onclick="agergarItem();" class="btn btn-block btn-primary btn-sm">Guardar Medicamento</button></center>

                                  </div>
                                  
                            

                      </div><!-- cierre de la descripcion-->
                  </div>
              </div> <!-- end card -->
          </div>
        </div>




          </div>
          <!-- /.box-body -->
          <br>

          <div class="col-md-12" align="center">
            <br>
            <a class="btn btn-block btn-primary btn-sm" target="_blank" href="<?php echo $Base;?>pruebareceta.php?cliente=<?php echo $clienteId;?>&idr=<?php echo $idr;?>"> 
              <i class="fa fa-print"></i> Enviar Receta al paciente
            </a>
          </div>
          
          
          <div class="col-md-12" align="center">
            <br>
            <a class="btn btn-block btn-primary btn-sm" target="_blank" href="<?php echo $Base;?>imprimirRecetaH.php?cliente=<?php echo $clienteId;?>&idr=<?php echo $idr;?>"> 
              <i class="fa fa-print"></i> Imprimir Receta
            </a>
          </div>


          <div class="form-group col-md-12" id="div-results" style="text-align: center;"></div>

          </div>
          <!-- /.box -->
        </div>



        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>  
          
          
          
     

<?php include("footer.php")?>




<script type="text/javascript">
     
function calculardosis(){
  m1 = document.getElementById("frecuencia").value;
  m2 = document.getElementById("administracion").value;
  m3 = document.getElementById("dias").value;

if (m2=="Horas") 
{
 

r= 24/m1;  

      

  document.getElementById("dosisdia").value = r;


 }

if (m2=="Minutos") 
{
 

r= 1440/m1;  

      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Dias") 
{
 

r= 1/m1;  

      

  document.getElementById("dosisdia").value = r;


 }


if (m2=="Semana") 
{
 
a= 7*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Mes") 
{
 
a= 30*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Ano") 
{
 
a= 365*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }
 

  if (m2=="Unica") 
{
 


r= "&uacutenica Dosis";
      

  document.getElementById("dosisdia").value = r;


 }

 rt=r*m3;
document.getElementById("total").value = rt;

 
   }
       
 






 
    function agergarItem(){
        // estas son las variables que enviamos
        var codigoProd = $("#codigoProd").val();

       var dosis = $("#dosis").val();
       var posologia = $("#posologia").val();
       var frecuencia = $("#frecuencia").val();
       var administracion= $("#administracion").val();
       var duracion= $("#duracion").val();
       var metodo= $("#metodo").val();
       var dosisdia= $("#dosisdia").val();
       var dias= $("#dias").val();
       var via= $("#via").val();
        var total = $("#total").val();
        var nota = $("#nota").val(); 
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();
        var codigoProd1 = $("#codigoProd1").val();
        var nota2 = $("#nota2").val();
        var cantidad = $("#cantidad").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemrecetario.php",
            data: {codigoProd:codigoProd, dosis:dosis, posologia:posologia, frecuencia:frecuencia,duracion:duracion,metodo:metodo, administracion:administracion, dosisdia:dosisdia, dias:dias, via:via, total:total, nota:nota, usuario_id:usuario_id, idcliente:idcliente,idReceta:idReceta,codigoProd1:codigoProd1,nota2:nota2, cantidad:cantidad},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
      document.getElementById("detalleRecetario").reset();
    };

             

             
      function eliminarItem(valor)
      {
// estas son las variables que enviamos
        var idOper = $("#idOper"+valor).val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();
// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

    function listaItem(){
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     
                      
            }
        });
    };
    window.onload=listaItem;   
 

function verformula(){
// estas son las variables que enviamos
var codigoFor= $("#codigoFor").val();
          //CODI_CLIENTE = document.getElementById("CODI_CLIENTE").value;
// aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "consultarFormula.php",
            data: {codigoFor:codigoFor},
            success: function(response) {
                $('#div-resultsFor').html(response);

            }
        });
    };



  
</script>