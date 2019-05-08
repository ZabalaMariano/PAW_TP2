<?php

if(isset($_POST["Enviar"])){//Si apretamos el boton Enviar
    
    //Si la validacion del servidor falla, escribo los datos ingresados por el cliente 
    //para que estos no esten vacios.
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $talla = $_POST['talla'];
    $altura = $_POST['altura'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $pelo = $_POST['pelo'];
    $fechaTurno = $_POST['fechaTurno'];
    $turno = $_POST['turno'];

    $fallo=array();

    //Realizo las validaciones de los campos ingresados
    validarCamposObligatorios($nombre, $email, $telefono, $fechaNacimiento, $fechaTurno, $fallo);
    validarTelefono($telefono, $fallo);
    validarNombre($nombre, $fallo);
    validarEmail($email, $fallo);
    validarNumero($edad, $talla, $altura, $fallo);
    validarFechaNacimiento($fechaNacimiento, $fallo);
    validarFechaTurno($fechaTurno, $fallo);

    //Si no se ingresó color de pelo, no valido ya que no es campo obligatorio
    if ($pelo != "null"){
        validarPelo($pelo, $fallo);
    }
    
    //Si no se ingresó horario de turno, no valido ya que no es campo obligatorio
    if($turno != null){
        validarTurno($turno, $fallo);
    }
        

    if($fallo){
        require 'controllers/punto2-reload.php';//Fallo algun valor
    }else{
        require 'controllers/punto2.validado.php';//Todos los datos validos
    }
}

function validarCamposObligatorios($nombre, $email, $telefono, $fechaNacimiento, $fechaTurno, &$fallo){
    if(
        ($nombre == "") ||
        ($email == "") ||
        ($telefono == "") ||
        ($fechaNacimiento == "") ||
        ($fechaTurno == "") 
    ){
        array_push($fallo,"Falta completar campos obligatorios*");
    }
}

function validarTelefono($telefono, &$fallo){
    if (strlen($telefono)>13) {
        $fallo[] = 'Fallo el teléfono';
    }elseif (!preg_match("/^([0-9\+][0-9]+)$/",$telefono)) {
        $fallo[] = 'Fallo el teléfono';
    }
}

function validarNumero($edad, $talla, $altura, &$fallo){
    if($edad!=""){ //Si la edad es vacío, no valido ya que no es obligatorio
        if (!filter_var($edad, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1, "max_range"=>150))) && (filter_var($edad, FILTER_VALIDATE_INT) !== 0)) {
            array_push($fallo,"Fallo la edad ingresada");
        }
    }
    if($talla!=""){ //Si la talla es vacío, no valido ya que no es obligatorio
        if (!filter_var($talla, FILTER_VALIDATE_INT, array("options" => array("min_range"=>20, "max_range"=>45)))) {
            array_push($fallo,"Fallo la talla ingresada");
        }
    }
    if($altura != 0){ //Si la altura es 0, no valido ya que no es obligatorio (se toma 0 como vacío)
        if (!filter_var($altura, FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>250)))) {
            array_push($fallo,"Fallo la altura ingresada");
        }
    }
}

function validarEmail($email, &$fallo){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($fallo,"Fallo el email ingresado");
    }
}

function validarNombre($nombre, &$fallo){
    if(!preg_match("/^([a-zA-Z ]+)$/",$nombre)){
        array_push($fallo,"Fallo el nombre ingresado");
    }
}

function validarPelo($pelo, &$fallo){
    if(!
        (($pelo == "negro") ||
        ($pelo == "rubio") ||
        ($pelo == "castaño") ||
        ($pelo == "colorado") ||
        ($pelo == "gris") ||
        ($pelo == "noTienePelo") ||
        ($pelo == "otroColor"))
    ){
        array_push($fallo,"Fallo el color de pelo ingresado");
    }
}

function validarTurno($turno, &$fallo){
    if((!preg_match("/^(0[8-9]|1[0-6]):(00|15|30|45)$/",$turno)) &&
       (!preg_match("/^(17):(00)$/",$turno))){
        $fallo[] = 'Fallo el horario del turno';
    }
}

function validarFechaNacimiento($fechaNacimiento, &$fallo){
    if(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$_POST["fechaNacimiento"])){//Formato yyyy-mm-dd
        array_push($fallo,"Fallo la fecha de nacimiento ingresada");
    }else{//Si cumple el formato--> que sea menor o igual al dia de hoy
        $arrayFecha = explode("-", $fechaNacimiento);
        if($arrayFecha['0']>date("Y")){
            array_push($fallo,"Fallo la fecha de nacimiento ingresada");
        }elseif($arrayFecha['0']==date("Y")){
            if($arrayFecha['1']>date("m")){
                array_push($fallo,"Fallo la fecha de nacimiento ingresada");
            }elseif($arrayFecha['1']==date("m")){
                if($arrayFecha['2']>date("d")){
                    array_push($fallo,"Fallo la fecha de nacimiento ingresada");
                }
            }
        }
    }
}

function validarFechaTurno($fechaTurno, &$fallo){
    if(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$fechaTurno)){//Formato yyyy-mm-dd
        array_push($fallo,"Fallo la fecha del turno ingresada");
    }else{//Si cumple el formato--> que sea mayor o igual al dia de hoy
        $arrayFecha = explode("-", $fechaTurno);
        if($arrayFecha['0']<date("Y")){
            array_push($fallo,"Fallo la fecha del turno ingresado");
        }elseif($arrayFecha['0']==date("Y")){
            if($arrayFecha['1']<date("m")){
                array_push($fallo,"Fallo la fecha del turno ingresado");
            }elseif($arrayFecha['1']==date("m")){
                if($arrayFecha['2']<date("d")){
                    array_push($fallo,"Fallo la fecha del turno ingresado");
                }
            }
        }
    }
}
?>