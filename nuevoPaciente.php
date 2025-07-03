<?php include 'header.php';
include 'menu.php';
$indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
?>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      <li><a href="patientes.php"> Paciente</a></li>
      <li class="active"> Registro Paciente</li>
    </ol>
  </section>

  <br>


  <section class="content">

    <div class="box box-info container" align="center">

      <div class="card-body">
        <h4 class="card-title"> Apertura de historia (Registro de paciente) </h4>

        <div align="right"> Fecha <?php echo date("m-d-Y") ?> Hora:<?php echo date("h:m:s") ?> </div>
        <br>
        <form action="guardarCliente.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
          <div class="form-row">

            <div class="form-group col-md-3">
              <div align="left"> Tipo </div>
              <select id="tipo" name="tipo" class="form-control input-lg select" style="width: 100%;" required>
                <option value=""> Seleccione</option>
                <option value="RC"> RC - Registro Civil</option>
                <option value="TI"> TI - Tarjeta de identidad</option>
                <option value="CC"> CC - Cédula de ciudadanía</option>
                <option value="CE"> CE - Cédula de extranjería</option>
                <option value="PA"> PA - Pasaporte</option>
                <option value="MS"> MS - Menor sin identificación</option>
                <option value="AS"> AS - Adulto sin identidad</option>
                <option value="DNI"> DNI - cédula de identificación personal</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <div align="left"> Número de Cédula o ID</div>
              <input type="text" class="form-control input-lg" name="CODI_CLIENTE" id="CODI_CLIENTE" placeholder="Cédula" required onChange="vercedula();">
              <div id="div-results"></div>
            </div>

            <div class="form-group col-md-4">
              <div align="left"> Fecha de nacimiento </div>
              <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" placeholder="Edad" onChange="verEdad();" required>
            </div>
            <div class="form-group col-md-2">
              <div align="left"> Edad <div id="div-edad"></div>
              </div>
            </div>

            <!--
              <div class="form-group col-md-6">
                <div align="left">  Nombres del paciente </div>
                <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre"  required>
              </div>


              <div class="form-group col-md-4">
                <div align="left"> Apellidos del paciente </div>
                
                <input type="text" class="form-control input-lg" id="apellido" name="apellido" placeholder="Apellido"  required>
              </div>
            -->

            <div class="form-group col-md-6">
              <div align="left"> Primer Nombre* </div>
              <input type="text" class="form-control input-lg" id="primer_nombre" name="primer_nombre" placeholder="Primer Nombre" required>
            </div>

            <div class="form-group col-md-6">
              <div align="left"> Segundo Nombre </div>
              <input type="text" class="form-control input-lg" id="segundo_nombre" name="segundo_nombre" placeholder="Segundo Nombre">
            </div>

            <div class="form-group col-md-6">
              <div align="left"> Primer Apellido* </div>
              <input type="text" class="form-control input-lg" id="primer_apellido" name="primer_apellido" placeholder="Primer Apellido" required>
            </div>

            <div class="form-group col-md-6">
              <div align="left"> Segundo Apellido </div>
              <input type="text" class="form-control input-lg" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo Apellido">
            </div>



            <!--   <div class="form-group col-md-6">
              <div align="left"> Sexo asignado al nacer </div>
              <select id="genero_asignado" name="genero_asignado" class="form-control input-lg select" style="width: 100%;" required>
                <option value="" selected> Seleccione </option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Intersexual">Intersexual</option>
                <option value="Otro">Otro</option>
              </select>
            </div> -->














            <div class="col-md-4" id="pais_div">
              <div align="left"> Pais de Residencia</div>
              <select name="pais" id="pais" class="form-control input-lg select2" style="width: 100%;" onchange="paises(this.value);">
                <option value="">Elegir opción</option>

                <?php
                //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                //echo selectMaster("", "Codigo", "Pais", "Paises");
                echo selectMaster("", "id", "name", "Paises");
                ?>

              </select>
            </div>

            <div class="col-md-4">
              <div align="left"> Ciudad de residencia</div>
              <select name="ciudad" id="ciudad" class="form-control input-lg select2" style="width: 100%;">


              </select>
            </div>


            <div class="form-group col-md-4">
              <div align="left">Zona residencial </div>

              <select id="zona" name="zona" class="form-control input-lg select" style="width: 100%;">
                <option>Urbana</option>
                <option>Rural</option>

              </select>

            </div>




            <div class="form-group col-md-4">
              <div align="left"> Nacionalidad </div>
              <input type="text" class="form-control input-lg" id="nacionalidad" name="nacionalidad" placeholder="nacionalidad">
            </div>


            <div class="form-group col-md-4">
              <div align="left"> Dirección </div>
              <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="Dirección">
            </div>

            <div class="form-group col-md-4">
              <div align="left"> Email </div>
              <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente" placeholder="Correo">
            </div>



            <div class="form-group col-md-4">
              <div align="left"> Estado civil </div>

              <select id="estado" name="estado" class="form-control input-lg select" style="width: 100%;">
                <option>Casado(a)</option>
                <option>Soltero(a)</option>
                <option>Viudo(a)</option>
                <option>Menor de edad</option>
                <option>Separado(a)</option>
                <option>Union Libre</option>
                <option>Otro(a)</option>

              </select>

            </div>

            <div class="form-group col-md-4">
              <div align="left"> Género </div>
              <select id="genero" name="genero" class="form-control input-lg select" style="width: 100%;" required>
                <option value="" selected> Seleccione </option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="I">Indeterminado</option>
                <option value="O">Otro</option>
              </select>
            </div>



            <!-- 
              <div class="form-group col-md-4">
                <div align="left">Tipo de usuario  </div>
               
                <select  id="tipoUsuario" name="tipoUsuario" class="form-control input-lg select" style="width: 100%;">
                  <option>Subsidiado </option>
                  <option>Contributivo </option>
                  <option>Particular </option>
                  <option>Otro </option>
                  
                </select>

              </div>
            -->








          </div>



          <!--     <div class="form-group col-md-4">
                <div align="left">  Ciudad </div>
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente" placeholder="Ciudad" >
              </div> -->


          <!-- 
            <div class="form-group col-md-4">
                 <div align="left">  Ocupación(En qué trabaja) </div>
                <input type="text" class="form-control input-lg" id="ocupacion" name="ocupacion" placeholder="Profesion">
              </div>
            -->

          <div class="form-group col-md-4">
            <div align="left">Es Donante ? </div>

            <select id="esDonante" name="esDonante" class="form-control input-lg select" style="width: 100%;">
              <option>Si</option>
              <option>No</option>

            </select>

          </div>
          <div class="form-group col-md-4">
            <div align="left"> Tipo de Sangre </div>

            <!--

                <input type="text" class="form-control input-lg" id="tiposSangre" name="tiposSangre" placeholder="tipo de Sangre">



