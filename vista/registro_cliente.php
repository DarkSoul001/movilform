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
        <script type="text/javascript" src="../js/cliente.js"></script>
        <link rel="stylesheet" href="../css/cliente.css">
        <?php
        include 'index.php';
        // put your code here
        ?>
    </head>
    <body>
        <div id="r_cliente">
            <table>
                <tbody>
                    <tr>
                        <td><label>Codigo Cliente</label></td>
                        <td><input type="text" required="" id="codigo_cliente"  name="codigo_cliente" maxlength="10"  placeholder="Ej: 1111111111"/></td>
                    </tr>
                    <tr>
                        <td><label>Razón Social</label></td>
                        <td><input type="text" required="" id="razon_social" name="razon_social" value="" placeholder="Ingrese razón social"/></td>
                    </tr>
                    <tr>
                        <td><label>Nombre de Fantasía</label></td>
                        <td><input type="text" required="" id="nombre_fantasia" name="nombre_fantasia" placeholder="Ingrese nombre de fanatasía"/></td>
                    </tr>
                    <tr>
                        <td><label>Direccion Comercial</label></td>
                        <td><input type="text" required="" id="direccion_comercial" name="direccion_comercial" placeholder="Ingrese direccion comercial"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button id="registrar" type="submit" >Registrar Cliente</button>
                            <button id="limpiar" type="reset">Limpiar</button>
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>
    </body>
</html>
