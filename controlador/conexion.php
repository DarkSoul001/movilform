<?php
class conexion {

    private $server = "localhost";
    private $base = "movilform";
    private $user = "root";
    private $pass = "";
    private $conexion;
    
    public function conexion(){
        try {
        $this->conexion= new mysqli($this->server, $this->user, $this->pass, $this->base);    
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
    public function ObtenerConexion(){
        return $this->conexion;
    }
    public function sqlOperaciones($sql){
        try {
        $resp= mysqli_query($this->conexion, $sql);
        return mysqli_affected_rows($this->conexion);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
    public function sqlSelect($sql){
        try {
        $reps= mysqli_query($this->conexion, $sql);
        return $reps;
        } catch (Exception $ex) {
        echo $ex->getTraceAsString();    
        }
    }
}
