<?php
 
 /*

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
$query = "SELECT doctor, fecha  FROM citas ";
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
  echo "<li>" . $row["doctor"] . $row["fecha"] . $row["year"] . "</li>";
}
//close the connection
mssql_close($dbhandle);
 

*/
 
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
$query = "SELECT idCitas,
doctor,
fecha,
nombre,
telefono,
correo,
motivoConsulta,
tipo 
FROM  citas  where  estado  = 1  order by fecha asc";

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
  echo "<li>" . $row["idCitas"] . $row["doctor"] . $row["fecha"] . "</li>";
}
//close the connection
mssql_close($dbhandle);
 

