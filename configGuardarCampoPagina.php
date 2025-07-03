<?php
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';
   
  include 'configFunciones.php';
 
        


        $ID                    = $_POST['ID'];          
        $clienteId            = $_POST['clienteId'];          
     
        $fecha                = date("Y-m-d");
        
        $hora                  = date("H:i:s");

 
  
        $div_class=reem($_POST['div_class']);
        $div_nombre_campo=reem($_POST['div_nombre_campo']);
        $div_nombre_campo2=reemConfig($_POST['div_nombre_campo']);
        $input_maxlength=reem($_POST['input_maxlength']);
        $input_required=reem($_POST['input_required']);
     
        $idTablas=reem($_POST['idTablas']);
        $Nombre_table=reem($_POST['Nombre_table']);
        $input_type=reem($_POST['input_type']);
        $tipo=reem($_POST['tipo']);
        $div_align=reem($_POST['div_align']);
        $input_calss=reem($_POST['input_calss']);
        $select_table=reem($_POST['select_table']);
       
 

   echo '------------------'.$Nombre_table;
   echo '------------------' ;




$input_name1 = reemConfig($div_nombre_campo2);
$input_name = strtolower($input_name1);
$input_name = 'x'.$input_name;
$input_name = substr($input_name, 0,10);
$input_name = $input_name.rand(100,1000);

echo '@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>';
echo $input_name;
echo '@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@<br>';





$idCampoVerificar = 0;

                 $queryDetalle=mysqli_query($conn3,"SELECT * FROM  configTablaDetalle where name = $Nombre_name");
                  $nrowl=mysqli_num_rows($queryDetalle);
                  while($rowDetalle=mysqli_fetch_array($queryDetalle))
                  {
 
                    $idCampoVerificar  =$rowDetalle['id'];

}                    


if ($idCampoVerificar == 0) 

