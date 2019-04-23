<?php
class conexion {

    private $server = "localhost";
    private $base = "movilform";
    private $user = "root";
    private $pass = "";
    private $cone;
    
    public function conexion(){
        try {
        $this->cone= new mysqli($this->server, $this->user, $this->pass, $this->base);    
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
    public function ObtenerConexion(){
        return $this->cone;
    }
    public function sqlOperaciones($sql){
        try {
        $resp= mysqli_query($this->cone, $sql);
        return mysqli_affected_rows($this->cone);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
    public function sqlSelect($sql){
        try {
        $reps= mysqli_query($this->cone, $sql);
        return $reps;
        } catch (Exception $ex) {
        echo $ex->getTraceAsString();    
        }
    }
}
