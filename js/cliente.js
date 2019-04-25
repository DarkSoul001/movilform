$(document).ready(function () {
    $("#codigo_cliente").blur(function () {
        //obtenemos el valor
        var valor = document.getElementById('codigo_cliente').value;
        //separamos el cuerpo del digito verificador
        var cuerpo = valor.slice(0, -1);
        // toUpperCase en caso de que el dijo sea K
        var dv = valor.slice(-1).toUpperCase();
        //por si no cumple con el largo minimo de un rut
        if (cuerpo.length < 7) {
            alert("RUT incompleto");
            document.getElementById("registrar").disabled = true;
            return false;
        }
        //calcular digito verificador
        var suma = 0;
        var multiplo = 2;
        for (i = 1; i <= cuerpo.length; i++) {
            let index = multiplo * valor.charAt(cuerpo.length - i);
            suma = suma + index;
            multiplo++;
            if (multiplo == 8) {
                multiplo = 2;
            }
        }
        //calcular digito en base modulo 11
        var dvEsperado = 11 - (suma % 11);
        //para casos especiales 0 y K
        dv = (dv == 'K') ? 10 : dv;
        dv = (dv == 0) ? 11 : dv;
        //validamos si el cuerpo del rut coincide con el digito verificador
        if (dvEsperado != dv) {
            alert("RUT incorrecto");
            document.getElementById("registrar").disabled = true;
            return false;
        } else {
            document.getElementById("registrar").disabled = false;
        }
    });
    $("#registrar").click(function () {
        // obtenemos el valor de todos los input
        var razon = document.getElementById("razon_social").value;
        var nombre = document.getElementById("nombre_fantasia").value;
        var direccion = document.getElementById("direccion_comercial").value;
        var codigo = document.getElementById("codigo_cliente").value;
        // creamos una variable para que el archivo php se ejecute la accion correcta
        var envio = "registrar_cliente";
        //enviamos los datos a traves de ajax
        $.ajax({
            type: 'POST',
            data: {envio: envio, razon: razon, nombre: nombre, direccion: direccion, codigo: codigo},
            url: "../controlador/cliente.php",
            success: function (result) {
                console.log(result);
            }
        });
    });
    $("#buscar_cliente").click(() => {
        //recuperamos el valor del codigo del cliente
        var codigo = document.getElementById("codigo_cliente_n").value;
        // creamos una variable para que el archivo php se ejecute la accion correcta
        var envio = "buscar_cliente";
        //enviamos los datos a traves de ajax
        $.ajax({
            type: 'POST',
            url: '../controlador/cliente.php',
            data: {envio: envio, codigo: codigo},
            success: function (result) {
                //recuperamos un objeto creado con json_encodey lo transformamos a json de javascript
                var obj = JSON.parse(result);
                //los valores almacenados en las distintas posiciones se los entregamos a los input segun corresponda
                document.getElementById("razon_social_n").value = obj[2];
                document.getElementById("nombre_fantasia_n").value = obj[1];
                document.getElementById("direccion_comercial_n").value = obj[0];
            }
        });
    })
    $("#modificar_cliente").click(function () {
        // obtenemos el valor de todos los input
        var razon = document.getElementById("razon_social_n").value;
        var nombre = document.getElementById("nombre_fantasia_n").value;
        var direccion = document.getElementById("direccion_comercial_n").value;
        var codigo = document.getElementById("codigo_cliente_n").value;
        // creamos una variable para que el archivo php se ejecute la accion correcta
        var envio = "modificar_cliente";
        //enviamos los datos a traves de ajax
        $.ajax({
            type: 'POST',
            data: {envio: envio, razon: razon, nombre: nombre, direccion: direccion, codigo: codigo},
            url: "../controlador/cliente.php",
            success: function (result) {
                console.log(result);
            }
        });
    });
    $("#limpiar").click(()=>{
        document.getElementById("razon_social").value="";
        document.getElementById("nombre_fantasia").value="";
        document.getElementById("direccion_comercial").value="";
        document.getElementById("codigo_cliente").value="";
    });
});