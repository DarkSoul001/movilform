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
        include '../controlador/controlador_cliente.php';
        ?>
    </head>
    <body>
        <div id="r_cliente">
            <table>
                <tbody>
                    <tr>
                        <td><label>Codigo Cliente</label></td>
                        <td>
                            <select id="codigo_cliente_n">
                                <?php
                                $cliente = new controlador_cliente();
                                $result = $cliente->traerCliente();
                                echo '<option value="0">Seleccione Cliente</option>';
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                                }
                                ?>
                            </select>
                            <button id="buscar_cliente">Buscar</button>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Razón Social</label></td>
                        <td><input type="text" required="" id="razon_social_n" name="razon_social" value="" placeholder="Ingrese razón social"/></td>
                    </tr>
                    <tr>
                        <td><label>Nombre de Fantasía</label></td>
                        <td><input type="text" required="" id="nombre_fantasia_n" name="nombre_fantasia" placeholder="Ingrese nombre de fanatasía"/></td>
                    </tr>
                    <tr>
                        <td><label>Direccion Comercial</label></td>
                        <td><input type="text" required="" id="direccion_comercial_n" name="direccion_comercial" placeholder="Ingrese direccion comercial"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button id="modificar_cliente" type="submit" >Modificar Cliente</button>
                            <button id="limpiar" type="reset">Limpiar</button>
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>
    </body>
</html>
