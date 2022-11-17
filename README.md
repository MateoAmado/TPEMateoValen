# Consultas Basicas: 
>1) Si se quiere obtener todos los ejercicios debera colocar la url: (GET) api/ejercicios

```
>2) Si se quiere obtener solo un ejercicio respecto a su ID(numero) colocar esta url: (GET) api/ejercicios/:ID 
```


>3) Si se quiere `obtener` una paginacion de ejercicios entre 2 numeros colocar url: (GET) api/ejercicios/paginacion?primernum=:NUM1&segundonum=:NUM2.

En la variable :NUM1 iria el numero de id del ejercicio por el que se quiere comenzar a paginar
En la variable :NUM2 iria el numero de id del ultimo ejercicio que se quiera paginar.

Ejemplo de url, en el caso de querer paginar del ejercicio 5 al 10 = api/ejercicios/paginacion?primernum=5&segundonum=10.



4) Si se quiere agregar un ejercicio se espera del body uno o varios JSON y se agregan con la siguiente url: (POST) api/ejercicios

El formato para enviar deber ser el siguiente:

{
    "nombre_ej": "String",
    "musculo_id": Numero,
    "intensidad_ej": Numero,
    "seccion_ej": "String",
    "descripcion_ej": "String"
}
Tenga en cuenta que el "musculo_id" tiene que formar parte de la siguiente lista:
-Pecho->1
-Espalda->2
-Piernas->3
-Biceps->4
-Triceps->5
-Hombros->6


5) Si se quiere editar un ejercicio se espera del body solo un JSON y se edita con la siguiente url: (PUT) api/ejercicios/:ID

El formato para enviar deber ser el siguiente:
{
    "nombre_ej": "String",
    "musculo_id": Numero,
    "intensidad_ej": Numero,
    "seccion_ej": "String",
    "descripcion_ej": "String"
}
Tenga en cuenta que el "musculo_id" tiene que formar parte de la siguiente lista:
-Pecho->1
-Espalda->2
-Piernas->3
-Biceps->4
-Triceps->5
-Hombros->6


6) Si se quiere eliminar un ejercicio respecto a su ID(numero) colocar url: (DELETE) api/ejercicios/:ID


7) Si se quiere obtener ejercicios ordenados de manera ascendente o descente respecto a SOLO un campo colocar la url: (GET) api/ejercicios/ordenar/:CAMPO?order=:ORDER.

En la variable :CAMPO solo se pueden colocar estos campos: nombre, seccion, intensidad, musculo y descripcion.
En la variable :ORDER en el caso de que se quiera mostrar de manera ascendente puede o no colocar nada o colocar ASC, y si se quiere ordenar de manera descendente colocar DESC.

Ejemplo de url, si se quiere ordenar la lista por nombre de manera ascendente = api/ejercicios/ordenar/nombre?order=ASC. 



8) Si se quieren filtrar ejercicios de la coleccion entera respecto a un campo o varios y su respectivo filtro de busqueda colocar url:
(GET) api/ejercicios/filtro?campo1=(valor)&campo2=(valor)&campo3=(valor)&campo4=(valor).

Siendo nombre, seccion, musculo, intensidad los campos posibles para iterar(tener en cuenta que estos campos deben estar si o si escritos en minuscula), el orden es indistinto y pueden o no estar todos.
 El valor de estos campos debe respetar estos parametros, en nombre,seccion,musculo el valor seria un string ej(pecho, press, con mancuernas) y el valor de intensidad seria numerico ej.(1,2,3).

Ejemplo de url, si quisiera filtrar por todos los campos buscando ejercicios de nombre que comiencen con press, musculos de pecho, seccion de mancuernas y una intensidad de 2 == api/ejercicios/filtro?nombre=press&musculo=pecho&seccion=con mancuernas&intensidad=2.


9) Si se quiere conseguir un token para poder agregar, editar y eliminar ejercicios se debe llamar a estar url: (GET) api/auth/token.



