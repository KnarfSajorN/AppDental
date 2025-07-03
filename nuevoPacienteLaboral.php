<?php include 'header.php';
include 'menu.php';?>
<style type="text/css">
  
  .h4-form {
  color:#423cbc;
  font-weight:bold;
}


</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="patientes.php"> Paciente</a></li>
         <li  class="active"> Reg paciente</li>
      </ol>
    </section>
  
<br>      
 
     
<section class="content">
  
<div  class="box box-info" align="center">
 
 <div class="card-body">
          <h4 class="card-title">  Historial Médica Laboral
  </h4>
        
          <div align="right"> Fecha <?php echo date("m-d-Y")?>  Hora:<?php echo date("h:m:s")?> </div>
          <br>
           














           <form id="contact-form" method="post">
        <div class="controls">
            <h4 class="h4-form">Historial Médica Laboral
      <div class="popup" onclick="myFunction()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup">Campos obligatorios.</span>
            </div>
      </h4>     
<div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="preocupacional">
                        <label class="form-check-label" for="inlineRadio1">Preocupacional</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="periodico">
                        <label class="form-check-label" for="inlineRadio1">Periódico</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="reintegro">
                        <label class="form-check-label" for="inlineRadio1">Reintegro</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="egreso">
                        <label class="form-check-label" for="inlineRadio1">Egreso</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="laboral">
                        <label class="form-check-label" for="inlineRadio1">Enf. Laboral</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="clinica">
                        <label class="form-check-label" for="inlineRadio1">Clinica</label>
                    </div>
                </div>
</div>  
<div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                       <label for="example-date-input" class="col-2 col-form-label">Fecha de Elaboración</label>
                       <div class="col-10">
                       <input class="form-control" type="date" value="2019-07-17" id="example-date-input">
                        </div>
                    </div>
                </div>
        <div class="col-sm-8">
                    <div class="form-group">
                        <label for="form_apellido">Historia Clinica</label>
                        <input placeholder="Su Historia Clinica" type="text" class="form-control" required>
                    </div>
                </div>
</div>  
        <h4 class="h4-form">Datos Generales
      <div class="popup" onclick="myFunction2()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup2">Campos obligatorios.</span>
            </div>
      </h4> 
      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_apellido">Apellidos</label>
                        <input placeholder="Coloque su apellido" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_apellido">Nombres</label>
                        <input placeholder="Coloque su segundo apellido" type="text" class="form-control" required>
                    </div>
                </div>
        <div class="col-sm-4">
                    <div class="form-group">
                       <label for="example-date-input" class="col-2 col-form-label">Fecha de Nacimiento</label>
                       <div class="col-10">
                       <input class="form-control" type="date" value="0000-00-00" id="example-date-input">
                        </div>
                    </div>
                </div>
        <div class="col-sm-4">
                    <div class="form-group">
                        <label for="form_apellido">Edad</label>
                        <input placeholder="Coloque su edad" type="text" class="form-control" required>
                    </div>
                </div>
        <div class="col-sm-4">
                    <div class="form-group">
                        <label for="form_apellido">Cédula</label>
                        <input placeholder="Coloque su cédula de identidad" type="text" class="form-control" required>
                    </div>
                </div>
        </div>
    
<div class="container">
<div class="row">
<hr style="border:1px solid #423cbc;">
    <div class="col-sm-4">
                <div class="col-sm-2">
                    <div class="form-group">
                        <b class="h4-form">Sexo</b>
                    </div>
                </div>
              <div class="col-sm-4">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="masculino">
                        <label class="form-check-label" for="inlineRadio1">Masculino</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="femenino">
                        <label class="form-check-label" for="inlineRadio1">Femenino</label>
                    </div>
                </div>
    </div>
    <div class="col-sm-8">
             <div class="col-sm-2">
                    <div class="form-group">
                        <b class="h4-form">Estado Civil</b>
                    </div>
                </div>
              <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="soltero">
                        <label class="form-check-label" for="inlineRadio1">Soltero</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="casado">
                        <label class="form-check-label" for="inlineRadio1">Casado</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="viudo">
                        <label class="form-check-label" for="inlineRadio1">Viudo</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="divorciado">
                        <label class="form-check-label" for="inlineRadio1">Divorciado</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="libre">
                        <label class="form-check-label" for="inlineRadio1">Unión Libre</label>
                    </div>
                </div>
    </div>  
 <hr style="border:1px solid #423cbc;"> 
    <div class="col-sm-12">
  <div class="col-sm-2">
  <b class="h4-form">Escolaridad</b>
  </div><br><br>
              <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="basica">
                        <label class="form-check-label" for="inlineRadio1">Básica</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="bachillerato">
                        <label class="form-check-label" for="inlineRadio1">Bachillerato</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="tecnologia">
                        <label class="form-check-label" for="inlineRadio1">Tecnología</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="profesion">
                        <label class="form-check-label" for="inlineRadio1">Profesión</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="especializacion">
                        <label class="form-check-label" for="inlineRadio1">Especialización</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="maestria">
                        <label class="form-check-label" for="inlineRadio1">Maestría</label>
                    </div>
                </div>
    </div>
 </div>
