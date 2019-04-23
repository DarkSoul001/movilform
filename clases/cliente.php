<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente
 *
 * @author Dark
 */
class cliente {
    //put your code here
    private $codigo_cliente;
    private $razon_social;
    private $nombre_fantasia;
    private $direccion_comercial;
    function __construct() {
        
    }
    function getCodigo_cliente() {
        return $this->codigo_cliente;
    }

    function getRazon_social() {
        return $this->razon_social;
    }

    function getNombre_fantasia() {
        return $this->nombre_fantasia;
    }

    function getDireccion_comercial() {
        return $this->direccion_comercial;
    }

    function setCodigo_cliente($codigo_cliente) {
        $this->codigo_cliente = $codigo_cliente;
    }

    function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }

    function setNombre_fantasia($nombre_fantasia) {
        $this->nombre_fantasia = $nombre_fantasia;
    }

    function setDireccion_comercial($direccion_comercial) {
        $this->direccion_comercial = $direccion_comercial;
    }



    
}
