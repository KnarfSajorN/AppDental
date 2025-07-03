<?php
   include 'header.php';
   include 'menu.php';


  

                  //print_r($_GET);
                      //asignación de valores a las variables
                   
                   $grupo=$_GET['grupo'];
                    

                     
               print"<script languaje='JavaScript'>

                   var respuesta=confirm('Esta Seguro que Desea Eliminar Este Registro.  \\nPulse -ACEPTAR- si está Seguro, o -CANCELAR- para Regresar');
                      if (respuesta==true) {
  

                           window.location.href='eliminargrupo.php?grupo=$grupo';
                            }else{
                                  window.location.href='gruposAtencion.php';
                                 }

    
                              </script>"; 




 ?> 
