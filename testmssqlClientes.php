<?php
 
 

$myServer = "168.197.69.84:3006";
$myUser = "MedicSoft";
$myPass = "Medic2020**";


$myDB = "MedicalSoft";

//connection to the database
$dbhandle = mssql_connect($myServer, $myUser, $myPass)
  or die("Couldn't connect to SQL Server on $myServer");

//select a database to work with
$selected = mssql_select_db($myDB, $dbhandle)
  or die("Couldn't open database $myDB");

//declare the SQL statement that will query the database
$query = "SELECT cliente_id, nombre_cliente, celular_cliente  FROM cliente ";
//$query .= "";
//$query .= "WHERE idCitas='1'";
echo $query;
 
//execute the SQL query and return records
$result = mssql_query($query);

$numRows = mssql_num_rows($result);
echo "<h1>" . $numRows . " Row" . ($numRows == 1 ? "" : "s") . " Returned </h1>";

//display the results
while($row = mssql_fetch_array($result))
{
  echo "<li>" . $row["cliente_id"] . $row["nombre_cliente"] . $row["celular_cliente"] . "</li>";
}
//close the connection
mssql_close($dbhandle);
 