</div>    
    <hr style="border:1px solid #423cbc;"> 
      <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_fetal">Dirección</label>
                        <input type="text" placeholder="Coloque su dirección" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_uterina">Teléfono</label>
                        <input type="text" placeholder="Coloque su teléfono" class="form-control" required>
                    </div>
                </div>
            </div>
      <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">Antecedentes Laborales
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Nombre de la Empresa o Trabajo</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Nombre de la empresa donde labora" required>
            </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top: 6px;">Fecha de duración</label>
            <div class="col-sm-4">
                    <div class="form-group">
                       <label for="example-date-input" class="col-2 col-form-label">Desde</label>
                       <div class="col-10">
                       <input class="form-control" type="date" value="0000-00-00" id="example-date-input">
                        </div>
                    </div>
                </div>
        <div class="col-sm-4">
                    <div class="form-group">
                       <label for="example-date-input" class="col-2 col-form-label">Hasta</label>
                       <div class="col-10">
                       <input class="form-control" type="date" value="0000-00-00" id="example-date-input">
                        </div>
                    </div>
                </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">¿Trabajó tiempo completo?</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top: 6px;">Tipo de Industria</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Describa el tipo de industria" required>
            </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Describa sus obligaciones laborales</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="¿Cuáles fueron sus obligaciones laborales?" required>
            </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top: 6px;">Riesgos de Salud</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Conocidos en el sitio de trabajo: Físicos, químicos, biológicos, ergonómicos, psicosociales, seguridad." required>
            </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">¿Qué equipo de protección personal utilizó?</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Describa los equipos usados personales durante el trabajo" required>
            </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">¿Alguna vez faltó a su trabajo?</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Describa si faltó a su trabajo por problemas de salud o lesiones" required>
            </div>
            </div>
      <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">Descripción del Cargo
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <div class="form-group row">
        <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_apellido">Profesión</label>
                        <input placeholder="Coloque su profesión" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_apellido">Nombre del Cargo</label>
                        <input placeholder="Coloque el nombre del cargo" type="text" class="form-control" required>
                    </div>
              </div>
      </div>
      <div class="form-group row">
      <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_apellido">Tiempo de Trabajo (años)</label>
                        <input placeholder="¿Cuántos años llevas trabajando?" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_apellido">Tiempo de Trabajo actual (años)</label>
                        <input placeholder="¿Cuántos años llevas en el trabajo actual?" type="text" class="form-control" required>
                    </div>
              </div>
      </div>
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Vinculación</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Libre Remoción</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Nombramiento</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Contrato plazo fijo</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Contrato provisional</label>
                    </div>
             </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Categoría ocupacional</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Directivo</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Obrero</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Técnico</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Administrativo</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Otro</label>
                    </div>
             </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top: 6px;">Horas / Día trabajo</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Horas / Día de trabajo" required>
            </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Horas / Semana trabajo</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Horas / Semana de trabajo" required>
            </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Horas</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Diurno</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Nocturno</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Rotativo</label>
                    </div>
             </div>
            </div>
      
      <div class="clearfix"></div>

        <div class="row">
    <hr style="margin-top:5px;margin-bottom:10px;border:1px solid #423cbc;">
    <center>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Breve descripción del Cargo</label>
                    <textarea style="border-radius: 5px; width: 604px; height: 121px;" name="message" class="form-control" placeholder="Comenta una descripción resumida de su cargo" rows="4" required></textarea>
                </div>
            </div>
        </center>
        </div>  
<hr style="border:1px solid #423cbc;">
<h4 class="h4-form">Factores de Riesgo
     <div class="popup" onclick="myFunction6()"><b class="required-marlon">*</b>
     <span class="popuptext" id="myPopup6">Campos obligatorios.</span>
     </div>
