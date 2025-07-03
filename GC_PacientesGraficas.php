<?php
    include 'header.php';
    include 'menu.php';

    if ($_GET["msg"] != "") {
        include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
    }
    if ($_GET["error"] != "") {
        include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
    }
    ?>
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper p-3">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <ol class="breadcrumb">
               <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
               <li><a href="#"> Gráficas de Crecimiento </a></li>
           </ol>
       </section>
       <!-- Main content -->
       <section class="content">
           <div class="">
               <div class="col-xs-12">
                   <h4 class="Titulo_Pagina"> Gráficas de Crecimiento <label><u id="TipoGrafica"></u></label></h4>


                   <div class="box">
                       <div class="box-header">
                           <a href="nuevoPaciente">
                               <button class="btn btn-block btn-outline-info mb-2 rounded-pill">
                                   <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
                               </button>
                           </a>

                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">


                           <div class="box-body table-responsive no-padding">
                               <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped casilla" style="font-size:18px">
                                   <thead>
                                       <tr>
                                        <th>Nombre</th>
                                        <th>Cédula</th>
                                        <th>Dirección (Casa)</th>
                                        <th>Celular (Contacto)</th>
                                        <th>Celular (WhatsApp)</th>
                                        <th>Correo</th>
                                        <th> </th>
                                       </tr>
                                   </thead>                                    
                               </table>
                           </div>
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

    <div class="modal fade" id="modalGraficas" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="display:block;">
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Escalas de la Gráfica</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body" id="Botones_Grafica">

                </div>
            </div>
        </div>
    </div>


   <?php if ($_GET["Tipo"] == "OMS" || $_GET["Tipo"]=="" || isset($_GET["Tipo"])) : ?>
   <script>
     //version 2 tabla rapida id="Tabla_Rapida_AJAX"
     var titulo_tabla = "Pacientes OMS";
     document.getElementById("TipoGrafica").innerHTML = "[OMS]";
     <?php if ($_SESSION['vista'] == 0) { ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE Sindrome_Down = 0 and activo='1' $queryCliente "; ?>";
     <?php } elseif ($_SESSION['vista'] == 1) {  ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente where usuario_id = $ID AND Sindrome_Down = 0 and activo='1' $queryCliente order by cliente_id"; ?>";
     <?php }  ?>

     columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente', 'Sindrome_Down'];

     columnastablas = [{
         "data": "nombre_cliente"
       },
       {
         "data": "CODI_CLIENTE"
       },
       {
         "data": "direccion_cliente"
       },
       {
         "data": "telefono_cliente"
       },
       {
         "data": "whatsapp"
       },
       {
         "data": "correo_cliente"
       },
       {
         "data": function(row, type, set) {
           botones = "";
            if(row.Sindrome_Down=="No"){
              Sindrome_Down="0";
            }
            else{
              Sindrome_Down="1";
            }

            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",1,1);'> Gráfica Peso / Edad </button>";
            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",2,1);'> Gráfica Altura / Edad </button>";
            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",3,1);'> Gráfica Perímetro Cefálico</button>";
            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",4,1);'> Gráfica IMC</button>";

           return botones;
         }
       }

     ];
   </script>
   <?php endif; ?>



   <?php if ($_GET["Tipo"] == "CDC") : ?>
   <script>
     //version 2 tabla rapida id="Tabla_Rapida_AJAX"
     var titulo_tabla = "Pacientes CDC";
     document.getElementById("TipoGrafica").innerHTML = "[CDC]";
     <?php if ($_SESSION['vista'] == 0) { ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE Sindrome_Down = 0 $queryCliente"; ?>";
     <?php } elseif ($_SESSION['vista'] == 1) {  ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente where usuario_id = $ID AND Sindrome_Down = 0 $queryCliente order by cliente_id"; ?>";
     <?php }  ?>

     columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente', 'Sindrome_Down'];

     columnastablas = [{
         "data": "nombre_cliente"
       },
       {
         "data": "CODI_CLIENTE"
       },
       {
         "data": "direccion_cliente"
       },
       {
         "data": "telefono_cliente"
       },
       {
         "data": "whatsapp"
       },
       {
         "data": "correo_cliente"
       },
       {
         "data": function(row, type, set) {
           botones = "";
            if(row.Sindrome_Down=="No"){
              Sindrome_Down="0";
            }
            else{
              Sindrome_Down="1";
            }

            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",1,2);'> Gráfica Peso / Edad </button>";
            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",2,2);'> Gráfica Altura / Edad </button>";
            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",3,2);'> Gráfica Perímetro Cefálico</button>";
            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",4,2);'> Gráfica IMC</button>";

           return botones;
         }
       }

     ];
   </script>
   <?php endif; ?>


   <?php if ($_GET["Tipo"] == "SD") : ?>
   <script>
     //version 2 tabla rapida id="Tabla_Rapida_AJAX"
     var titulo_tabla = "Pacientes Síndrome de Down";
     document.getElementById("TipoGrafica").innerHTML = "[Sindrome Down]";
     <?php if ($_SESSION['vista'] == 0) { ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE Sindrome_Down = 1 $queryCliente"; ?>";
     <?php } elseif ($_SESSION['vista'] == 1) {  ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente where usuario_id = $ID AND Sindrome_Down = 1 $queryCliente order by cliente_id"; ?>";
     <?php }  ?>

     columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente', 'Sindrome_Down'];

     columnastablas = [{
         "data": "nombre_cliente"
       },
       {
         "data": "CODI_CLIENTE"
       },
       {
         "data": "direccion_cliente"
       },
       {
         "data": "telefono_cliente"
       },
       {
         "data": "whatsapp"
       },
       {
         "data": "correo_cliente"
       },
       {
         "data": function(row, type, set) {
           botones = "";
            if(row.Sindrome_Down=="No"){
              Sindrome_Down="0";
            }
            else{
              Sindrome_Down="1";
            }

            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",1,3);'> Gráfica Peso / Edad </button>";
            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",2,3);'> Gráfica Altura / Edad </button>";
            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",3,3);'> Gráfica Perímetro Cefálico</button>";
            botones += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("+row.cliente_id+",4,3);'> Gráfica IMC</button>";

           return botones;
         }
       }

     ];
   </script>
   <?php endif; ?>


