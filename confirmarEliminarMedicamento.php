<?php
   include 'header.php';
   include 'menu.php';


   if(isset($_GET['IDm'])) {

                  //print_r($_GET);
                      //asignación de valores a las variables
                   $codigo=$_GET['IDm'];
                   $codigo1=$_GET['cliente'];
                    

                     
               print"<script languaje='JavaScript'>

                   var respuesta=confirm('Esta Seguro que Desea Eliminar Este Registro.  \\nPulse -ACEPTAR- si está Seguro, o -CANCELAR- para Regresar');
                      if (respuesta==true) {
  

                           window.location.href='eiminarMedicamento.php?codigo=$codigo&cliente=$codigo1';
                            }else{
                                  window.location.href='pacientesRecetario.php';
                                 }

    
                              </script>"; 


}

 ?> 