##### 5- Utilice las herramientas para desarrollador del navegador y observe como fueron codificados por el navegador los datos enviados por el navegador en los dos ejercicios anteriores. ¿Que diferencia nota?

En ambos ejercicios se puede observar que los datos que se envian por el navegador, mirando los headers de respuesta, son del tipo text/html, text/css con codificación charset= UTF-8. La diferencia que se observa en el ejercicio 4 es con respecto a la imagen que es enviada la cual resulta del tipo image/png.<br>
![alt captura1](https://github.com/ZabalaMariano/PAW_TP2/blob/master/Punto5/captura1response.png)
![alt captura1](https://github.com/ZabalaMariano/PAW_TP2/blob/master/Punto5/captura2response.png)
![alt captura1](https://github.com/ZabalaMariano/PAW_TP2/blob/master/Punto5/captura3response.png)<br>
Por otro lado, los datos que se completan en el formulario en el punto 3 se envian mediante el metodo GET incluyendolos en la URL. Mientras que en el punto 4 se envian mediante el metodo POST y se puede visualizar un header de content-type con el siguiente valor: multipart/form-data; boundary=----WebkitFoBoundaryPpBFwkuViOlgVILY

![alt captura1](https://github.com/ZabalaMariano/PAW_TP2/blob/master/Punto5/capturarequest.png)
