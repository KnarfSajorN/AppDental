<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 
 if ($_POST['citaAprobada'] == 1) {
  include 'guardarCita_Include.php';
}

date_default_timezone_set('America/Bogota');
 


        $ID                    = $_POST['ID']; 

        $fechaHora            = date("Y-m-d H:i:s");

        $registro             = $_POST['registro'];          
        $idUsuario            = $_POST['usuario_id'];
        $idusuario            = $_POST['usuario_id'];          
        $idCliente            = $_POST['clienteId'];  


        $dolorrRenal          = reem($_POST['dolorRenal']);     
        $notaRenal           =reem ($_POST['notaRenal']);          
        $dolorUreteral        = $_POST['dolorUreteral'];          
        $notaUreteral        = reem($_POST['notaUreteral']); 

        $dolorVesical        = reem($_POST['dolorVesical']); 
        $notaVesical         = reem($_POST['notaVesical']);      
        $dolorProstatico     = reem($_POST['dolorProstatico']); 

        $notaProstatica       = $_POST['notaProstatica'];        
        $dolorEscrotal        = $_POST['dolorEscrotal'];        
        $notaEscrotal         =reem( $_POST['notaEscrotal']);  



        $Polaquiuria          = reem($_POST['Polaquiuria']);
        $notaPolaquiuria       =reem( $_POST['notaPolaquiuria']);
        $dolorUretral        = $_POST['dolorUretral'];
        $notaUretral       =reem( $_POST['notaUretral']);    

        $Poliuria               = $_POST['Poliuria'];  
        $notaPoliuria     = reem($_POST['notaPoliuria']); 
        $OliguriaAnuria         = $_POST['OliguriaAnuria'];        
        $notaOliguriaAnuria     = reem($_POST['notaOliguriaAnuria']) ;
        $nicturia               = ($_POST['nicturia']);   
        $notaNicturia            = $_POST['notaNicturia']; 
        $Disuria               = ($_POST['Disuria']);   
        $notaDisuria            = $_POST['notaDisuria'];        
        $incontinencia          = reem($_POST['incontinencia']);        
        $notaIncontinencia       = reem($_POST['notaIncontinencia']);        
        $Enuresis               = $_POST['enuresis'];  
        $notaEnuresis           = reem($_POST['notaEnuresis']);
        $Neumaturia            = reem($_POST['neumaturia']);
        $notaNeumaturia               = reem($_POST['notaNeumaturia']);   
        $fecaluria           = $_POST['fecaluria'];        
        $notaFecaluria       = reem($_POST['notaFecaluria']); 
        $Quiluria           = $_POST['quiluria'];        
        $notaQuiluria      = reem($_POST['notaQuiluria']); 
        $Menouria      = reem($_POST['menouria']);        
        $notaMenouria   = reem($_POST['notaMenouria']);
        $orinaTurbia             = reem($_POST['orinaTurbia']);   
        $notaOrinaturbia          = reem($_POST['notaOrinaturbia']);        
        $supuracionUretral         = reem($_POST['supuracionUretral']);        
        $notaSupuracionUretral      = reem($_POST['notaSupuracionUretral']);
        $Impotencia    = reem($_POST['impotencia']);        
        $notaImpotencia   = reem($_POST['notaImpotencia']); 



        $exploracionUrologica           = reem($_POST['exploracionUrologica']);   
        $exploracionRenal         = reem($_POST['exploracionRenal']);        
        $exploracionVesical         = reem($_POST['exploracionVesical']);        
        $exploracionGeneralExternosMasculinos     = reem($_POST['exploracionGeneralExternosMasculinos']);
        $tactoRectal         = reem($_POST['tactoRectal']);
        $FuncionRenalA        = reem($_POST['FuncionRenalA']); 
        $EstadoGeneralOrganismo        = reem($_POST['EstadoGeneralOrganismo']);        
        $AntigenosEspecificos        = reem($_POST['AntigenosEspecificos']);        
        $Serologia     = reem($_POST['Serologia']);

        $Otras          = reem($_POST['Otras']);   
        $EstudiosFisicoQuimicos         = reem($_POST['EstudiosFisicoQuimicos']);        
        $ExamenSedimentoUrinario         = reem($_POST['ExamenSedimentoUrinario']);        
        $ExamenBacteriologico     = reem($_POST['ExamenBacteriologico']);
        $ExploracionesComplementariasdeImagen         = reem($_POST['ExploracionesComplementariasdeImagen']);   
        $RXsimpleAbdomen       = reem($_POST['RXsimpleAbdomen']);        
        $urografiaIntravenosa       = reem($_POST['urografiaIntravenosa']);        
        $urografiaRetrograda    = reem($_POST['urografiaRetrograda']);
        $TacRmn         = reem($_POST['TacRmn']);   
        $MetodosEndoscopicos         = reem($_POST['MetodosEndoscopicos']); 


        $fecha         = reem($_POST['fecha']);        
        $Hora     = reem($_POST['Hora ']);
        $motivo        = reem($_POST['motivo']);   
        $doctor      = reem($_POST['doctor']);        
       



        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
        // $nrowl=mysqli_num_rows($queryList);
        if ($queryList) {
          while($rowMotorizado=mysqli_fetch_array($queryList))
          {
              $celular_cliente = $rowMotorizado['celular_cliente'];
              $email = $rowMotorizado['correo_cliente'];
          }
        }
        




       
        if ($dolorrRenal <> '') {$s1 = 'Dolor Renal :'.$dolorrRenal.'<br>';}
        if ($notaRenal <> '') {$s2 = ' Nota Renal: '.$notaRenal.'<br>';}
        if ($dolorUreteral<> '') {$s3 = ' Dolor Ureteral: '.$dolorUreteral.'<br>';}
        if ($notaUreteral <> '') {$s4 = ' Nota Uretera: '.$notaUreteral.'<br>';}
        if ($dolorVesical <> '') {$s5 = ' Dolor Vesical: '.$dolorVesical.'<br>';}
        if ($notaVesical <> '') {$s6 = ' Nota Vesical : '. $notaVesical.'<br>';}
        if ($dolorProstatico <> '') {$s7 = ' Dolor Postático: '.$dolorProstatico.'<br>';}
        if ($notaProstatica <> '') {$s8 = ' Nota Prostática: '.$notaProstatica.'<br>';}
        if ($dolorUretral <> '') {$s71 = ' Dolor Uretral : '.$dolorUretral.'<br>';}
        if ($notaUretral <> '') {$s81 = ' Nota Uretral: '.$notaUretral.'<br>';}
        if ($dolorEscrotal <> '') {$s9 = ' Dolor Escrotal: '.$dolorEscrotal.'<br>';}
        if ($notaEscrotal  <> '') {$s10 = ' Nota Escrotal: '.$notaEscrotal.'<br>';}

        if ($Polaquiuria <> '') {$s11 = ' Polaquiuria: '.$Polaquiuria.'<br>';}
        if ($notaPolaquiuria  <> '') {$s12 = 'Nota Polaquiuria :'.$notaPolaquiuria .'<br>';}
        if ($Poliuria <> '') {$s13 = '   Poliuria: '.$Poliuria.'<br>';}
         if ($notaPoliuria <> '') {$s14 = 'Nota   Poliuria: '.$notaPoliuria.'<br>';}
        if ($OliguriaAnuria <> '') {$s15 = ' Oliguria Anuria: '.$OliguriaAnuria .'<br>';}
        if ($notaOliguriaAnuria  <> '') {$s16 = ' Nota Oliguria Anuria: '.$notaOliguriaAnuria .'<br>';}
        if ($nicturia <> '') {$s1512 = ' Nicturia: '.$nicturia .'<br>';}
        if ($notaNicturia  <> '') {$s1612 = ' Nicturia: '.$notaNicturia .'<br>';}
        if ($Disuria   <> '') {$s17 = ' Disuria: '.$Disuria.'<br>';}
        if ($notaDisuria <> '') {$s18 = '  Nota Disuria : '.$notaDisuria.'<br>';}
        if ($incontinencia <> '') {$s19= '  Incontinencia: '. $incontinencia.'<br>';}
        if ($notaIncontinencia  <> '') {$s20= ' Nota Incontinencia : '.$notaIncontinencia.'<br>';}
        if ($Enuresis  <> '') {$s21 = '  Enuresis : '.$Enuresis.'<br>';}
        if ($notaEnuresis  <> '') {$s22= ' Nota Enuresis: '.$notaEnuresis.'<br>';}
        if ($Neumaturia <> '') {$s23 = ' Neumaturia: '. $Neumaturia.'<br>';}
        if ($notaNeumaturia  <> '') {$s24 = 'Nota Neumaturia :'.$notaNeumaturia.'<br>';}
        if ($fecaluria <> '') {$s25 = ' Fecaluria : '.$fecaluria .'<br>';}
        if ($notaFecaluria <> '') {$s26 = 'Nota Fecaluria: '.$notaFecaluria .'<br>';}
        if ($Quiluria <> '') {$s27 = 'Quiluria : '. $Quiluria .'<br>';}
        if ($notaQuiluria  <> '') {$s28 = 'Nota Quiluria: '.$notaQuiluria.'<br>';}
        if ($Menouria   <> '') {$s29= 'Menouria  : '.$Menouria.'<br>';}
        if ($notaMenouria<> '') {$s30 = 'Nota Menouria: '.$notaMenouria.'<br>';}
        if ($orinaTurbia   <> '') {$s31 = ' Orina Turbia : '.$orinaTurbia.'<br>';}
        if ($notaOrinaturbia <> '') {$s32 = 'Nota Orinaturbia : '.$notaOrinaturbia.'<br>';}
        if ($supuracionUretral   <> '') {$s33 = 'Supuración Uretral : '.$supuracionUretral.'<br>';}
        if ($notaSupuracionUretral  <> '') {$s34 = ' Nota Supuración Uretral: '.$notaSupuracionUretral. '<br>';}
        if ($Impotencia <> '') {$s35 = ' Impotencia : '.$Impotencia .'<br>';}
        if ($notaImpotencia   <> '') {$s36 = 'Nota Impotencia  : '.$notaImpotencia .'<br>';}

        if ($exploracionUrologica <> '') {$s37 = 'Exploración Urologica: '.$exploracionUrologica.'<br>';}
        if ($exploracionRenal   <> '') {$s38 = ' Exploración Renal: '.$exploracionRenal.'<br>';}
        if ($exploracionVesical  <> '') {$s39 = 'Exploración Vesical : '.$exploracionVesical . '<br>';}
        if ($exploracionGeneralExternosMasculinos <> '') {$s40 = ' Exploración General Externos Masculinos : '. $exploracionGeneralExternosMasculinos.'<br>';}
        if ($tactoRectal     <> '') {$s41 = 'Tacto Rectal    : '.$tactoRectal.'<br>';}

        if ($FuncionRenalA <> '') {$s421 = 'Función Renal: '.$FuncionRenalA.'<br>';}

        if ($EstadoGeneralOrganismo <> '') {$s42 = 'Estado General del Organismo: '.$EstadoGeneralOrganismo.'<br>';}
        if ($AntigenosEspecificos   <> '') {$s43 = 'Antígenos Específicos: '.$AntigenosEspecificos.'<br>';}
        if ($Serologia  <> '') {$s44 = ' Serología : '. $Serologia. '<br>';}
        if ($Otras <> '') {$s45 = ' Otras : '. $Otras .'<br>';}
        if ($EstudiosFisicoQuimicos <> '') {$s46 = 'Estudios Físico-Químicos : '.$EstudiosFisicoQuimicos .'<br>';}
        if ($ExamenSedimentoUrinario  <> '') {$s47 = 'Examen del Sedimento Urinario : '.$ExamenSedimentoUrinario .'<br>';}
        if ($ExamenBacteriologico <> '') {$s48 = 'Examen Bacteriológico : '.$ExamenBacteriologico .'<br>';}
        if ($ExploracionesComplementariasdeImagen <> '') {$s49 = 'Exploraciones Complementarias por Métodos de Imagen  : '. $ExploracionesComplementariasdeImagen . '<br>';}

        if ($RXsimpleAbdomen <> '') {$s50 = 'Rx Simple de Abdomen : '. $RXsimpleAbdomen .'<br>';}
        if ($urografiaIntravenosa  <> '') {$s51 = 'Urografía Intravenosa (UIV)  : '.$urografiaIntravenosa.'<br>';}
        if ($urografiaRetrograda <> '') {$s52 = 'Urografía Retrógrada: '.$urografiaRetrograda.'<br>';}
        if ($TacRmn <> '') {$s54 = 'Tac y Rmn: '. $TacRmn. '<br>';}
        if ($MetodosEndoscopicos <> '') {$s55 = 'Métodos Endoscópicos: '. $MetodosEndoscopicos .'<br>';}
      
