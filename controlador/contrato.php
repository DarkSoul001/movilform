<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include 'conexion.php';
include '../clases/contrato.php';
include 'controlador_contrato.php';
$envio = $_POST['envio'];
//inicializamos las clases de contrato y el controlador para realizar el registro
$contrato = new contrato();
$controlador = new controlador_contrato();
//registramos un nuevo contrato
if ($envio == "registrar_contrato") {
    //recojemos todas las variables que enviamos por post
    $codigo_contrato = $_POST['codigo_contrato'];
    $nombre_contrato = $_POST['nombre_contrato'];
    $direccion_contrato = $_POST['direccion_contrato'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $nombre_contacto = $_POST['nombre_contacto'];
    $telefono_contacto = $_POST['telefono_contacto'];
    $correo = $_POST['correo'];
    $cliente = $_POST['cliente'];
    //verificamos que todas las variables tengan datos
    if ($cliente != "" && $codigo_contrato != "" && $nombre_contrato != "" && $direccion_contrato != "" && $latitud != "" && $longitud != "" && $nombre_contacto != "" && $telefono_contacto != "" && $correo != "") {

        //le pasamos los datos de las variables a la clase
        $contrato->setCodigo_contrato($codigo_contrato);
        $contrato->setNombre_contrato($nombre_contrato);
        $contrato->setDireccion_contrato($direccion_contrato);
        $contrato->setLatitud($latitud);
        $contrato->setLongitud($longitud);
        $contrato->setNombre_contacto($nombre_contacto);
        $contrato->setTelefono_contacto($telefono_contacto);
        $contrato->setCorreo($correo);
        $contrato->setCliente($cliente);
        //llamamos al metodo que hace el registro en el controlador y le pasamos la clase contrato
        $resp = $controlador->registrar_contrato($contrato);
        //evaluamos la respuesta dada por el metodo y enviamos un mensaje a la pagina
        if ($resp == 1) {
            $respuesta = "Datos guardados";
        } else {
            $respuesta = "Error al guardar datos";
        }
    } else {
        $respuesta = "Faltan datos";
    }
    echo ($respuesta);
}
if ($envio == "direccion") {
    $controlador = new controlador_contrato();
    $reps = $controlador->traerDireciones();
    $res = array();
    while ($row = $reps->fetch_assoc()) {
        $res[] = $row;
    }
    echo json_encode($res);
}
if ($envio=="buscar_contrato") {
    $codigo=$_POST['codigo'];
    if ($codigo!='0') {
        $resp=$controlador->SelectContrato($codigo);
        $arreglo=array();
        while ($row = $resp->fetch_assoc()) {
            $arreglo[]=$row;
        }
        echo json_encode($arreglo);
    }else{
        echo 'Debe seleccionar un contrato';
    }
}
if ($envio == "modificar_contrato") {
    //recojemos todas las variables que enviamos por post
    $codigo_contrato = $_POST['codigo_contrato'];
    $nombre_contrato = $_POST['nombre_contrato'];
    $direccion_contrato = $_POST['direccion_contrato'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $nombre_contacto = $_POST['nombre_contacto'];
    $telefono_contacto = $_POST['telefono_contacto'];
    $correo = $_POST['correo'];
    $cliente = $_POST['cliente'];
    //verificamos que todas las variables tengan datos
    if ($cliente != "" && $codigo_contrato != "" && $nombre_contrato != "" && $direccion_contrato != "" && $latitud != "" && $longitud != "" && $nombre_contacto != "" && $telefono_contacto != "" && $correo != "") {

        //le pasamos los datos de las variables a la clase
        $contrato->setCodigo_contrato($codigo_contrato);
        $contrato->setNombre_contrato($nombre_contrato);
        $contrato->setDireccion_contrato($direccion_contrato);
        $contrato->setLatitud($latitud);
        $contrato->setLongitud($longitud);
        $contrato->setNombre_contacto($nombre_contacto);
        $contrato->setTelefono_contacto($telefono_contacto);
        $contrato->setCorreo($correo);
        $contrato->setCliente($cliente);
        //llamamos al metodo que hace el registro en el controlador y le pasamos la clase contrato
        $resp = $controlador->modificarContrato($contrato);
        //evaluamos la respuesta dada por el metodo y enviamos un mensaje a la pagina
        if ($resp == 1) {
            $respuesta = "Datos guardados";
        } else {
            $respuesta = "Error al guardar datos";
        }
    } else {
        $respuesta = "Faltan datos";
    }
    echo ($respuesta);
}
