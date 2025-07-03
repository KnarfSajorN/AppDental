<?php
    $queryMenu=mysqli_query($conn3,"SELECT * from PP_Plantillas_Principales where Activo = 1");
    $nrowMenu = mysqli_num_rows($queryMenu);
    while($rowMenu=mysqli_fetch_array($queryMenu))
    {
        $Nombre=$rowMenu['Nombre'];
        $id=$rowMenu['id'];
                
        $Opciones_Menu_Plantilla.="<li>
                                    <a href='{$Base}PP_PacientesPlantilla.php?Plantilla_General_id={$id}'><span class='icon-clipboard-task-list-ltr-20-filled'></span><label> {$Nombre} </label></a>
                                   </li>";
            
    }

    if($nrowMenu<>"0")
    {
        echo "<li>
                <a><span class='icon-i-certificate-paper-outline'></span><label> Plantillas / Documentos </label></a>
                <ul class=\"nav-flyout\">";
        echo "<li><span class='icon-i-certificate-paper-outline' style='padding-left: 60px;padding-top: 20px;display: inline-block;'></span><label> Plantillas </label></li>";
        echo $Opciones_Menu_Plantilla;
        echo "</ul>
            </li>";
    }
?>