/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(() => {
    var num = 1;
    $("#addCorreo").click(() => {
        num++;

        $("#form_table").append('<tr><td><label>Correo contacto</label></td><td><input type="text" id="correo_' + num + '"/></td></tr>');
    });
    $("#registrar_contrato").click(() => {
        var codigo_contrato = document.getElementById("codigo_contrato").value;
        var nombre_contrato = document.getElementById("nombre_contrato").value;
        var direccion_contrato = document.getElementById("address").value;
        var latitud = document.getElementById("latitud").value;
        var longitud = document.getElementById("longitud").value;
        var nombre_contacto = document.getElementById("nombre_contacto").value;
        var telefono_contacto = document.getElementById("telefono_contacto").value;
        var cliente = document.getElementById("cliente").value;
        var correo = "";
        var envio = "registrar_contrato";
        for (var i = 1; i <= num; ) {
            if (document.getElementById("correo_" + i).value != "") {
                correo = correo + document.getElementById("correo_" + i).value + " ";
            }
            i++;
        }
        $.ajax({
            type: 'POST',
            data: {envio: envio, cliente: cliente, codigo_contrato: codigo_contrato, nombre_contrato: nombre_contrato,
                direccion_contrato: direccion_contrato, latitud: latitud, longitud: longitud,
                nombre_contacto: nombre_contacto, telefono_contacto: telefono_contacto, correo: correo},
            url: "../controlador/contrato.php",
            success: function (result) {
                alert(result);
            }
        });
    });
    $("#buscar_contrato").click(() => {
        var codigo = document.getElementById("codigo_contrato").value;
        var envio = "buscar_contrato";
        $.ajax({
            type: 'POST',
            url: '../controlador/contrato.php',
            data: {envio: envio, codigo: codigo},
            success: function (result) {
                var obj = JSON.parse(result);
                console.log(obj);
                $.each(obj, function (key, val) {
                    document.getElementById("nombre_contrato").value = val.nombre_contrato;
                    document.getElementById("address").value = val.direccion_contrato;
                    document.getElementById("latitud").value = val.latitud_geografica_contrato;
                    document.getElementById("longitud").value = val.longitud_geografica_contrato;
                    document.getElementById("cliente").value = val.codigo_cliente;
                    document.getElementById("nombre_contacto").value = val.nombre_contacto_contrato;
                    document.getElementById("telefono_contacto").value = val.telefono_contacto_contrato;
                    var correo = val.email_contacto_contrato;
                    var separar_correo = correo.split(" ");
                    document.getElementById("correo_1").value = separar_correo[0];
                    let numero = 1;
                    for (var i = 1; i < separar_correo.length; i++) {
                        if (separar_correo[i] != "") {
                            var c=separar_correo[i];
                            numero++;
                            let nid = "correo_" + numero;
                            $("#form_table").append('<tr><td><label>Correo contacto</label></td><td><input type="text" value="'+c+'" id=' + nid + '/></td></tr>');
                        }
                    }
                });
            }
        });
    });
    $("#modificar_contrato").click(() => {
        var codigo_contrato = document.getElementById("codigo_contrato").value;
        var nombre_contrato = document.getElementById("nombre_contrato").value;
        var direccion_contrato = document.getElementById("address").value;
        var latitud = document.getElementById("latitud").value;
        var longitud = document.getElementById("longitud").value;
        var nombre_contacto = document.getElementById("nombre_contacto").value;
        var telefono_contacto = document.getElementById("telefono_contacto").value;
        var cliente = document.getElementById("cliente").value;
        var correo = "";
        var envio = "modificar_contrato";
        for (var i = 1; i <= num; ) {
            if (document.getElementById("correo_" + i).value != "") {
                correo = correo + document.getElementById("correo_" + i).value + " ";
            }
            i++;
        }
        $.ajax({
            type: 'POST',
            data: {envio: envio, cliente: cliente, codigo_contrato: codigo_contrato, nombre_contrato: nombre_contrato,
                direccion_contrato: direccion_contrato, latitud: latitud, longitud: longitud,
                nombre_contacto: nombre_contacto, telefono_contacto: telefono_contacto, correo: correo},
            url: "../controlador/contrato.php",
            success: function (result) {
                alert(result);
            }
        });
    });

});