{	






   if ($tipo == 1) 
	{
$tipoCampo = $input_type;
$input_id = 0;
$input_pattern = 0;
$input_onChange  =0;
$select_table  = 0;
$style = 0;
$input_oninput = 0;
$div_nombre_valor = 0;
$input_value = 0;



	mysqli_query($conn3,"INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');");

echo "INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');<br><br><br>";

	mysqli_query($conn3,"ALTER TABLE $Nombre_table
	ADD COLUMN $input_name VARCHAR($input_maxlength) NULL");
echo "ALTER TABLE $Nombre_table
	ADD COLUMN $input_name VARCHAR($input_maxlength) NULL";
 
	echo '<br> ----------------------- >>>>> '.$Tabla; 

	echo "<script language='Javascript'> window.location='configFormulario.php?Nombre_table=$Nombre_table&Tabla=$idTablas';</script>";  

	}


   if ($tipo == 2) 
	{
$tipoCampo = $input_type;
$input_id = 0;
$input_pattern = 0;
$input_onChange  =0;
$select_table  = 0;
$style = 0;
$input_oninput = 0;
$div_nombre_valor = 0;
$input_value = 0;

	


	$input_name1 = reemConfig($div_nombre_campo);
$input_name = strtolower($input_name1);
$input_name = 'x'.$input_name;
$input_name = substr($input_name, 0,10);
$input_name = $input_name.rand(100,1000);


	mysqli_query($conn3,"INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');");

echo "INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');<br><br><br>";

	mysqli_query($conn3,"ALTER TABLE $Nombre_table
	ADD COLUMN $input_name int(12) NULL");
 
	echo '<br> ----------------------- >>>>> '.$Tabla; 

	  echo "<script language='Javascript'> window.location='configFormulario.php?Nombre_table=$Nombre_table&Tabla=$idTablas';</script>";  

	}




   if ($tipo == 3) 
	{
$tipoCampo = $input_type;
$input_id = 0;
$input_pattern = 0;
$input_onChange  =0;
$select_table  = 0;
$style = 0;
$input_oninput = 0;
$div_nombre_valor = 0;
$input_value = 0;

	

	$input_name1 = reemConfig($div_nombre_campo2);
$input_name = strtolower($input_name1);
$input_name = 'x'.$input_name;
$input_name = substr($input_name, 0,10);
$input_name = $input_name.rand(100,1000);


	mysqli_query($conn3,"INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', 'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');");

echo "INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');<br><br><br>";

	mysqli_query($conn3,"ALTER TABLE $Nombre_table
	ADD COLUMN $input_name text NULL");
 
	echo '<br> ----------------------- >>>>> '.$Tabla; 

	  echo "<script language='Javascript'> window.location='configFormulario.php?Nombre_table=$Nombre_table&Tabla=$idTablas';</script>";  

	}







   if ($tipo == 4) 
	{
$tipoCampo = $input_type;
$input_id = 0;
$input_pattern = 0;
$input_onChange  =0;
$select_table  = 0;
$style = 0;
$input_oninput = 0;
$div_nombre_valor = 0;
$input_value = 0;

	

//$input_name = substr($input_name, 1, 7);
//$input_name = $input_name.rand(1,999);


$input_name1 = reemConfig($div_nombre_campo);
$input_name = strtolower($input_name1);
$input_name = 'x'.$input_name;
$input_name = substr($input_name, 0,10);
$input_name = $input_name.rand(100,1000);

	mysqli_query($conn3,"INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', 'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');");

echo "INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');<br><br><br>";

	mysqli_query($conn3,"ALTER TABLE $Nombre_table
	ADD COLUMN $input_name varchar(5) NULL");
 
	echo '<br> ----------------------- >>>>> '.$Tabla; 

	  echo "<script language='Javascript'> window.location='configFormulario.php?Nombre_table=$Nombre_table&Tabla=$idTablas';</script>";  

	}






   if ($tipo == 5) 
	{
$tipoCampo = $input_type;
$input_id = 0;
$input_pattern = 0;
$input_onChange  =0;
 
$style = 0;
$input_oninput = 0;
$div_nombre_valor = 0;
$input_value = 0;



	$input_name1 = reemConfig($div_nombre_campo);
$input_name = strtolower($input_name1);
$input_name = 'x'.$input_name;
$input_name = substr($input_name, 0,10);
$input_name = $input_name.rand(100,1000);


	mysqli_query($conn3,"INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', 'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');");

echo "INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');<br><br><br>";

	mysqli_query($conn3,"ALTER TABLE $Nombre_table
	ADD COLUMN $input_name varchar(120) NULL");
 
	echo '<br> ----------------------- >>>>> '.$Tabla; 

	  echo "<script language='Javascript'> window.location='configFormulario.php?Nombre_table=$Nombre_table&Tabla=$idTablas';</script>";  

	}






   if ($tipo == 7) 
	{
$tipoCampo = $input_type;
$input_id = 0;
$input_pattern = 0;
$input_onChange  =0;
 
$style = 0;
$input_oninput = 0;
$div_nombre_valor = 0;
$input_value = 0;



	$input_name1 = reemConfig($div_nombre_campo);
$input_name = strtolower($input_name1);
$input_name = 'x'.$input_name;
$input_name = substr($input_name, 0,10);
$input_name = $input_name.rand(100,1000);


	mysqli_query($conn3,"INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', 'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');");

echo "INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');<br><br><br>";

	 

	echo "<script language='Javascript'> window.location='configFormulario.php?Nombre_table=$Nombre_table&Tabla=$idTablas';</script>";  

	}
	






   if ($tipo == 8) 
	{
$tipoCampo = $input_type;
$input_id = 0;
$input_pattern = 0;
$input_onChange  =0;
 
$style = 0;
$input_oninput = 0;
$div_nombre_valor = 0;
$input_value = 0;




	$input_name1 = reemConfig($div_nombre_campo);
$input_name = strtolower($input_name1);
$input_name = 'x'.$input_name;
$input_name = substr($input_name, 0,10);
$input_name = $input_name.rand(100,1000);

$uri = $_SERVER['REQUEST_URI']; 
$exploded_uri = explode('/', $uri); 
$domain_name = $exploded_uri[1];
$currentPath = $_SERVER['PHP_SELF']; 
$pathInfo = pathinfo($currentPath); 
$hostName = $_SERVER['HTTP_HOST']; 
$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'https';
$urlBase = $protocol.'://'.$hostName."/".$domain_name;


$fileTmpPath = $_FILES['div_nombre_campo']['tmp_name'];
$fileName = $_FILES['div_nombre_campo']['name'];
$fileSize = $_FILES['div_nombre_campo']['size'];
$fileType = $_FILES['div_nombre_campo']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$i = $idTablas.md5(uniqid()).$fileName;

$img = $urlBase.'/img/config/'.$i;

$uploadFileDir = 'img/config/';
$dest_path = $uploadFileDir . $i;

if(move_uploaded_file($fileTmpPath, $dest_path)) echo 'OK'; else echo 'Err';

mysqli_query($conn3,"INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value, img) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', 'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value', '$img');");

echo "INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value, img) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value', '$img');<br><br><br>";

	 

	  echo "<script language='Javascript'> window.location='configFormulario.php?Nombre_table=$Nombre_table&Tabla=$idTablas';</script>";  

	}







   if ($tipo == 9) 
	{
$tipoCampo = $input_type;
$input_id = 0;
$input_pattern = 0;
$input_onChange  =0;
 
$style = 0;
$input_oninput = 0;
$div_nombre_valor = 0;
$input_value = 0;

	


$input_name1 = reemConfig($div_nombre_campo);
$input_name = strtolower($input_name1);
$input_name = 'x'.$input_name;
$input_name = substr($input_name, 0,10);
$input_name = $input_name.rand(100,1000);
mysqli_query($conn3,"INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', 'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');");

echo "INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');<br><br><br>";

	 

	  echo "<script language='Javascript'> window.location='configFormulario.php?Nombre_table=$Nombre_table&Tabla=$idTablas';</script>";  

	}







   if ($tipo == 10) 
	{
$tipoCampo = $input_type;
$input_id = 0;
$input_pattern = 0;
$input_onChange  =0;
 
$style = 0;
$input_oninput = 0;
$div_nombre_valor = 0;
$input_value = 0;

	

	$input_name1 = reemConfig($div_nombre_campo);
$input_name = strtolower($input_name1);
$input_name = 'x'.$input_name;
$input_name = substr($input_name, 0,10);
$input_name = $input_name.rand(100,1000);

mysqli_query($conn3,"INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', 'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');");

echo "INSERT INTO configTablaDetalle (fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, input_name, input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value) VALUES 
	  	('$fecha', '$hora', '$idTablas', '$div_class', '$div_align', '$div_nombre_campo', '$input_type', '$input_calss', '$input_name', '$Nombre_name', '$input_id', '$input_required', '$input_pattern', '$input_onChange', '$select_table', '$style', '$tipoCampo', '$input_maxlength', '$input_oninput', '$div_nombre_valor', '$input_value');<br><br><br>";

	 

	  echo "<script language='Javascript'> window.location='configFormulario.php?Nombre_table=$Nombre_table&Tabla=$idTablas';</script>";  

	}
	}



?>