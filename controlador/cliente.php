<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include 'conexion.php';
include '../clases/cliente.php';
include 'controlador_cliente.php';
$envio = $_POST['envio'];
$controlador = new controlador_cliente();
$cliente = new cliente();
if ($envio == 'registrar_cliente') {
    $razon = ($_POST['razon']);
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $codigo = $_POST['codigo'];
    if ($razon != "" && $nombre != "" && $direccion != "" && $codigo != "") {
        $cliente->setCodigo_cliente($codigo);
        $cliente->setNombre_fantasia($nombre);
        $cliente->setRazon_social($razon);
        $cliente->setDireccion_comercial($direccion);
        $resp = $controlador->registrarCliente($cliente);
        if ($resp == 1) {
            $resp = "Datos guardados con exito";
        } else {
            $resp = "Error al guarda datos";
        }
    } else {
        $resp = "faltan datos";
    }
    echo ($resp);
}
if ($envio == "buscar_cliente") {
    $codigo = $_POST['codigo'];
    if ($codigo != 0) {
        $resultado = $controlador->seleccionarCliente($codigo);
        $arreglo=array();
        while ($row = mysqli_fetch_array($resultado)) {
            array_push($arreglo, $row[0]);
            array_push($arreglo, $row[1]);
            array_push($arreglo, $row[2]);
        }
        echo json_encode($arreglo);
    } else {
        echo "Debe seleccionnar un cliente";
    }
}
if ($envio == 'modificar_cliente') {
    $razon = ($_POST['razon']);
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $codigo = $_POST['codigo'];
    if ($razon != "" && $nombre != "" && $direccion != "" && $codigo != "") {
        $cliente->setCodigo_cliente($codigo);
        $cliente->setNombre_fantasia($nombre);
        $cliente->setRazon_social($razon);
        $cliente->setDireccion_comercial($direccion);
        $resp = $controlador->modificarCliente($cliente);
        if ($resp == 1) {
            $resp = "Datos modificados con exito";
        } else {
            $resp = "Error al modificar datos";
        }
    } else {
        $resp = "faltan datos";
    }
    echo ($resp);
}




