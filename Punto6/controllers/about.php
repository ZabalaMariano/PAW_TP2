<?php

$title = 'Consigna Punto 6';
$main_title = "Consigna punto 6 TP2";
$content = "<b>6. Agregar persistencia al sistema de turnos. Todos los datos del formulario deben almacenarse<br/>
mediante algún mecanismo para poder ser recuperados posteriormente. Crear una nueva vista que le<br/>
permita a un empleado administrativo visualizar todos los turnos en una tabla. La tabla debe incluir los<br/>
siguientes campos:</b><br/><br/>
a. Fecha del turno<br/>
b. Hora del turno<br/>
c. Nombre del paciente<br/>
d. Teléfono<br/>
e. Email<br/>
f. Link a la ficha del turno (la ficha se implementa en el siguiente punto)<br/><br/>
Esta página y la del formulario del punto 2 deben contar con una barra de navegación que permita<br/>
ir a una u otra pantalla.<br/><br/>
Además, al procesar el formulario en el lado servidor, el sistema asigne un número de turno (que no<br/>
debe repetirse).<br/><br/>
Para generar el sistema de persistencia, se aconseja estudiar algún mecanismo de serialización de<br/>
datos.<br/><br/>
<b>¿Cómo relaciona la imagen del turno con los datos del turno? Comente alternativas que evaluó y<br/>
<<<<<<< Updated upstream
opción elegida.</b><br/>
=======
opción elegida.</b></br>
>>>>>>> Stashed changes
Para relacionar la imagen del turno con los datos del turno se almacenó en el archivo JSON el nombre de<br/>
la imagen, junto con el resto de los datos. Luego, como los nombres de las imagenes no se repiten en la<br/>
carpeta \"diagnosticos\", al recuperar los datos del turno buscamos en la carpeta antes mencionada<br/>
la única imagen con ese nombre.<br/><br/>";


require 'views/about.view.php';
