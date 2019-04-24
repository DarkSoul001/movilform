<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/menu.css">

    </head>
    <body >
        <?php
        // put your code here
        ?>
        <div id="global">
            <img src="../img/movilform-mlogo.png" style="float: right; width: 200px;">
            <div class="navbar">
                <div class="dropdown">
                    <button class="dropbtn">Cliente
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="registro_cliente.php">Registro</a>
                        <a href="modificar_cliente.php">Modificar</a>
                    </div>
                </div> 
                <div class="dropdown">
                    <button class="dropbtn">Contrato 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="registro_contrato.php">Registro</a>
                        <a href="modificar_contrato.php">Modificar</a>
                    </div>
                </div> 
                <a href="mapa.php">Mapa</a>
            </div>
        </div>
    </body>
</html>