<?php
    include 'footer.php';
?>

<script>

      function CargarGraficas(cliente_id,Tipo,DatosGrafica){
        
        var TipoArreglo={
          "1":"Peso x Edad",
          "2":"Altura x Edad",
          "3":"Perimetro Cefalico",
          "4":"IMC",
        };

        var TipoArregloVisual={
          "1":"Peso / Edad",
          "2":"Altura / Edad",
          "3":"Perímetro Cefálico",
          "4":"IMC",
        };


        switch (DatosGrafica) {
            case 1:
                var Direccion = "graficasCrecimientoOMS";
                //definir un arreglo
                Botones = new Array (); 
                Botones["1"] = ["0-2","2-5","5-10","General"];
                Botones["2"] = ["0-2","2-5","5-19","General"];
                Botones["3"] = ["0-2","2-5","General"];
                Botones["4"] = ["0-2","2-5","5-19","General"];
                break;
            case 2:
                var Direccion = "graficasCrecimientoCDC";

                Botones = new Array ();
                Botones["1"] = ["0-3","2-20","General"];
                Botones["2"] = ["0-3","2-20","General"];
                Botones["3"] = ["0-3","General"];
                Botones["4"] = ["2-20","General"];
                break;
            case 3:
                var Direccion = "graficasCrecimientoSD";
                Botones = new Array ();
                Botones["1"] = ["0-3","2-20","General"];
                Botones["2"] = ["0-3","2-20","General"];
                Botones["3"] = ["0-3","General"];
                Botones["4"] = ["2-20","General"];
                break;
        }

        //en el campo Botones_Grafica crear los botones que redireccionan a la grafica con href GraficasCrecimiento_OMS.php?clienteId=cliente_id&Tipo=TipoArreglo&Botones=Botones

          var Botones_Grafica = "";
          for (var i = 0; i < Botones[Tipo].length; i++) {
            //estilo de los botones con class='btn btn-outline-primary rounded-pill' y width='100%' y un hr separador 
              Botones_Grafica += "<button type='button' class='btn btn-outline-primary rounded-pill' style='width:100%;' onclick='window.open(\""+Direccion+"?cI=<?=salt()?>"+btoa(cliente_id)+"&Tipo="+TipoArreglo[Tipo]+"&Botones="+Botones[Tipo][i]+"\",\"_blank\")'>"+TipoArregloVisual[Tipo]+" ["+Botones[Tipo][i]+"]</button><hr>";
            
           
          }
          $("#Botones_Grafica").html(Botones_Grafica);
      }
</script>