<?php 

    $queryTablaObjetivos = mysqli_query($conn3, "SELECT * FROM objetivosTerapiaOcupacional WHERE ID_Historia_Ocupacional= '$idOcupacional' ");

    foreach ($queryTablaObjetivos as $tablaObjetivos) {
        $DC_IntegracionSensorial = $tablaObjetivos['DC_IntegracionSensorial'];
        $EIP_IntegracionSensorial = $tablaObjetivos['EIP_IntegracionSensorial'];
        $OBJ_IntegracionSensorial = $tablaObjetivos['OBJ_IntegracionSensorial'];
        $RES_IntegracionSensorial = $tablaObjetivos['RES_IntegracionSensorial'];
        $P_IntegracionSensorial = $tablaObjetivos['P_IntegracionSensorial'];
        $DC_PorcesamientoSensorial = $tablaObjetivos['DC_PorcesamientoSensorial'];
        $EIP_PorcesamientoSensorial = $tablaObjetivos['EIP_PorcesamientoSensorial'];
        $OBJ_PorcesamientoSensorial = $tablaObjetivos['OBJ_PorcesamientoSensorial'];
        $RES_PorcesamientoSensorial = $tablaObjetivos['RES_PorcesamientoSensorial'];
        $P_PorcesamientoSensorial = $tablaObjetivos['P_PorcesamientoSensorial'];
        $DC_DestrezasPerceptuales = $tablaObjetivos['DC_DestrezasPerceptuales'];
        $EIP_DestrezasPerceptuales = $tablaObjetivos['EIP_DestrezasPerceptuales'];
        $OBJ_DestrezasPerceptuales = $tablaObjetivos['OBJ_DestrezasPerceptuales'];
        $RES_DestrezasPerceptuales = $tablaObjetivos['RES_DestrezasPerceptuales'];
        $P_DestrezasPerceptuales = $tablaObjetivos['P_DestrezasPerceptuales'];
        $DC_ControlPostural = $tablaObjetivos['DC_ControlPostural'];
        $EIP_ControlPostural = $tablaObjetivos['EIP_ControlPostural'];
        $OBJ_ControlPostural = $tablaObjetivos['OBJ_ControlPostural'];
        $RES_ControlPostural = $tablaObjetivos['RES_ControlPostural'];
        $P_ControlPostural = $tablaObjetivos['P_ControlPostural'];
        $DC_ControlPostural2 = $tablaObjetivos['DC_ControlPostural2'];
        $EIP_ControlPostural2 = $tablaObjetivos['EIP_ControlPostural2'];
        $OBJ_ControlPostural2 = $tablaObjetivos['OBJ_ControlPostural2'];
        $RES_ControlPostural2 = $tablaObjetivos['RES_ControlPostural2'];
        $P_ControlPostural2 = $tablaObjetivos['P_ControlPostural2'];
        $DC_HabilidadesMotoras = $tablaObjetivos['DC_HabilidadesMotoras'];
        $EIP_HabilidadesMotoras = $tablaObjetivos['EIP_HabilidadesMotoras'];
        $OBJ_HabilidadesMotoras = $tablaObjetivos['OBJ_HabilidadesMotoras'];
        $RES_HabilidadesMotoras = $tablaObjetivos['RES_HabilidadesMotoras'];
        $P_HabilidadesMotoras = $tablaObjetivos['P_HabilidadesMotoras'];
        $DC_Bipedo = $tablaObjetivos['DC_Bipedo'];
        $EIP_Bipedo = $tablaObjetivos['EIP_Bipedo'];
        $OBJ_Bipedo = $tablaObjetivos['OBJ_Bipedo'];
        $RES_Bipedo = $tablaObjetivos['RES_Bipedo'];
        $P_Bipedo = $tablaObjetivos['P_Bipedo'];
        $DC_HabilidadesMotorasFinas = $tablaObjetivos['DC_HabilidadesMotorasFinas'];
        $EIP_HabilidadesMotorasFinas = $tablaObjetivos['EIP_HabilidadesMotorasFinas'];
        $OBJ_HabilidadesMotorasFinas = $tablaObjetivos['OBJ_HabilidadesMotorasFinas'];
        $RES_HabilidadesMotorasFinas = $tablaObjetivos['RES_HabilidadesMotorasFinas'];
        $P_HabilidadesMotorasFinas = $tablaObjetivos['P_HabilidadesMotorasFinas'];
        $DC_LateralidadCruce = $tablaObjetivos['DC_LateralidadCruce'];
        $EIP_LateralidadCruce = $tablaObjetivos['EIP_LateralidadCruce'];
        $OBJ_LateralidadCruce = $tablaObjetivos['OBJ_LateralidadCruce'];
        $RES_LateralidadCruce = $tablaObjetivos['RES_LateralidadCruce'];
        $P_LateralidadCruce = $tablaObjetivos['P_LateralidadCruce'];
        $DC_CoordinacionVisomotriz = $tablaObjetivos['DC_CoordinacionVisomotriz'];
        $EIP_CoordinacionVisomotriz = $tablaObjetivos['EIP_CoordinacionVisomotriz'];
        $OBJ_CoordinacionVisomotriz = $tablaObjetivos['OBJ_CoordinacionVisomotriz'];
        $RES_CoordinacionVisomotriz = $tablaObjetivos['RES_CoordinacionVisomotriz'];
        $P_CoordinacionVisomotriz = $tablaObjetivos['P_CoordinacionVisomotriz'];
        $DC_IntegracionBilateral = $tablaObjetivos['DC_IntegracionBilateral'];
        $EIP_IntegracionBilateral = $tablaObjetivos['EIP_IntegracionBilateral'];
        $OBJ_IntegracionBilateral = $tablaObjetivos['OBJ_IntegracionBilateral'];
        $RES_IntegracionBilateral = $tablaObjetivos['RES_IntegracionBilateral'];
        $P_IntegracionBilateral = $tablaObjetivos['P_IntegracionBilateral'];
        $DC_ToleraciaPT = $tablaObjetivos['DC_ToleraciaPT'];
        $EIP_ToleraciaPT = $tablaObjetivos['EIP_ToleraciaPT'];
        $OBJ_ToleraciaPT = $tablaObjetivos['OBJ_ToleraciaPT'];
        $RES_ToleraciaPT = $tablaObjetivos['RES_ToleraciaPT'];
        $P_ToleraciaPT = $tablaObjetivos['P_ToleraciaPT'];
        $DC_Praxias = $tablaObjetivos['DC_Praxias'];
        $EIP_Praxias = $tablaObjetivos['EIP_Praxias'];
        $OBJ_Praxias = $tablaObjetivos['OBJ_Praxias'];
        $RES_Praxias = $tablaObjetivos['RES_Praxias'];
        $P_Praxias = $tablaObjetivos['P_Praxias'];
        $DC_ComponenteCognitivo = $tablaObjetivos['DC_ComponenteCognitivo'];
        $EIP_ComponenteCognitivo = $tablaObjetivos['EIP_ComponenteCognitivo'];
        $OBJ_ComponenteCognitivo = $tablaObjetivos['OBJ_ComponenteCognitivo'];
        $RES_ComponenteCognitivo = $tablaObjetivos['RES_ComponenteCognitivo'];
        $P_ComponenteCognitivo = $tablaObjetivos['P_ComponenteCognitivo'];
        $DC_ComponentePsicosocial = $tablaObjetivos['DC_ComponentePsicosocial'];
        $EIP_ComponentePsicosocial = $tablaObjetivos['EIP_ComponentePsicosocial'];
        $OBJ_ComponentePsicosocial = $tablaObjetivos['OBJ_ComponentePsicosocial'];
        $RES_ComponentePsicosocial = $tablaObjetivos['RES_ComponentePsicosocial'];
        $P_ComponentePsicosocial = $tablaObjetivos['P_ComponentePsicosocial'];
    }




?>