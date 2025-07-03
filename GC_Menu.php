<?php
    $usuario_graficas =  $_SESSION['ID'];
    $queryMenu=mysqli_query($conn3,"SELECT Grafica_OMS,Grafica_CDC,Grafica_SD from usuarios where id=$usuario_graficas limit 1");
    $nrowMenu = mysqli_num_rows($queryMenu);
    while($rowMenu=mysqli_fetch_array($queryMenu))
    {
        $Grafica_OMS=$rowMenu['Grafica_OMS'];
        $Grafica_CDC=$rowMenu['Grafica_CDC'];
        $Grafica_SD=$rowMenu['Grafica_SD'];

        if($Grafica_OMS=="1")
        {
            $Opciones_Menu_Graficas.="<li><a href='{$Base}GC_PacientesGraficas.php?Tipo=OMS'><span class='fa-solid fa-chart-area'></span><label> Graficas OMS </label></a></li>";
        }
        if($Grafica_CDC=="1")
        {
            $Opciones_Menu_Graficas.="<li><a href='{$Base}GC_PacientesGraficas.php?Tipo=CDC'><span class='fa-solid fa-chart-area'></span><label> Graficas CDC </label></a></li>";
        }
        if($Grafica_SD=="1")
        {
            $Opciones_Menu_Graficas.="<li><a href='{$Base}GC_PacientesGraficas.php?Tipo=SD'><span class='fa-solid fa-chart-area'></span><label> Graficas Síndrome de Down </label></a></li>";
        }           
    }

    if($nrowMenu<>"0")
    {
        echo "<li>
            <a><i class='fa-solid fa-chart-area'></i><label> Graficas de Crecimiento </label></a>
            <ul class='nav-flyout'>";
        echo "<li><span class='fa-solid fa-chart-area' style='padding-left: 60px;padding-top: 20px;display: inline-block;'> </span><label style='padding-left: 10px;'> Graficas </label></li>";
        echo $Opciones_Menu_Graficas;
        echo "</ul>
            </li>";
    }
?>