class="form-control input-lg select"
estilo

name="tiposSangre"
para indicar el nombre y enviarlo pos POST a guardar
-->

            <select class="form-control input-lg select" name="tiposSangre">

              <option>No definido</option>
              <option>O NEGATIVO</option>

              <option>O POSITIVO</option>

              <option>A NEGATIVO</option>

              <option>A POSITIVO </option>

              <option>B NEGATIVO</option>

              <option>B POSITIVO </option>

              <option>AB NEGATIVO</option>
              <option>AB POSITIVO</option>

            </select>





          </div>




          <!--
              <div class="form-group col-md-4" style="margin: auto;">
                 <div align="left">Entidad de Salud </div>
                  <select id="cie"  name="entidadSalud"  class="form-control select2" style="width: 100%;" >
                    <option value="" selected="selected">Seleccione ...</option>
                    <?php
                    $queryList = mysqli_query($conn3, "SELECT * FROM administradora");


                    $nrowl = mysqli_num_rows($queryList);
                    while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                      $cod = $row_recordset32A['codigo'];
                      $nombre = $row_recordset32A['nombre'];


                      echo "<option value='$cod'>$cod -- $nombre </option>";
                    }

                    ?>
                  -->


          </select>
      </div>
      <!--   <div class="form-group col-md-4">
        <div align="left">Seguro </div>
        <input type="text" class="form-control input-lg" id="seguro" name="seguro" placeholder="seguro">
      </div> -->




      <!--  <div class="form-group col-md-4">
            <div align="left"> Profesión </div>
            <input type="text" class="form-control input-lg" id="profesion_cliente" name="profesion_cliente" placeholder="Profesion">
          </div> -->

      <div class="form-group col-md-4">
        <div align="left">Nivel de Educación</div>
        <select class="form-control input-lg select" name="nivel_educacion">
          <option value=""> Seleccione </option>
          <option>No Definido</option>
          <option>Preescolar</option>
          <option>Basica Primaria</option>
          <option>Basica Secundaria</option>
          <option>Basica Secundaria (Bachillerato Basico)</option>
          <option>Media Academica o Clasica (Bachillerato Basico)</option>
          <option>Media Tecnica (Bachillerato Tecnico)</option>
          <option>Normalista</option>
          <option>Tecnica Profesional</option>
          <option>Tecnologica</option>
          <option>Profesional</option>
          <option>Especializacion</option>
          <option>Maestria</option>
          <option>Doctorado</option>
          <option>Desconocido</option>
          <option>Ninguno</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <div align="left"> Ocupación(En qué trabaja) </div>
        <input type="text" class="form-control input-lg" id="ocupacion" name="ocupacion" placeholder="ocupación">
      </div>




      <div class="form-group col-md-3">
        <div align="left"> Número de Teléfono</div>
        <input type="text" class="form-control input-lg" id="telefono_cliente" name="telefono_cliente" placeholder="Telefono">
      </div>
      <div class="form-group col-md-3">
        <div align="left"> Número de Celular </div>
        <input type="number" class="form-control input-lg" id="celular_cliente" name="celular_cliente" placeholder="Celular">
      </div>



      <div class="form-group col-md-6" style="">
        <div class="form-group col-md-3" style="margin-bottom: auto;">
          <div align="left">
            <font color="green"> <strong>Indicativo</strong> </font>
          </div>
          <select id="indicativo" name="indicativo" class="form-control select2" style="width: 100%;" required>
            <?php
            //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
            //echo "<option value='57'>57 - Colombia</option>";
            echo selectMaster("", "numero", "numero,nombre", "indicativos");
            ?>
          </select>
        </div>

        <div class="form-group col-md-9" style="margin-bottom: auto;">
          <div align="left">
            <font color="green"> <strong>Número de Celular notificaciones Whatsapp</strong></font>
          </div>
          <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" placeholder="">
        </div>
      </div>

      <div class="form-group col-md-12" align="center">
        <input type="checkbox" name="habeasdata" value="Si" checked> <label>Autoriza recibir notificaciones vía WhatsApp (Habeas Data)</label></input>
      </div>





      <div class="form-group col-md-12">
        <hr>
        <h4> Seguridad social y afiliación </h4>
      </div>

      <div class="form-group col-md-4">
        <div align="left">Tipo Afiliado</div>
        <select class="form-control input-lg select" name="tipoUsuario">
          <option value=""> Seleccione </option>
          <option>Contributivo</option>
          <option>Subsidiado</option>
          <option>Vinculado</option>
          <option>Particular</option>
          <option>Otro</option>
          <option>Desplazado con afiliación al Régimen Contributivo</option>
          <option>Desplazado con afiliación al Régimen Subsidiado</option>
          <option>Desplazado no asegurado (Vinculado)</option>
          <option>Regímenes de Excepción</option>
          <option>Régimen Especial</option>
          <option>Otro</option>
        </select>
      </div>
      <div class="form-group col-md-4" style="margin: auto;">
        <div align="left">Entidad de Salud </div>
        <select id="cie" name="entidad" class="form-control select2" style="width: 100%;" onchange="Convenio(this.value)">
          <option value="" selected="selected">Seleccione ...</option>
          <?php
          $queryList = mysqli_query($conn3, "SELECT * FROM Rips_Entidades");
          while ($RowMotorizado = mysqli_fetch_array($queryList)) {
            $id = $RowMotorizado['id'];
            $Nombre = $RowMotorizado['Nombre'];

            echo "<option value='$id'> $Nombre </option>";
          }
          ?>
        </select>
      </div>

      <div class="form-group col-md-4" style="margin: auto;">
        <div align="left">Convenio</div>
        <select id="convenio" name="convenio" class="form-control select2" style="width: 100%;">
        </select>
      </div>

      <!-- <div class="form-group col-md-4" style="margin: auto;">
        <div align="left">Entidad de Salud </div>
       
        <select id="cie" name="entidadSalud" class="form-control select2" style="width: 100%;">
          <option value="" selected="selected">Seleccione ...</option>
          <?php
          $queryList = mysqli_query($conn3, "SELECT * FROM administradora");


          $nrowl = mysqli_num_rows($queryList);
          while ($row_recordset32A = mysqli_fetch_array($queryList)) {
            $cod = $row_recordset32A['codigo'];
            $nombre = $row_recordset32A['nombre'];


            echo "<option value='$cod'>$cod -- $nombre </option>";
          }

          ?>



        </select>
      </div> -->

      <div class="form-group col-md-4">
        <div align="left">Prepagada</div>
        <select class="form-control input-lg select" name="prepagada">
          <option value=""> Seleccione </option>
          <option>Allianz</option>
          <option>AXA Colpatria</option>
          <option>Colmedica</option>
          <option>Colsanitas</option>
          <option>Coomeva Medicina Prepagada</option>
          <option>Medisanitas</option>
          <option>MetLife</option>
          <option>Salud Sura</option>
          <option>Suramericana</option>
          <option>Humano</option>
          <option>Senasa</option>
          <option>Palic</option>
          <option>Universal</option>
          <option>Reserva</option>
          <option>Futura</option>
          <option>Monumental</option>
          <option>Renacer</option>
          <option>Seguros Bolivar</option>
          <option>Colmena Seguros</option>
          <option>Compañía de seguros de vida Aurora</option>
          <option>Liberty Seguros de Vida</option>
          <option>MAFRE Seguros</option>
          <option>Positiva</option>
          <option>Seguros de Vida Alfa</option>
          <option>Suratep</option>
          <option>Medplus</option>
          <option>Famisanar PAC</option>
          <option>Compensar PAC</option>
          <option>Panamerican</option>
          <option>Generali</option>
          <option>Probienestar S.A.S</option>
          <option>Foca PLUS</option>
          <option>Ninguno</option>
        </select>
      </div>


      <div class="form-group col-md-4">
        <div align="left">Sucursal del Paciente</div>

        <select id="sucursal_cliente" name="sucursal_cliente" class="form-control input-lg select" style="width: 100%;">
          <option value=""> Seleccione </option>
          <?php sucursalesSelect($_SESSION['ID']);  ?>

        </select>

      </div>


      <div class="form-group col-md-12">
        <hr>
        <h4> Acudiente </h4>
      </div>

      <div class="form-group col-md-4">
        <div align="left">Nombre Acompañante Familiar </div>
        <input type="text" class="form-control input-lg" id="acompananteFamiliar" name="acompananteFamiliar" placeholder="Acompanante Familiar" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
      </div>
      <div class="form-group col-md-4">
        <div align="left">Teléfono Acompañante</div>
        <input type="text" class="form-control input-lg" id="telefono_acompanante" name="telefono_acompanante" placeholder="Telefono Acompanante" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
      </div>


      <div class="form-group col-md-4">
        <div align="left">Parentesco</div>
        <input type="text" class="form-control input-lg" id="parentesco_acompanante" name="parentesco_acompanante" placeholder="Parentesco Acompanante" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
      </div>

      <!--<div class="form-group col-md-12">
                <div align="left">Asignar a:</div>
                <input type="text" class="form-control input-lg" name="asignar" placeholder=""  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
              </div>-->




      <div class="form-group col-md-12">
        <hr>
        <h4> Antecedentes Personales </h4>
      </div>

      <!--  <div class="form-group col-md-12">
        <div align="left">Medicamento que toma</div>
        <input type="text" class="form-control input-lg" id="tomaMedicamento" name="tomaMedicamento" placeholder="Medicamento que toma">
      </div> -->
      <div class="form-group col-md-3" align="right">
        Alergias a los aines
        <input value="1" type="radio" name="ap1" id="lt" class="flat-red" /> SI
        <input value="2" type="radio" name="ap1" id="lt" class="flat-red" /> NO
      </div>

      <div class="form-group col-md-3" align="right">
        Asma
        <input value="1" type="radio" name="ap2" id="lt" class="flat-red" /> SI
        <input value="2" type="radio" name="ap2" id="lt" class="flat-red" /> NO
      </div>

      <div class="form-group col-md-3" align="right">
        HTA
        <input value="1" type="radio" name="ap3" id="lt" class="flat-red" /> SI
        <input value="2" type="radio" name="ap3" id="lt" class="flat-red" /> NO
      </div>

      <div class="form-group col-md-3" align="right">
        Diabetes
        <input value="1" type="radio" name="ap4" id="lt" class="flat-red" /> SI
        <input value="2" type="radio" name="ap4" id="lt" class="flat-red" /> NO
      </div>

      <div class="form-group col-md-3" align="right">
        Hipotiroidismo
        <input value="1" type="radio" name="ap5" id="lt" class="flat-red" /> SI
        <input value="2" type="radio" name="ap5" id="lt" class="flat-red" /> NO
      </div>

      <div class="form-group col-md-3" align="right">
        Tabaquismo
        <input value="1" type="radio" name="ap6" id="lt" class="flat-red" /> SI
        <input value="2" type="radio" name="ap6" id="lt" class="flat-red" /> NO
      </div>

      <div class="form-group col-md-3" align="right">
        Licor
        <input value="1" type="radio" name="ap7" id="lt" class="flat-red" /> SI
        <input value="2" type="radio" name="ap7" id="lt" class="flat-red" /> NO
      </div>

      <div class="form-group col-md-3" align="right">
        Alergias
        <input value="1" type="radio" name="ap8" id="lt" class="flat-red" /> SI
        <input value="2" type="radio" name="ap8" id="lt" class="flat-red" /> NO
      </div>

      <div class="form-group col-md-3" align="right">
        Cirugías
        <input value="1" type="radio" name="ap9" id="lt" class="flat-red" /> SI
        <input value="2" type="radio" name="ap9" id="lt" class="flat-red" /> NO
      </div>

      <div class="form-group col-md-9" align="right">
        <input type="text" class="form-control input-lg" id="cirugiasCuales" name="cirugiasCuales" placeholder="Cuales Cirugías" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
      </div>





      <div class="form-group col-md-12">
        <div align="left">Alergias cuales</div>
        <input type="text" class="form-control input-lg" id="alergias" name="alergias" placeholder="Alergias cuales">

      </div>


      <div class="form-group col-md-12">
        <div align="left">Medicamento que toma</div>
        <input type="text" class="form-control input-lg" id="tomaMedicamento" name="tomaMedicamento" placeholder="toma Medicamento">
      </div>





      <div class="form-group col-md-12">
        <div align="left">Antecedentes Familiares</div>
        <input type="text" class="form-control input-lg" id="enfermedadesPequeno" name="enfermedadesPequeno" placeholder="Antecedentes Familiares">



      </div>




      <!--
              <div class="form-group col-md-12">
                <div align="left"> Motivo Consulta</div>
              </div>
             /.box-header 
            <div class="box-body pad">
              
                <textarea id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
            </div>
           

            <div class="form-group col-md-12">
              <div align="left"> Antecedentes</div>
            </div>
            /.box-header 
            <div class="box-body pad">
              <textarea id="antecedentes" name="antecedentes"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
          -->

      <div class="form-group col-md-12">
        <div align="left"> Notas Adicionales </div>


        <textarea id="nota" name="nota" class="textarea" placeholder="Notas Adicionales" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
      </div>

      <!--
            <div class="form-group col-md-12">
              <div align="left">Foto del paciente</div>
            </div>
              <input type="hidden" class="form-control input-lg" value="fotoperfil">
              <input type="file" class="form-control input-lg"  name="imagen">
            -->

      <div class="form-group col-md-12 " id="modulo_foto" style="border: groove;">
        <input type="hidden" id="foto_mostrada">
        <div class="form-group col-md-6">
          <p id="errorTxt"></p>
          <div>
            <video id="theVideo" autoplay style="width: 100%;height: 300px;border-style: ridge;"></video>
            <canvas id="theCanvas" style="width: 100%;height: 300px;border-style: ridge;background-color: antiquewhite;display:none"></canvas>
            <input type="hidden" id="foto" name="foto">
            <div id="visualizar" class="border border-compu rounded-lg border-2 justify-center text-center"></div>
          </div>
          <div class="botones_camara_pc">
            <select name="listaDeDispositivos" id="listaDeDispositivos" class="form-control input-lg select" onchange="Camara(this.value)">
              <option>Seleccione Camara</option>
            </select>
            <button type="button" id="btnCapture" class="btn btn-primary btn-sm" style="width: 90%;">Tomar Captura</button><button type="button" id="btnRemove" style="float: right;width: 10%;height: 30px;background-color: antiquewhite;border-radius: 0px 5px 5px 0px;border: snow;"><i class="fa fa-trash" aria-hidden="true"></i></button>
            <!--<button type="button" id="btnDownloadImage">Descargar Imagen</button>-->
            <br>
          </div>
        </div>
        <div class="form-group col-md-6">
          <br><br><br><br><br>
          <label for="file-input" class="text-compu icono">
            <i class="fas fa-camera-retro fa-10x" style="color: #3c8dbc;"></i>
            <p><i class="fas fa-arrow-right"></i><strong> Subir Foto de Perfil </strong><i class="fas fa-arrow-left"></i></p>
          </label>
          <input id="file-input" type="file" accept="image/*" capture="camera" name="imagen" style="display: none;" />
        </div>
      </div>

    </div>

    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
    <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
    <input type="hidden" name="sucursal" value="<?php echo $_SESSION['sucursal'] ?>">
    <input type="hidden" name="calendario" value="<?php if (isset($_GET['calendario'])) {echo $_GET['calendario'];} ?>">

    <center><button type="submit" class="btn btn-block btn-primary btn-sm">Guardar</button></center>

    <input type="hidden" name="tipo_cliente" valur="1">

    </form>
