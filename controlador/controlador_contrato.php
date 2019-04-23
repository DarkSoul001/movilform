<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include 'conexion.php';

class controlador_contrato {

    private $cone;
    private $conex;

    public function controlador_contrato() {
        try {
            $con = new Conexion();
            $this->cone = $con;
            $this->conex = $con->ObtenerConexion();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function registrar_contrato($param) {
        try {
            $sql = "insert into contrato values('@1','@2','@3','@4','@5','@6','@7','@8','@9');";
            $sql = str_replace("@1", $param->getCodigo_contrato(), $sql);
            $sql = str_replace("@2", $param->getNombre_contrato(), $sql);
            $sql = str_replace("@3", $param->getDireccion_contrato(), $sql);
            $sql = str_replace("@4", $param->getLatitud(), $sql);
            $sql = str_replace("@5", $param->getLongitud(), $sql);
            $sql = str_replace("@6", $param->getNombre_contacto(), $sql);
            $sql = str_replace("@7", $param->getTelefono_contacto(), $sql);
            $sql = str_replace("@8", $param->getCorreo(), $sql);
            $sql = str_replace("@9", $param->getCliente(), $sql);
            return $this->cone->sqlOperaciones($sql);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
    public function traerDireciones(){
        try {
        $sql="select c.nombre_contrato, cl.razon_social, c.latitud_geografica_contrato,c.longitud_geografica_contrato from contrato c inner join cliente cl on cl.codigo_cliente=c.codigo_cliente;";    
        return $this->cone->sqlSelect($sql);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }

}