</h4>
<small class="pull-left" style="color:#222d32">Ambientales y laborales de exposición actual (calificación del  1 al 5:1 Menor, 2 Moderado, 3 Mayor, 4 Severo y 5 Crítico)</small> 
<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-11">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" style="width:40%">Físicos</th>
            <th scope="col" style="width:30%">Químicos</th>
            <th scope="col" style="width:30%">Biológicos</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Ruido </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Vibraciones </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Humedad </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Alta Temperatura </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Baja Temperatura </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Ventilación Insuficiente </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Iluminación Insuficiente </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Exposición a presiones alta </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Contactos eléctricos directos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Contactos eléctricos indirectos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Exposición a radiaciones ionizantes </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Exposición a radiaciones no ionizantes </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Videoterminales </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
            </td>
            <td>
              <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Gases </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Solventes </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Metales </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Plaguicidas </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Polvos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Vapores </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Humos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Nieblas </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Cáusticos y/o corrosivas </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Aerosoles </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Ácidos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Material particulado </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Aerosoles líquidos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
            </td>
            <td>
              <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Virus </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Bacterias </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Hongos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Parásitos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Contaminantes </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Roedores </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Insectos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Otros </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
            </td>

          </tr>
        </tbody>
      </table>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" style="width:40%">Ergonómicos</th>
            <th scope="col" style="width:30%">Psico-social</th>
      <th scope="col" style="width:30%">Mecánicos</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Turnicidad </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Carga dinámica </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Estrés térmico </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Estrés lumínico </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Estrés acústico </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Manejo manual de cargas </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Movimientos Repetitivos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Posturas forzadas </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Falta de organización </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
            </td>
            <td>
              <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Jornada labor. > 8 h. </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Trabajo monótono </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Trabajo a presión </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Trabajo peligroso </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Tensión al salario </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Supervisión estrecha </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Tensión ambiente Laboral </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Tensión jefe inmediato </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Actividad exagerada </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
            </td>
      
      <td>
              <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Caída a distinto nivel </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Caída al mismo nivel </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Caída de objetos  </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Atrapamiento </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Espacio confinado </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Supervisión estrecha </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Incendio </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;">  Explosiones </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Choque contra objetos inmóviles o móviles </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Golpes/cortes por objetos herramientas </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:17px;"> Atropello o golpes por vehículos </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
        
        <div class="custom-control custom-checkbox">
           <b class="h4-form" style="font-size:15px;"> Proyección de fragmentos o partículas </b>
                  <input type="checkbox" class="custom-control-input pull-right" id="customCheck1">
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  
  <h4 class="h4-form">VALORACIÓN DE LOS FACTORES DE RIESGO
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>

      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Factores de Riesgo Identificados</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">1. Nulo</label>
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">2. Tolerable</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">3. Moderado</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">4. Importante</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">5. Intolerable</label>
                    </div>
             </div>
            </div>
      

      <div class="row">
        <div class="col-md-11">
          <div class="box box-solid">
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Información General Laboral
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">
          <div class="col-md-6">
                      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">Se le realiza examen médico periódico</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">Cambio de labor por peritaje médico</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">Ha sido evaluado anteriormente su puesto de trabajo?</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="date" value="2019-07-17" id="example-date-input">
                    </div>
                </div>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">Usa EPP´s</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">Los EPP´s son adecuados</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
            </div>
      </div>
      
<div class="col-md-6">
                      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">Considera que el trabajo afecta su salud</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">Maneja maquinaria, vehiculo, herramientas y mandos a diario (describir):</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">Su trabajo le ocasiona tensión emocional</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">Las pausas de trabajo son adecuadas para su recuperación física  </label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Describir..">
                    </div>
                </div>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">Durante la mayor parte de la jornada trabaja</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sentado</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">Otro</label>
                    </div>
             </div>
            </div>
      
      <div class="form-group row">
            <label for="base" class="col-sm-4 col-form-label">De pie</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Con esfuerzo</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">Sin esfuerzo</label>
                    </div>
             </div>
            </div>
      
      </div>  
<hr style="border:1px solid #423cbc;">  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Gafas</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                    </div>
                </div>
            </div>
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Protector auditivo</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">mascarilla</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Overol</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Botas</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Casco</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Respirador</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Guantes</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Otros</label>
            <div class="col-sm-2">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                    </div>
                </div>
            </div>  
<hr style="border:1px solid #423cbc;">  
  <h4 class="h4-form">ACCIDENTES DE TRABAJO EN LA EMPRESA ACTUAL O ANTERIORES</h4>    
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Fecha</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="date" value="2019-07-17" id="example-date-input">
                    </div>
                </div>
            </div> 
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Nombre de la Empresa donde se presentó el accidente</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Describa el Nombre">
                    </div>
                </div>
            </div>
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Naturaleza de la lesión</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Ej: fractura, amputación">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Parte del cuerpo afectada</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="'Qué parte de su cuerpo fue afectada?">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Días de Incapacidad</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Describa los días afectados">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Secuelas</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Mencione las secuelas">
                    </div>
                </div>
</div>   

<hr style="border:1px solid #423cbc;">  
  <h4 class="h4-form">ENFERMEDAD PROFESIONAL EN EMPRESA ACTUAL O ANTERIORES</h4>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">¿Cuál es?</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Describa la enfermedad profesional">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Fecha Diagnóstico o Calificación</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="date" value="0000-00-00" id="example-date-input">
                    </div>
                </div>
            </div> 
