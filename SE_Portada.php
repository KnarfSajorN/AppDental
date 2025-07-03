<?php
include 'header.php'
?>

<body>
  <?php include 'menu.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio </a></li>

      </ol>
    </section>



    <br>
    <br>



    <section class="content">










        <br>

        <div class="row">
          <div class="col-md-12">
          
            


            <div class="col-md-12">

<div class="panel panel-info">
  <div class="panel-heading">Agenda para Hoy <?php echo date('Y-m-d'); ?></div>
  <div class="panel-body">
    <table id="example1" class="table table-bordered table-fixed  ">
      <thead>
        <tr>

          
          <th class="text-center">Fecha-Hora</th>
          <th class="text-center">Nombre</th>
         
          <th class="text-center">Motivo Consulta</th>

          <th></th>
     

        </tr>
      </thead>
      <tbody>
        <div align="center">
          <h3>Agenda para Hoy <?php echo date('Y-m-d'); ?></h3>
        </div>
        <?php
        $facturas = 0;
        $clientes = 0;
        $ID = $_SESSION['ID'];
        $fecha = date('Y-m-d');

        $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


        $doctor = $_SESSION['username'];
      
        $queryList = mysqli_query($conn3, "SELECT * FROM  citas  where estado = 7 and estadoEspera=1  order by fecha asc ");
        $nrowl = mysqli_num_rows($queryList);
        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
          $idCitas      = $row_recordset32['idCitas'];
          $doctor = $row_recordset32['doctor'];
          $fecha = $row_recordset32['fecha'];
          $Hora = $row_recordset32['Hora'];
          $nombre = $row_recordset32['nombre'];
          $telefono = $row_recordset32['telefono'];
          $correo = $row_recordset32['correo'];
          $motivoConsulta = $row_recordset32['motivoConsulta'];
       
          $estado = $row_recordset32['estado'];
      

          echo '     
      <tr>
         
      <td width="20%" class="text-center">' . $fecha . '-' . $Hora . '</td>
      <td width="15%" class="text-center">' . $nombre . '</td>
     

      <td width="30%" class="text-center">' . $motivoConsulta . '</td>';
        ?>

          <td width="10%" class="text-center">
                                             <button class="btn btn-block btn-primary btn-sm " onclick="TomarCita(<?php echo $idCitas; ?>)">Tomar Cita</button>
                                             

                                             

                                            

          </td>

        <?php

          
        }


        ?>

        </tr>
        <a href=""></a>
      </tbody>
    </table>



  </div>
</div>


</div>
          </div>
        </div>






    </section>





    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include 'footer.php'; ?>









  <script type="text/javascript">
 function TomarCita(idCita) {
    let data = {
            key: "TomarCita",
            idCitas: idCita
            
        };
    $.ajax({
        url: 'SE_AjaxCitas.php',
        type: 'POST',
        data: data,
        success: function(data) {
            console.log(data);
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}
  </script>