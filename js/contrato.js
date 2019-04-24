/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(() => {
    var num = 1;
    $("#addCorreo").click(() => {
        num++;
        //esto es para que en el registro se añada la opcion de escribir o añadir un correo de contacto
        $("#form_table").append('<tr><td><label>Correo contacto</label></td><td><input type="text" id="correo_' + num + '"/></td></tr>');
    });
    $("#registrar_contrato").click(() => {
        //recuperamos todos los valores ingresados por el usuario y los almacenamos en distintas variables
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
        //con el siguiente ciclo recuperamos todos los que el usuario haya agregado
        for (var i = 1; i <= num; ) {
            //comprobamos que realmente tenga un correo escrito y luego lo agremamos a la varible de correo junto con un espacio al final que es un caracter no permitido en loscorreos
            if (document.getElementById("correo_" + i).value != "") {
                correo = correo + document.getElementById("correo_" + i).value + " ";
            }
            i++;
        }
        //enviamos todas las variables a traves de ajax
        $.ajax({
            type: 'POST',
            data: {envio: envio, cliente: cliente, codigo_contrato: codigo_contrato, nombre_contrato: nombre_contrato,
                direccion_contrato: direccion_contrato, latitud: latitud, longitud: longitud,
                nombre_contacto: nombre_contacto, telefono_contacto: telefono_contacto, correo: correo},
            url: "../controlador/contrato.php",
            success: function (result) {
                //mostramos el mensaje devuelto de la operacion de registro contrato
                alert(result);
            }
        });
    });
    $("#buscar_contrato").click(() => {
        //recuperamos el valor del codigo del contrato
        var codigo = document.getElementById("codigo_contrato").value;
        // creamos una variable para que el archivo php se ejecute la accion correcta
        var envio = "buscar_contrato";
        //enviamos los datos a traves de ajax
        $.ajax({
            type: 'POST',
            url: '../controlador/contrato.php',
            data: {envio: envio, codigo: codigo},
            success: function (result) {
                //recuperamos un objeto creado con json_encodey lo transformamos a json de javascript
                var obj = JSON.parse(result);
                console.log(obj);
                //los valores almacenados en las distintas posiciones se los entregamos a los input segun corresponda
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
                    //con el siguiente ciclo añadimos tantos input de correos como correos se tengan registrados en el contrato
                    for (var i = 1; i < separar_correo.length; i++) {
                        if (separar_correo[i] != "") {
                            var c = separar_correo[i];
                            numero++;
                            let nid = "correo_" + numero;
                            $("#form_table").append('<tr><td><label>Correo contacto</label></td><td><input type="text" value="' + c + '" id=' + nid + '/></td></tr>');
                        }
                    }
                });
            }
        });
    });
    $("#modificar_contrato").click(() => {
        // obtenemos el valor de todos los input
        var codigo_contrato = document.getElementById("codigo_contrato").value;
        var nombre_contrato = document.getElementById("nombre_contrato").value;
        var direccion_contrato = document.getElementById("address").value;
        var latitud = document.getElementById("latitud").value;
        var longitud = document.getElementById("longitud").value;
        var nombre_contacto = document.getElementById("nombre_contacto").value;
        var telefono_contacto = document.getElementById("telefono_contacto").value;
        var cliente = document.getElementById("cliente").value;
        var correo = "";
        // creamos una variable para que el archivo php se ejecute la accion correcta
        var envio = "modificar_contrato";
        //con el siguiente ciclo recuperamos todos los que el usuario haya agregado
        for (var i = 1; i <= num; ) {
            if (document.getElementById("correo_" + i).value != "") {
                correo = correo + document.getElementById("correo_" + i).value + " ";
            }
            i++;
        }
        //enviamos los datos a traves de ajax
        $.ajax({
            type: 'POST',
            data: {envio: envio, cliente: cliente, codigo_contrato: codigo_contrato, nombre_contrato: nombre_contrato,
                direccion_contrato: direccion_contrato, latitud: latitud, longitud: longitud,
                nombre_contacto: nombre_contacto, telefono_contacto: telefono_contacto, correo: correo},
            url: "../controlador/contrato.php",
            success: function (result) {
                //mostramos el mensaje devuelto de la operacion de modificar contrato
                alert(result);
            }
        });
    });

});



