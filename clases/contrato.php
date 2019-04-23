<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contrato
 *
 * @author Dark
 */
class contrato {
    //put your code here
    private $codigo_contrato;
    private $nombre_contrato;
    private $direccion_contrato;
    private $latitud;
    private $longitud;
    private $nombre_contacto;
    private $telefono_contacto;
    private $correo;
    private $cliente;
    function __construct() {
        
    }
    function getCodigo_contrato() {
        return $this->codigo_contrato;
    }

    function getNombre_contrato() {
        return $this->nombre_contrato;
    }

    function getDireccion_contrato() {
        return $this->direccion_contrato;
    }

    function getLatitud() {
        return $this->latitud;
    }

    function getLongitud() {
        return $this->longitud;
    }

    function getNombre_contacto() {
        return $this->nombre_contacto;
    }

    function getTelefono_contacto() {
        return $this->telefono_contacto;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getCliente() {
        return $this->cliente;
    }

    function setCodigo_contrato($codigo_contrato) {
        $this->codigo_contrato = $codigo_contrato;
    }

    function setNombre_contrato($nombre_contrato) {
        $this->nombre_contrato = $nombre_contrato;
    }

    function setDireccion_contrato($direccion_contrato) {
        $this->direccion_contrato = $direccion_contrato;
    }

    function setLatitud($latitud) {
        $this->latitud = $latitud;
    }

    function setLongitud($longitud) {
        $this->longitud = $longitud;
    }

    function setNombre_contacto($nombre_contacto) {
        $this->nombre_contacto = $nombre_contacto;
    }

    function setTelefono_contacto($telefono_contacto) {
        $this->telefono_contacto = $telefono_contacto;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }



}
