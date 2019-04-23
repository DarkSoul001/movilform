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
        <?php
        include 'index.php';
        ?>
        <script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript">
            var locations = [];
            $.ajax({
                type: 'POST',
                data: {envio: 'direccion'},
                url: '../controlador/contrato.php',
                success: function (result) {
                    var resultObj = JSON.parse(result);
                    console.log(resultObj);
                    $.each(resultObj, function (key, val) {
                        r = [val.nombre_contrato.toString(),val.razon_social.toString(), val.latitud_geografica_contrato.toString(), val.longitud_geografica_contrato.toString()];
                        locations.push(r);
                    });
                }
            });
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 10,
                    center: new google.maps.LatLng(-33.445879, -70.669952),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var infowindow = new google.maps.InfoWindow();
                var marker, i;
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][2], locations[i][3]),
                        map: map
                    });
                    
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i][0]+" "+locations[i][1]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }

        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7HYw89b0lpVAz_fCp1V3rCQvFFSqoLhA&callback=initMap"></script>
        <link rel="stylesheet" type="text/css" href="../css/mapa.css">

    </head>
    <body style="background: url(../img/fondo.jpg);background-repeat: no-repeat;background-size: auto">
        <div id="mapa">
        <div id="map" style="width: 500px; height: 400px; margin-left: 15%;margin-right: 15%"></div>
        <?php
        // put your code here
        ?>
        </div>
    </body>
</html>
