<?php

$title = 'Consigna Punto 7';
$main_title = "Consigna punto 7 TP2";
$content = "<b>7. Construya la vista de ficha de turno. Dicha vista debe permitir acceder al turno y mostrar todos sus<br/>
datos, recuperados del mecanismo de persistencia elaborado en el punto anterior. ¿Cómo se identifica<br/>
y discrimina un turno de otro? Debe funcionar el link a la ficha que se encuentra en la tabla de turnos.<br/>
Recuerde agregar un enlace para volver a la tabla de turnos.</b><br/><br/>
Para diferenciar los turnos, se los almacena en un archivo JSON como un elemento de un array. De esta forma<br/>
cada turno tendrá un ID único igual a la posición que ocupan en el array.<br/><br/>
";



require 'views/about.view.php';