</div>



<input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">


</div>




</section>

<?php if(isset($mensaje_registro_patients)){ ?>
<?php echo $mensaje_registro_patients; ?>
<?php } ?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade in" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="w-100 text-center justify-center" style="text-align: -webkit-center;">
          <p class="m-0">Recuerda</p>
          <p class="m-0"><small>Preferiblemente utilizar fondo blanco</small></p>
          <img class="img img-responsive w-100" src="Modulos_Estilos/Imagenes/imagenreferenciacamara.jpg">
          <p class="m-0">Esta es la manera correcta para tomar la foto</p>
          <button class="btn btn-default btn-compu" data-dismiss="modal" type="button">Ok</button>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  #visualizar>img {
    width: 100%;
  }

  @media only screen and (max-width: 750px) {
    .botones_camara_pc {
      display: none;
    }
  }
</style>

<?php include 'footer.php' ?>


<script type="text/javascript">
  window.onload = () => {


    const llenarSelectConDispositivosDisponibles = () => {

      navigator
        .mediaDevices
        .enumerateDevices()
        .then(function(dispositivos) {
          const dispositivosDeVideo = [];
          dispositivos.forEach(function(dispositivo) {
            const tipo = dispositivo.kind;
            if (tipo === "videoinput") {
              dispositivosDeVideo.push(dispositivo);
            }
          });

          // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
          if (dispositivosDeVideo.length > 0) {
            // Llenar el select
            dispositivosDeVideo.forEach(dispositivo => {
              const option = document.createElement('option');
              option.value = dispositivo.deviceId;
              option.text = dispositivo.label;
              listaDeDispositivos.appendChild(option);
              console.log("$listaDeDispositivos => ", listaDeDispositivos)
            });
          }
        });
    }

    llenarSelectConDispositivosDisponibles();

  };

  //procedimiento para el icono/boton que se llama subir foto de perfil/ soluciona la toma de fotos en telefono
  //ya que este iinput reemplazara al otro modulo de camara ya que no funciona correctamente en telefonos
  //este no tiene la misma funcionalidad en pc.
  document.getElementById("file-input").onchange = function(e) {

    document.getElementById('visualizar').style.display = "block";

    document.getElementById('theCanvas').style.display = "none";
    document.getElementById('theVideo').style.display = "none";
    document.getElementById('foto').value = "";
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();
    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
      let visualizar = document.getElementById('visualizar'),
        image = document.createElement('img');
      image.src = reader.result;
      visualizar.innerHTML = '';
      visualizar.append(image);
    };
  }
  document.getElementById("modulo_foto").onmouseover = function(e) {
    if (document.getElementById('foto_mostrada').value != "Mostrada") {
      $("#myModal").modal();
      document.getElementById('foto_mostrada').value = "Mostrada";
    }

  }

  function Camara(valor) {

    document.getElementById('visualizar').style.display = "none";
    document.getElementById('file-input').value = "";

    if (document.getElementById('theVideo').style.display == "none") {
      document.getElementById('theVideo').style.display = "block";
    }

    var videoWidth = 800;
    var videoHeight = 800;
    var videoTag = document.getElementById('theVideo');
    var canvasTag = document.getElementById('theCanvas');
    var btnCapture = document.getElementById("btnCapture");
    var btnRemove = document.getElementById("btnRemove");
    var btnDownloadImage = document.getElementById("btnDownloadImage");
    videoTag.setAttribute('width', videoWidth);
    videoTag.setAttribute('height', videoHeight);
    canvasTag.setAttribute('width', videoWidth);
    canvasTag.setAttribute('height', videoHeight);

    navigator.mediaDevices.getUserMedia({
      audio: false,
      video: {
        width: videoWidth,
        height: videoHeight,
        deviceId: valor
      }
    }).then(stream => {
      videoTag.srcObject = stream;
    }).catch(e => {
      document.getElementById('errorTxt').innerHTML = 'ERROR: ' + e.toString();
    });

    var canvasContext = canvasTag.getContext('2d');
    btnCapture.addEventListener("click", () => {

      if (document.getElementById('visualizar').style.display == "block") {
        document.getElementById('visualizar').style.display = "none";
        document.getElementById('file-input').value = "";
      }

      canvasContext.drawImage(videoTag, 0, 0, videoWidth, videoHeight);
      document.getElementById('foto').value = canvasTag.toDataURL();
      document.getElementById('theCanvas').style.display = "block";
      document.getElementById('theVideo').style.display = "none";
      //captura(canvasTag.toDataURL());
    });
    /*
    btnDownloadImage.addEventListener("click", () => {
        var link = document.createElement('a');
        link.download = 'capturedImage.png';
        link.href = canvasTag.toDataURL();
        link.click();
    });
    */
    btnRemove.addEventListener("click", () => {

      if (document.getElementById('visualizar').style.display == "block") {
        document.getElementById('visualizar').style.display = "none";
        document.getElementById('file-input').value = "";
      }

      document.getElementById('theCanvas').style.display = "none";
      document.getElementById('theVideo').style.display = "block";
      document.getElementById('foto').value = "";
    });
  }
