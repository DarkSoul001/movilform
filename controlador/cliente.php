<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';
include '../clases/cliente.php';
include 'controlador_cliente.php';
$envio = $_POST['envio'];
if ($envio == 'registrar_cliente') {
    $razon = ($_POST['razon']);
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $codigo = $_POST['codigo'];
    if ($razon != "" && $nombre != "" && $direccion != "" && $codigo != "") {
        $controlador = new controlador_cliente();
        $cliente = new cliente();
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
    }
} else {
    $resp = "faltan datos";
}
echo $resp;



