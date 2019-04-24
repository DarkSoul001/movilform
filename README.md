# movilform
proyecto realizado con netbeans
clonar o descargar el proyecto, en caso de descargarlo debera descomprimir el archio zip
mover la carpeta contodos sus archivos xammp/htdocs en caso de usar xammp
si se utiliza wampp mover la carpeta a www o la carpeta que hayan configurado para
ejecutar sus proyectos de xampp o wampp
para ocupar el archivo sql se debera generar una nueva base de datos ya sea en xammp o wampp con el nombre de movilform
y luego importar el archivo sql, en caso de ocupar otra base de datos en el archivo conexion.php ubicado en la
carpeta controlador debera cambiar el valor de la variable $base, en este archivo tambien se encuetran las variables 
de $ host, $user y $pass que se utilizan para establecer la conexion con mysql, las cuales tambien se pueden cambiar 
de ser necesario

en el registro de cliente en el codigo se pide ingresar un rut (rol unico tributario) sin puntos ni guioes,
el cual se verifica si es un rut valido ej 11.111.111-1
en el registro de contrato el codigo del contrato se ingresa manualmente 
despues de ingresar la direccion comercial del contrato hay que presionar el boton "coordenadas" el cual
ingresara las coordenadas en las cajas de texto de mas abajo con su respectivo nombre
en caso de que al presionar el boton "coordenadas" lance una alerta se aconseja incluir la comuna y la region
separada por comas (direccion,comuna,region)
