<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';
class controlador_cliente {

    private $cone;
    private $conex;

    public function controlador_cliente() {
        try {
            $con = new conexion();
            $this->cone = $con;
            $this->conex = $con->ObtenerConexion();
        } catch (Exception $ex) {
            $ex->getTraceAsString();
        }
    }
    public function traerCliente(){
        try {
        $sql="select codigo_cliente, razon_social from cliente;";    
        return $this->cone->sqlSelect($sql);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
    public function registrarCliente($param){
        try {
        $sql="insert into cliente values('@1','@2','@3','@4');";
        $sql= str_replace("@1", $param->getCodigo_cliente(), $sql);
        $sql= str_replace("@2", $param->getRazon_social(), $sql);
        $sql= str_replace("@3", $param->getNombre_fantasia(), $sql);
        $sql= str_replace("@4", $param->getDireccion_comercial(), $sql);
        return $this->cone->sqlOperaciones($sql);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }

}
