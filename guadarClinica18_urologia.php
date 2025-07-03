<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 


        $ID                    = $_POST['ID']; 

        $fechaHora            = date("Y-m-d H:i:s");

        $registro             = $_POST['registro'];          
        $idUsuario            = $_POST['usuario_id'];          
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

        $Poliuria               = $_POST['Poliuria'];  
        $notaPoliuria     = reem($_POST['notaPoliuria']); 
        $OliguriaAnuria         = $_POST['OliguriaAnuria'];        
        $notaOliguriaAnuria     = reem($_POST['notaOliguriaAnuria']) ;
        $Disuria               = reem($_POST['Disuria']);   
        $notaDisuria            = $_POST['notaDisuria'];        
        $incontinencia          = reem($_POST['incontinencia']);        
        $notaIncontinencia       = reem($_POST['notaIncontinencia']);        
        $Enuresis               = $_POST['Enuresis'];  
        $notaEnuresis           = reem($_POST['notaEnuresis']);
        $Neumaturia            = reem($_POST['Neumaturia']);
        $notaNeumaturia               = reem($_POST['notaNeumaturia']);   
        $fecaluria           = $_POST['fecaluria'];        
        $notaFecaluria       = reem($_POST['notaFecaluria']); 
        $Quiluria           = $_POST['Quiluria'];        
        $notaQuiluria      = reem($_POST['notaQuiluria']); 
        $Menouria      = reem($_POST['Menouria']);        
        $notaMenouria   = reem($_POST['notaMenouria']);
        $orinaTurbia             = reem($_POST['orinaTurbia']);   
        $notaOrinaturbia          = reem($_POST['notaOrinaturbia']);        
        $supuraciónUretral         = reem($_POST['supuraciónUretral']);        
        $notaSupuracionUretral      = reem($_POST['notaSupuracionUretral']);
        $Impotencia    = reem($_POST['Impotencia']);        
        $notaImpotencia   = reem($_POST['notaImpotencia']); 



        $exploracionUrologica           = reem($_POST['exploracionUrologica']);   
        $exploracionRenal         = reem($_POST['exploracionRenal']);        
        $exploracionVesical         = reem($_POST['exploracionVesical']);        
        $exploracionGeneralExternosMasculinos     = reem($_POST['exploracionGeneralExternosMasculinos']);
        $tactoRectal         = reem($_POST['tactoRectalA']);   
        $EstadoGeneralOrganismo        = reem($_POST['EstadoGeneralOrganismo']);        
        $AntigenosEspecificos        = reem($_POST['AntigenosEspecificosl']);        
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
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $celular_cliente = $rowMotorizado['celular_cliente'];
            $email = $rowMotorizado['correo_cliente'];
        }




       
        if ($dolorrRenal <> '') {$s1 = 'Dolor Renal :'.$dolorrRenal.'<br>';}
        if ($notaRenal <> '') {$s2 = ' Nota Renal: '.$notaRenal.'<br>';}
        if ($dolorUreteral<> '') {$s3 = ' Dolor Ureteral: '.$dolorUreteral.'<br>';}
        if ($notaUretera <> '') {$s4 = ' Nota Uretera: '.$notaUretera.'<br>';}
        if ($dolorVesical <> '') {$s5 = ' Dolor Vesical: '.$ $dolorVesical.'<br>';}
        if ($notaVesical <> '') {$s6 = ' Nota Vesical : '. $dolorVesical.'<br>';}
        if ($dolorProstatico <> '') {$s7 = ' Dolor Postático: '.$dolorProstatico.'<br>';}
        if ($notaProstatica <> '') {$s8 = ' Nota Prostática: '.$notaProstatica.'<br>';}
        if ($dolorEscrotal <> '') {$s9 = ' Dolor Escrotal: '.$dolorEscrotal.'<br>';}
        if ($notaEscrotal  <> '') {$s10 = ' Nota Escrotal: '.$notaEscrotal.'<br>';}

        if ($Polaquiuria <> '') {$s11 = ' Polaquiuria: '.$Polaquiuria.'<br>';}
        if ($notaPolaquiuria  <> '') {$s12 = 'Nota Polaquiuria :'.$notaPolaquiuria .'<br>';}
        if ($Poliuria <> '') {$s13 = '   Poliuria: '.$Poliuria.'<br>';}
         if ($notaPoliuria <> '') {$s14 = 'Nota   Poliuria: '.$notaPoliuria.'<br>';}
        if ($OliguriaAnuria <> '') {$s15 = ' Oliguria Anuria: '.$OliguriaAnuria .'<br>';}
        if ($notaOliguriaAnuria  <> '') {$s16 = ' Nota Oliguria Anuria: '.$notaOliguriaAnuria .'<br>';}
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
        if ($supuraciónUretral   <> '') {$s33 = 'SupuraciónUretral : '.$supuraciónUretral .'<br>';}
        if ($notaSupuracionUretral  <> '') {$s34 = ' Neumaturia: '.$notaSupuracionUretral. '<br>';}
        if ($Impotencia <> '') {$s35 = ' Impotencia : '.$Impotencia .'<br>';}
        if ($notaImpotencia   <> '') {$s36 = 'Nota Impotencia  : '.$notaImpotencia .'<br>';}

        if ($exploracionUrologica <> '') {$s37 = 'Exploracion Urologica: '.$exploracionUrologica.'<br>';}
        if ($exploracionRenal   <> '') {$s38 = ' Exploracion Renal: '.$exploracionRenal.'<br>';}
        if ($exploracionVesical  <> '') {$s39 = 'Exploracion Vesical : '.$exploracionVesical . '<br>';}
        if ($exploracionGeneralExternosMasculinos <> '') {$s40 = ' Exploracion Genera lExternos Masculinos : '. $exploracionGeneralExternosMasculinos.'<br>';}
        if ($tactoRectal     <> '') {$s41 = 'Tacto Rectal    : '.$tactoRectal.'<br>';}

        if ($EstadoGeneralOrganismo <> '') {$s42 = 'Estado General del Organismo: '.$EstadoGeneralOrganismo.'<br>';}
        if ($AntigenosEspecificos   <> '') {$s43 = 'Antigenos Especificos: '.$AntigenosEspecificosl.'<br>';}
        if ($Serologia  <> '') {$s44 = ' Serologia : '. $Serologia. '<br>';}
        if ($Otras <> '') {$s45 = ' Otras : '. $Otras .'<br>';}
        if ($EstudiosFisicoQuimicos <> '') {$s46 = 'EstudiosFisicoQuimicos : '.$EstudiosFisicoQuimicos .'<br>';}
        if ($ExamenSedimentoUrinario  <> '') {$s47 = 'Examen SedimentoUrinario : '.$ExamenSedimentoUrinario .'<br>';}
        if ($ExamenBacteriologico <> '') {$s48 = 'Examen Bacteriologico : '.$ExamenBacteriologico .'<br>';}
        if ($ExploracionesComplementariasdeImagen <> '') {$s49 = 'Exploraciones Complementarias de Imagen  : '. $ExploracionesComplementariasdeImagen . '<br>';}

        if ($RXsimpleAbdomen <> '') {$s50 = ' RX simple Abdomen : '. $RXsimpleAbdomen .'<br>';}
        if ($urografiaIntravenosa  <> '') {$s51 = 'Urografia Intravenosa  : '.$EstudiosFisicoQuimicos .'<br>';}
        if ($urografiaRetrograda <> '') {$s52 = 'Urografia Retrograda : '.$urografiaRetrograda.'<br>';}
        if ($ExamenBacteriologico <> '') {$s53 = 'Examen Bacteriologico : '.$ExamenBacteriologico .'<br>';}
        if ($TacRmn <> '') {$s54 = 'TacRmn : '. $TacRmn. '<br>';}
        if ($MetodosEndoscopicos <> '') {$s55 = ' Metodos Endoscopicos: '. $MetodosEndoscopicos .'<br>';}
      