<hr style="border:1px solid #423cbc;">  
  <h4 class="h4-form">AUSENTISMO MÉDICO EN EL ÚLTIMO TRIMESTRE</h4> 
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Causa</label>
      <div class="col-sm-8">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="nombre de la enfermedad o razón que generó incapacidad médica en el último trimestre">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Tiempo</label>
      <div class="col-sm-5">
                    <div class="form-group">
                         <input class="form-control" type="text" placeholder="Coloca en días">
                    </div>
                </div>
            </div>      
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                       Antecedentes Patológicos Personales
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
            <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Alérgicos</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>  
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Clinicos</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Traumáticos</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Quirúrgicos</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Farmacológicos</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Psiquiátricos</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Otros</label>
      <div class="col-sm-5">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Antecedentes Gíneco-Obstétricos
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
<div class="col-md-6">
            <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">Menarquía</label>
      <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">FUM</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">Dismenorrea</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">Ritmo</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">Reg</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">Irreg</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">Hipermenorrea</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
</div>  

<div class="col-md-6">
            <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">G</label>
      <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">P</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">A</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div> 
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">C</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">RN. Bajo peso</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">Malformaciones,  Mortinatos</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">N° hijos vivos</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
      <div class="form-group row">
            <label for="base" class="col-sm-3 col-form-label">Anticoncepción</label>
      <div class="col-sm-4">
                    <div class="form-group">
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
</div>  
<hr style="border:1px solid #423cbc;"> 
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">PAP - Fecha - resultado
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="PAP" type="text">
                    </div>
                </div>
        <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" type="date" value="0000-00-00" id="example-date-input">
                    </div>
                </div>
        <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Resultado" type="text">
                    </div>
                </div>
</div>  

<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Memografía - Fecha - resultado
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Memografía" type="text">
                    </div>
                </div>
        <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" type="date" value="0000-00-00" id="example-date-input">
                    </div>
                </div>
        <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Resultado" type="text">
                    </div>
                </div>
</div>  

<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Eco Mamario - Fecha - resultado
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Eco Mamario" type="text">
                    </div>
                </div>
        <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" type="date" value="0000-00-00" id="example-date-input">
                    </div>
                </div>
        <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Resultado" type="text">
                    </div>
                </div>
</div>  

<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Secreción Vaginal - Fecha - resultado
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Secreción Vaginal" type="text">
                    </div>
                </div>
        <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" type="date" value="0000-00-00" id="example-date-input">
                    </div>
                </div>
        <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Resultado" type="text">
                    </div>
                </div>
</div>  

<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Menopausia
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Menopausia" type="text">
                    </div>
                </div>
</div>  
    
                    </div>
                  </div>
                </div>
        
<div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFor">
                        Hábitos
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFor" class="panel-collapse collapse">
                    <div class="box-body">
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Fumó</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Años" type="text">
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Unidad" type="text">
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Frecuencia" type="text">
                    </div>
                </div>
            </div>  

<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Tomó Alcohol</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Años" type="text">
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Unidad" type="text">
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Frecuencia" type="text">
                    </div>
                </div>
            </div>  
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Toma Alcohol</label>
            <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Años" type="text">
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Unidad" type="text">
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Frecuencia" type="text">
                    </div>
                </div>
            </div>  
  <div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label">Miccional</label>


       <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Día" type="text">
                    </div>
                </div>
        <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" placeholder="Noche" type="text">
                    </div>
                </div>

            </div>      


<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Defecatorio
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Defecatorio" type="text">
                    </div>
                </div>
</div>  

<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Alimentario
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Alimentario" type="text">
                    </div>
                </div>
</div>

<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Sueño
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Especifica en Horas" type="text">
                    </div>
                </div>
</div>

<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Medicamentos
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Especifica sus medicamentos" type="text">
                    </div>
                </div>
</div>

<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Ejercicio Formal
</label>
         <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="si">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                </div>
        <div class="col-sm-1">
                    <div class="form-group">
                        <input class="flat-red" type="radio"  id="inlineRadio1" value="no">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
             </div>
</div>

<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Frecuencia
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Frecuencia" type="text">
                    </div>
                </div>
</div>
<div class="form-group row">
            <label for="base" class="col-sm-2 col-form-label" style="margin-top:6px;">Sedentarismo
</label>
          <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" placeholder="Mencione sus sdentarismo" type="text">
                    </div>
                </div>
</div>
    
                    </div>
                  </div>
                </div>        
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>



















        </div>
     


     <input type="hidden" name="ID_Doctor"  class="form-control input-lg input-lg"    value="<?php echo $_SESSION['ID'] ?>">


</div>
 



</section>

<?php echo $mensaje_registro_patients;?>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

<?php include 'footer.php'?>