</script>


<script type="text/javascript">
  function vercedula() {
    // estas son las variables que enviamos
    var CODI_CLIENTE = $("#CODI_CLIENTE").val();
    //CODI_CLIENTE = document.getElementById("CODI_CLIENTE").value;
    // aqui enviamos el mensaje por medio de un arreglo

    $.ajax({
      type: "POST",
      url: "consultardoc.php",
      data: {
        CODI_CLIENTE: CODI_CLIENTE
      },
      success: function(response) {
        $('#div-results').html(response);

      }
    });
  };


  function verEdad() {
    // estas son las variables que enviamos

    var fechaNacimiento = $("#fechaNacimiento").val();


    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "ajax_edad.php",
      data: {
        fechaNacimiento: fechaNacimiento
      },
      success: function(response) {
        $('#div-edad').html(response);

      }
    });
  };


  function paises(valor) {
    if (valor == "CO") {

      var pais = document.getElementById('pais_div');

      var select = document.createElement("div");
      select.innerHTML = '<div align="left">  Departamento </div><select name="departamento" id="departamento"  class="form-control input-lg select2" onchange="departamento_ciudad(this.value)"style="width: 100%;"></select>'
      select.setAttribute('id', 'departamento_div');
      select.setAttribute('class', 'col-md-4');

      pais.insertAdjacentElement("afterend", select);
      //K.C

      $('#departamento').select2();

      $.ajax({
        type: "POST",
        url: "ajax_select.php",
        data: {
          where: "",
          value: "codigo",
          texto: "nombre",
          tabla: "departamentos"
        },
        success: function(response) {
          $('#departamento').html(response);

        }
      });

      $('#ciudad').empty();
    } else {

      $.ajax({
        type: "POST",
        url: "ajax_select.php",
        data: {
          where: "WHERE Codigo_Pais='" + valor + "'",
          value: "Nombre",
          texto: "Nombre_Tildes",
          tabla: "Ciudades"
        },
        success: function(response) {
          $('#ciudad').html(response);

        }
      });

      var departamento = document.getElementById('departamento_div');
      if (typeof(departamento) != 'undefined' && departamento != null) {
        departamento.remove();
      }


    }
  }

  function departamento_ciudad(valor) {
    $.ajax({
      type: "POST",
      url: "ajax_select.php",
      data: {
        where: "WHERE Codigo_Departamento='" + valor + "'",
        value: "id",
        texto: "Nombre_Tildes",
        tabla: "Ciudades"
      },
      success: function(response) {
        $('#ciudad').html(response);

      }
    });
  }

  function Convenio(valor) {
    //ajax para cargar los convenios
    $.ajax({
      type: "POST",
      url: "ajax_rips.php",
      data: {
        entidad: valor,
      },
      success: function(response) {
        $('#convenio').html(response);

      }
    });
  }
</script>
<script type="text/javascript">
  //cargar el indicativo del usuario
  $(window).on("load", function() {
    $("#indicativo > option[value='<?php echo $indicativo ?>']").attr("selected", true);
    $('#indicativo').select2();
  });
</script>