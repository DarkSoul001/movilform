<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include 'conexion.php';
include '../clases/cliente.php';
include 'controlador_cliente.php';
//recuperamos el valor de una variable golbal
$envio = $_POST['envio'];
//inicializamos las clases que se ocuparan en el archivo
$controlador = new controlador_cliente();
$cliente = new cliente();
if ($envio == 'registrar_cliente') {
    //recuperamos todas las variables sobre registrar a un nuevo cliente
    $razon = ($_POST['razon']);
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $codigo = $_POST['codigo'];
    //verificamos que las variables no esten vacias
    if ($razon != "" && $nombre != "" && $direccion != "" && $codigo != "") {
        //le entregamos el valor de las variables a la clase cliente
        $cliente->setCodigo_cliente($codigo);
        $cliente->setNombre_fantasia($nombre);
        $cliente->setRazon_social($razon);
        $cliente->setDireccion_comercial($direccion);
        //llamamos al metodo que se utiliza para registrar un cliente y el pasamos una variable tipo clase cliente
        $resp = $controlador->registrarCliente($cliente);
        //comparamos el valor de la respuesta del metodo llamodo y devolvemos un mensaje a la pagina 
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
    //recuperamos todas las variables para buscar a un cliente
    $codigo = $_POST['codigo'];
    //verificamos que las variables no sea 0
    if ($codigo != 0) {
        //llamamos al metodo para buscar a un cliente y le entregamos la variable del codigo del cliente
        $resultado = $controlador->seleccionarCliente($codigo);
        $arreglo = array();
        //recorremos la consulta devuelto del metodo y lo agregamos valor por valor a un arreglo
        while ($row = mysqli_fetch_array($resultado)) {
            array_push($arreglo, $row[0]);
            array_push($arreglo, $row[1]);
            array_push($arreglo, $row[2]);
        }
        //enviamos el arreglo en formato json a la pagina
        echo json_encode($arreglo);
    } else {
        echo "Debe seleccionnar un cliente";
    }
}
if ($envio == 'modificar_cliente') {
    //recuperamos todas las variables sobre modificar a un cliente
    $razon = ($_POST['razon']);
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $codigo = $_POST['codigo'];
    //verificamos que las variables no esten vacias
    if ($razon != "" && $nombre != "" && $direccion != "" && $codigo != "") {
        //le entregamos el valor de las variables a la clase cliente
        $cliente->setCodigo_cliente($codigo);
        $cliente->setNombre_fantasia($nombre);
        $cliente->setRazon_social($razon);
        $cliente->setDireccion_comercial($direccion);
        //llamamos al metodo que se utiliza para modificar un cliente y el pasamos una variable tipo clase cliente
        $resp = $controlador->modificarCliente($cliente);
        //comparamos el valor de la respuesta del metodo llamodo y devolvemos un mensaje a la pagina 
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




