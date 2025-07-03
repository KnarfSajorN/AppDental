

                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <!-- este evento esta en Include_GraficasCrecimientoZ_1.php -->
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_3" onclick ="simularEventoResize();EjecutarGraficas();">
                                                        2.3 Valoración del estado nutricional y seguimiento a parámetros antropométricos 
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_3" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposExamenFisico = [
                                                            "ExamenFisico_Parametros_Peso" => "Peso",
                                                            "ExamenFisico_Parametros_Talla" => "Talla",
                                                            "ExamenFisico_Parametros_IMC" => "IMC",
                                                            
                                                            "ExamenFisico_Parametros_IMC_Edad" => "IMC/Edad",
                                                            "ExamenFisico_Parametros_Talla_Edad" => "Talla/Edad",
                                                        ];

                                                        $ArregloClasesFuncinInputDuplicado = [];
                                                        $ArregloClasesFuncinInputDuplicado["ExamenFisico_Parametros_Peso"]="InputPeso_Funcion";
                                                        $ArregloClasesFuncinInputDuplicado["ExamenFisico_Parametros_Talla"]="InputAltura_Funcion";
                                                        $ArregloClasesFuncinInputDuplicado["ExamenFisico_Parametros_IMC"]="InputIMC_Funcion";
                                                        $ArregloClasesFuncinInputDuplicado["ExamenFisico_Parametros_PerimetroC"]="InputPerimetroCefalico_Funcion";

                                                        $ArregloReadOnly = [];
                                                        $ArregloReadOnly['ExamenFisico_Parametros_IMC'] = "readOnly";
                                                        $Contador = 0;
                                                        foreach ($ArreglosCamposExamenFisico as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            $Contador++;

                                                            if($Contador == 4){
                                                                echo '<label style="color:red;">* Los campos Peso,Altura,IMC tendran el mismo valor que se agregue ya sea en este modulo 2.3 o en el modulo 2.1 por lo que si se modifica aqui se modificara en  el modulo 2.1 y viceversa *</label>';
                                                                echo "<div class='form-group col-md-12'><hr></div>";
                                                            }
                                                            echo"
                                                                <div class='form-group col-md-6'>
                                                                    <label>$Titulo</label><br>
                                                                    <input type='number' step='0.01' class='form-control $ArregloClasesFuncinInputDuplicado[$Identificacion]' name='ExamenFisico[ParametrosAntropometricos][Valoracion][$Identificacion][$Titulo]' id='$Identificacion' $ArregloReadOnly[$Identificacion]>
                                                                </div>";
                                                            
                                                        }

                                                        include 'ModulosRIAS/Infancia/Include_GraficasCrecimientoZ_1.php';
                                                        ?>


                                                        <div class='form-group col-md-12'>
                                                            <br>
                                                            <hr>
                                                            <br>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

<script>
// Obtén todos los elementos con las clases InputPeso_Funcion y InputAltura_Funcion
    var camposPeso = document.querySelectorAll('.InputPeso_Funcion');
  var camposAltura = document.querySelectorAll('.InputAltura_Funcion');
  var camposIMC = document.querySelectorAll('.InputIMC_Funcion');
  var camposPerimetroCefalico = document.querySelectorAll('.InputPerimetroCefalico_Funcion');

  // Asigna la función a todos los campos
  camposPeso.forEach(function(campo) {
    campo.oninput = function() {
      cambiarOtrosCampos(campo, camposPeso);
      IMC();
      LLENARIMC();
    };
  });
  
  camposAltura.forEach(function(campo) {
    campo.oninput = function() {
      cambiarOtrosCampos(campo, camposAltura);
      IMC();
      LLENARIMC();
    }
  })


  camposPerimetroCefalico.forEach(function(campo) {
    campo.oninput = function() {
      cambiarOtrosCampos(campo, camposPerimetroCefalico);
    }
  })

  

  function cambiarOtrosCampos(input, campos) {
    // Obtén el valor del campo que ha cambiado
    var nuevoValor = input.value;

    // Itera sobre los campos y establece el nuevo valor
    campos.forEach(function(campo) {
      // Evita cambiar el valor del campo que ha cambiado inicialmente
      if (campo !== input) {
        campo.value = nuevoValor;

        // Opcional: Aplica un estilo para resaltar el cambio
        campo.classList.add("resaltado");
        setTimeout(function() {
          campo.classList.remove("resaltado");
        }, 1000); // Elimina el resaltado después de 1 segundo (1000 milisegundos)
      }
    });
  }

  function LLENARIMC(){
      var IMC_1 = document.getElementById('SignosVitales_IMC').value;
      var IMC_2 = document.getElementById('ExamenFisico_Parametros_IMC').value;

      if(IMC_1 != ''){
        document.getElementById('ExamenFisico_Parametros_IMC').value = IMC_1;
      }
  }

  function EjecutarGraficas(){

    AgregarGraficaCrecimientoZ_AlturaEdad();
    AgregarGraficaCrecimientoZ_AlturaPeso();
    AgregarGraficaCrecimientoZ_PerimetroCefalico();
    AgregarGraficaCrecimientoZ_IMC();
    AgregarGraficaCrecimientoZ_PesoEdad();

    
  }
</script>
