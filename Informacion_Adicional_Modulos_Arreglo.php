<?php

$Tablas_Base_Datos = array(	
    "H_Entidades" => array(
		"Nombre de la entidad" => array(
            "Campo" => "nombre",
            "Tipo"  => "text",
            "Valor" => "",
            "Filtro"=> "maxlength='120' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);' required"
        ),
        "Descripcion" => array(
            "Campo" => "descripcion",
            "Tipo"  => "textarea",
            "Valor" => "",
            "Filtro"=> ""
        )
	),
    "H_Entidades_Titulo" => "Entidades",
    "H_Entidades_id" => "id",

    ////////////////////////////////////

    'H_Equipos' => array(
        "Nombre del Equipo" => array(
            "Campo" => "nombre",
            "Tipo"  => "text",
            "Valor" => "",
            "Filtro"=> "maxlength='120' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);' required"
        ),
        "Fecha de Calibracion" => array(
            "Campo" => "fecha_c",
            "Tipo"  => "date",
            "Valor" => "",
            "Filtro"=> "required"
        ),
        "Notas" => array(
            "Campo" => "notas",
            "Tipo"  => "textarea",
            "Valor" => "",
            "Filtro"=> ""
        )
    ),
        "H_Equipos_Titulo" => "Equipos",
        "H_Equipos_id" => "id",
	
        ////////////////////////////////////
    
    'cups' => array(
        "Codigo" => array(
            "Campo" => "codigo",
            "Tipo"  => "select",
            "Valor" => "",
            "Filtro"=> "onchange=\"Select(codigo,'cups','id','codigo,descripcion')\""
        ),
        "Nivel" => array(
            "Campo" => "nivel",
            "Tipo"  => "number",
            "Valor" => "",
            "Filtro"=> "required"
        )
    ),
        "cups_Titulo" => "CUPS",
        "cups_id" => "id",




        "scategoria" => array(
        "Descripcion" => array(
            "Campo" => "descripcion",
            "Tipo"  => "text",
            "Valor" => "",
            "Filtro"=> "maxlength='79' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);' required"
        ),
        "Nota" => array(
            "Campo" => "nota",
            "Tipo"  => "textarea",
            "Valor" => "",
            "Filtro"=> ""
        )
    ),
    "scategoria_Titulo" => "Departamentos",
    "scategoria_id" => "id",
    

);
// la tabla deben tener estos campos para que funcione id,usuario_id,Activo
//id -> llave primaria
//usuario_id -> el usuario del sistema que se le va a consultar
//Activo -> campo que maneja si es visible o no 1:si 0:no
?>