$descripcion = 'Dolor Urológico:<br> '.$s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.$s71.$s81.$s9.$s10.'<br> Alteraciones de la Micción y de la Excreción De Orina:<br> '.$s11.$s12.$s13.$s14.$s15.$s16.$s1512.$s1612.$s17.$s18.$s19.$s20.$s21.$s22.$s23.$s24.$s25.$s26.$s27.$s28.$s29.$s30.$s31.$s32.$s33.$s34.$s35.$s36.'<br>Exploración General Completa:<br>'.$s37.$s38.$s39.$s40.$s41.'<br>Exploraciones Complementarias en Urología:<br>'.$s421.$s42.$s43.$s44.$s45.$s46.$s47.$s48.$s49.$s50.$s51.$s52.$s53.$s54.$s55;  
      

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

$queryAuditor = "INSERT INTO historiaClinica_urologia 
(cliente_id, Usuario_id, Fecha,   detalle) VALUES 
('$idCliente','$idUsuario', '$fechaHora', '$descripcion'";
$queryAuditor = str_replace("'", '', $queryAuditor);
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);
//echo $queryAuditor;

auditorMaster($idusuario, '1', $enlace_actual, $queryAuditor);

mysqli_query($conn3,"INSERT INTO historiaClinica_urologia 
(cliente_id, Usuario_id, Fecha,   detalle) VALUES 
('$idCliente','$idUsuario', '$fechaHora', '$descripcion');");


echo "INSERT INTO historiaClinica_urologia 
(cliente_id, Usuario_id, Fecha,   detalle) VALUES 
('$idCliente','$idUsuario', '$fechaHora', '$descripcion');";



          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from historiaClinica_urologia where cliente_id = $idCliente");
              // $nrowl=mysqli_num_rows($queryListhc);
              if ($queryListhc) {
                while($rowhc=mysqli_fetch_array($queryListhc))
                {
                  $historiaClinica1=$rowhc['historiaClinica1'];
                }   
              }
              

// Para el Recetario
/*$Recetario_Nombre_Historia = "historiaClinica_urologia";
$Recetario_historia_id = $historiaClinica1;
$Recetario_cliente_id = $idCliente;
$Recetario_usuario_id = $idUsuario;
include 'RM_GuardarRecetaHistoria.php';*/


if($_POST['Ruta_Historia_AutoGuardado']!=""){
	$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];

	$query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$idCliente' and usuario_id = '$idUsuario' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
	mysqli_query($conn3, $query);
}

    echo "<script language='Javascript'> window.location='HU_Finalizado_Historia_Urologia?historiaClinica1=$historiaClinica1';</script>"; 

?>
