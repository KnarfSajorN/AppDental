<?php
include 'funciones/conn3.php';

$valor = $_POST["valor"];

if($valor="text")
{
    echo "<div class='col-md-12'>
            <label>Ejemplo</label>
            <input type='text' class='form-control input-lg'>
          </div>";

    echo "<div class='col-md-12'><hr></div>";

    echo "<div class='col-md-3'>
                <label> Columnas </label>
                <select name='NuevoCampo[Columnas]' class='form-control select2' style='width: 100%;'>
                  <option value='1'> 1 columna </option>
                  <option value='2'> 2 columnas </option>
                  <option value='3'> 3 columnas </option>
                  <option value='4'> 4 columnas </option>
                  <option value='5'> 5 columnas </option>
                  <option value='6'> 6 columnas </option>
                  <option value='7'> 7 columnas </option>
                  <option value='8'> 8 columnas </option>
                  <option value='9'> 9 columnas </option>
                  <option value='10'> 10 columnas </option>
                  <option value='11'> 11 columnas </option>
                  <option value='12'> 12 columnas </option>
                </select>
            </div>";

    echo "<div class='col-md-3'>
            <label> Nombre del campo </label>
            <input type='text' class='form-control input-lg' name='NuevoCampo[Nombre_Campo]' maxlength='120'>
         </div>";


    echo "<div class='col-md-3'>
            <label> Maximo de Caracteres </label>
            <input type='number' class='form-control input-lg' name='NuevoCampo[Maximo_Caracteres]' maxlength='10'>
         </div>";

    echo "<div class='col-md-3'>
            <label> Campo Obligatorio </label>
            <select name='NuevoCampo[Campo_Obligatorio]' class='form-control select2' style='width: 100%;'>
                <option value='No'> No </option>
                <option value='Si'> Si </option>
            </select>
        </div>";

        echo "<center><button type='submit' class='btn btn-block btn-primary btn-md'><h2> <strong> G u a r d a r </strong> </h2></button></center>";

}

?>