$descripcion = 'DOLOR URÓLOGICO:<br> '.$s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.$s9.$s10.'<br> ALTERACIONES DE LA MICCIÓN Y DE LA EXCRESIÓN DE ORINA:<br> '.$s11.$s12.$s13.$s14.$s15.$s16.$s17.$s18.$s19.$s20.$s21.$s22.$s23.$s24.$s25.$s26.$s27.$s28.$s29.$s30.$s31.$s32.$s33.$s34.$s35.$s36.'<br>EXPLORACIÓN GENERAL COMPLETA:<br>'.$s37.$s38.$s39.$s40.$s41.'<br>EXPLORACIONES COMPLEMENTARIAS EN UROLOGÍA:<br>'.$s42.$s43.$s44.$s45.$s46.$s47.$s48.$s49.$s50.$s51.$s52.$s53.$s54.$s55;  
      

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));



mysqli_query($conn3,"INSERT INTO historiaClinica_urologia 
(cliente_id, Usuario_id, Fecha,   detalle) VALUES 
('$idCliente','$idUsuario', '$fechaHora', '$descripcion');");


echo "INSERT INTO historiaClinica_urologia 
(cliente_id, Usuario_id, Fecha,   detalle) VALUES 
('$idCliente','$idUsuario', '$fechaHora', '$descripcion');";



          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from historiaClinica_urologia where cliente_id = $idCliente");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   






    echo "<script language='Javascript'> window.location='finalizarClinica18_urologia.php?historiaClinica1=$historiaClinica1';</script>"; 

?>
