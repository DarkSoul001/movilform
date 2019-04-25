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
        <link rel="stylesheet" type="text/css" href="../css/contrato.css">
        <script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
        <?php
        include 'index.php';
        include '../controlador/controlador_cliente.php';
        $controlador=new controlador_cliente();
        ?>
        <script>
            var geocoder;
            var map;
            function initialize() {
                geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(-34.397, 150.644);
                var mapOptions = {
                    zoom: 8,
                    center: latlng
                }
                map = new google.maps.Map(document.getElementById('map'), mapOptions);
            }

            function codeAddress() {
                var address = document.getElementById('address').value;
                geocoder.geocode({'address': address}, function (results, status) {
                    if (status == 'OK') {
                        map.setCenter(results[0].geometry.location);
                        var la = results[0].geometry.location.lat();
                        var lo = results[0].geometry.location.lng();
                        document.getElementById("latitud").value = la;
                        document.getElementById("longitud").value = lo;
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        alert('Geocodificación no fue exitosa por la siguiente razón: ' + status);
                    }
                });
            }
        </script>
        <script type="text/javascript" src="../js/contrato.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7HYw89b0lpVAz_fCp1V3rCQvFFSqoLhA&callback=initMap"
        type="text/javascript"></script>
    </head>
    <body  onload="initialize()">


        <div id="r_contrato">
            <div id="center">
                <table id="form_table">
                    <tr>
                        <td><label>Codigo contrato</label></td>
                        <td>
                            <select id="codigo_contrato">
                                <?php
                                $res = $controlador->traerContratos();
                                echo '<option value="0">Seleccione Contrato</option>';
                                while ($row = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $row[0] . '">' .$row[0]." ". $row[1] . '</option>';
                                }
                                ?>
                            </select>
                            <button id="buscar_contrato">Buscar</button>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Nombre Contrato</label></td>
                        <td><input type="text" id="nombre_contrato"/></td>
                    </tr>
                    <tr>
                        <td><label>Direccion contrato</label></td>
                        <td><input id="address" type="text" value=""><input type="button" value="Coordenadas" onclick="codeAddress()"></td>
                    </tr>
                    <tr>
                        <td><label>Latitud geograica</label></td>
                        <td><input type="text" id="latitud" value=""/></td>
                    </tr>
                    <tr>
                        <td><label>Longitud geografica</label></td>
                        <td><input type="text" id="longitud"/></td>
                    </tr>
                    <tr>
                        <td><label>Cliente</label></td>
                        <td>
                            <select id="cliente">
                                <?php
                                $result = $controlador->traerCliente();
                                echo '<option value="0">Seleccione CLiente</option>';
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Nombre contacto</label></td>
                        <td><input type="text" id="nombre_contacto"/></td>
                    </tr>
                    <tr>
                        <td><label>Telefono contacto</label></td>
                        <td><input type="text" id="telefono_contacto"/></td>
                    </tr>
                    <tr>
                        <td><label>Correo contacto</label></td>
                        <td><input type="email" id="correo_1"/><button id="addCorreo">Añadir Correo</button></td>
                    </tr>
                </table>
                <div><button id="modificar_contrato">Registrar Contrato</button>
                    <button id="limpiar">Limpiar</button></div>
                <div id="map" style="width: 320px; height: 480px; margin-left: 80px;margin-top: 20px"></div>
            </div>
        </div>
    </body>

</html>
