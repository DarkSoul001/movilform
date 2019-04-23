/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(() => {
    var num = 1;
    $("#addCorreo").click(() => {
        num++;
        var id = "div" + num;

        $("#form_table").append('<tr id="' + id + '"><td><label>Correo contacto</label></td><td><input type="text" id="correo_' + num + '"/></td></tr>');
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
        var envio="registrar_contrato";
        for (var i = 1; i <= num; ) {
            if (document.getElementById("correo_" + i).value != "") {
                correo = correo + "/" + document.getElementById("correo_" + i).value;
            }
            i++;
        }
        $.ajax({
           type:'POST',
           data:{envio:envio,cliente:cliente,codigo_contrato:codigo_contrato,nombre_contrato:nombre_contrato,
               direccion_contrato:direccion_contrato,latitud:latitud,longitud:longitud,
               nombre_contacto:nombre_contacto,telefono_contacto:telefono_contacto,correo:correo},
           url:"../controlador/contrato.php",
           success: function(result){
               alert(result);
           }
        });
    });

});



