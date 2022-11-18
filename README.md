# Documentacion

## Coleccion Ejecicios: 
 * Obtener datos de la coleccion _(metodos GET)_:
    - 1. [GET ejercicios](#GET-ejercicios)
    - 2. [GET ejercicio](#GET-ejercicio)
    - 3. [GET ejercicios con paginación](#GET-ejercicios-con-paginacion)
    - 4. [GET ejercicios ordenados por campos](#GET-ejercicios-con-orden-por-columna)
    - 5. [GET ejercicios con filtros](#GET-ejercicio)
* Otros metodos _(POST, PUT, DELETE)_:
    - 6. [POST ejercicios](#POST-ejercicio)
    - 7. [PUT ejercicios](#PUT-ejercicio)
    - 8. [DELETE ejercicios](#DELETE-ejercicios-con-filtrado-de-columnas)
    
## Coleccion Musculos:
* Obtener datos de la coleccion _(metodos GET)_:
    - 1. [GET musculos](#GET-musculos)
    - 2. [GET musculo](#GET-musculo)
    - 3. [GET musculos con paginación](#GET-musculos-con-paginacion)
    - 4. [GET musculos ordenados por campos](#GET-musculos-con-orden-por-columna)
    - 5. [GET musculos con filtros](#GET-musculos-con-filtrado-de-columnas)
* Otros metodos _(POST, PUT, DELETE)_:
    - 6. [POST musculos](#POST-musculo)
    - 7. [PUT musculo](#PUT-musculo)
    - 8. [DELETE musculo](#DELETE-musculo)

## Ejecicios:
### GET ejercicios:
>1)  Si se quiere obtener todos los ejercicios debera colocar la url: (GET) api/ejercicios

### GET ejercicio:
>2) Si se quiere obtener solo un ejercicio respecto a su **ID** (numero) colocar esta url: (GET) api/ejercicios/**:ID**


### GET ejercicios con paginacion:
>3) Si se quiere obtener una paginacion de ejercicios entre 2 numeros colocar url: (GET) api/ejercicios/paginacion?primernum=**:NUM1**&segundonum=**:NUM2**.

En la variable :NUM1 iria el numero de id del ejercicio por el que se quiere comenzar a paginar
En la variable :NUM2 iria el numero de id del ultimo ejercicio que se quiera paginar.
Ejemplo de url, en el caso de querer paginar del ejercicio 5 al 10:
~~~
 api/ejercicios/paginacion?primernum=5&segundonum=10.
 ~~~
### GET ejercicios con orden por columna:
>4) Si se quiere obtener ejercicios ordenados de manera ascendente o descente respecto a SOLO un campo colocar la url: (GET) api/ejercicios/ordenar/**:CAMPO**?order=**:ORDER**.

En la variable **:CAMPO** solo se pueden colocar estos campos: nombre, seccion, intensidad, musculo y descripcion.
En la variable **:ORDER** en el caso de que se quiera mostrar de manera ascendente puede o no colocar nada o colocar ASC, y si se quiere ordenar de manera descendente colocar DESC.

Ejemplo de url, si se quiere ordenar la lista por nombre de manera ascendente: 
~~~
 api/ejercicios/ordenar/nombre?order=ASC. 
~~~
### GET ejercicios con filtrado de columnas:
>5) Si se quieren filtrar ejercicios de la coleccion entera respecto a un campo o varios y su respectivo filtro de busqueda colocar url:
(GET) api/ejercicios/filtro?**:CAMPO1**=(valor)&**:CAMPO2**=(valor)&**:CAMPO3**=(valor)&**:CAMPO4**=(valor).

Siendo nombre, seccion, musculo, intensidad los campos posibles para iterar(tener en cuenta que estos campos deben estar si o si escritos en minuscula), el orden es indistinto y pueden o no estar todos.
 El valor de estos campos debe respetar estos parametros, en nombre,seccion,musculo el valor seria un string ej(pecho, press, con mancuernas) y el valor de intensidad seria numerico ej.(1,2,3).

Ejemplo de url, si quisiera filtrar por todos los campos buscando ejercicios de nombre que comiencen con press, musculos de pecho, seccion de mancuernas y una intensidad de 2 seria:
~~~
api/ejercicios/filtro?nombre=press&musculo=pecho&seccion=con mancuernas&intensidad=2
~~~
### POST ejercicio/ejercicios:
>6) Si se quiere agregar un ejercicio se espera del body uno o varios JSON y se agregan con la siguiente url: (POST) api/ejercicios

El formato para enviar deber ser el siguiente:

~~~
{
    "nombre_ej": "String",
    "musculo_id": Numero,
    "intensidad_ej": Numero,
    "seccion_ej": "String",
    "descripcion_ej": "String"
}
~~~


Tenga en cuenta que el "musculo_id" tiene que formar parte de la siguiente lista:
* Pecho->1
* Espalda->2
* Piernas->3
* Biceps->4
* Triceps->5
* Hombros->6

### PUT ejercicio:
>7) Si se quiere editar un ejercicio se espera del body solo un JSON y se edita con la siguiente url: (PUT) api/ejercicios/**:ID**

El formato para enviar deber ser el siguiente:
~~~
{
    "nombre_ej": "String",
    "musculo_id": Numero,
    "intensidad_ej": Numero,
    "seccion_ej": "String",
    "descripcion_ej": "String"
}
~~~


Tenga en cuenta que el "musculo_id" tiene que formar parte de la siguiente lista:
* Pecho->1
* Espalda->2
* Piernas->3
* Biceps->4
* Triceps->5
* Hombros->6

### DELETE ejercicio:
>8) Si se quiere eliminar un ejercicio respecto a su **ID** (numero) colocar url: (DELETE) api/ejercicios/**:ID**.


----------------------------------------------------------------------------

## Musculos:
### GET musculos:
>1)  Si se quiere obtener todos los musculos debera colocar la url: (GET) api/musculos

### GET musculo:
>2) Si se quiere obtener solo un musculo respecto a su **ID** (numero) colocar esta url: (GET) api/musculos/**:ID**


### GET musculos con paginacion:
>3) Si se quiere obtener una paginacion de musculos entre 2 numeros colocar url: (GET) api/musculos/paginacion?primernum=**:NUM1**&segundonum=**:NUM2**.

En la variable :NUM1 iria el numero de id del musculo por el que se quiere comenzar a paginar
En la variable :NUM2 iria el numero de id del ultimo musculo que se quiera paginar.
Ejemplo de url, en el caso de querer paginar del ejercicio 5 al 10:
 ~~~
 api/musculos/paginacion?primernum=5&segundonum=10.
 ~~~
### GET musculos con orden por columna:
>4) Si se quiere obtener musculos ordenados de manera ascendente o descente respecto a SOLO un campo colocar la url: (GET) api/musculos/ordenar/**:CAMPO**?order=**:ORDER**.

En la variable **:CAMPO** solo se pueden colocar estos campos: id, nombre y division.
En la variable **:ORDER** en el caso de que se quiera mostrar de manera ascendente puede o no colocar nada o colocar ASC, y si se quiere ordenar de manera descendente colocar DESC.

Ejemplo de url, si se quiere ordenar la lista por nombre de manera ascendente: 
~~~
 api/musculos/ordenar/nombre?order=ASC. 
~~~
### GET musculos con filtrado de columnas:
>5) Si se quieren filtrar musculos de la coleccion entera respecto a un campo o varios y su respectivo filtro de busqueda colocar url:
(GET) api/musculos/filtro?**:CAMPO1**=(valor)&**:CAMPO2**=(valor).

Siendo nombre, division, los campos posibles para iterar(tener en cuenta que estos campos deben estar si o si escritos en minuscula), el orden es indistinto y pueden o no estar todos, el valor de estos campos debe recibir un string.

Ejemplo de url, si quisiera filtrar por todos los campos buscando musculos de nombre que comiencen con Pec, y una division de Frontal seria:
~~~
api/musculos/filtro?nombre=Pec&division=Frontal
~~~
### POST musculo/musculos:
>6) Si se quiere agregar un ejercicio se espera del body uno o varios JSON y se agregan con la siguiente url: (POST) api/musculos

El formato para enviar deber ser el siguiente:
~~~
{
    "nombre_musculo": "String",
    "division_ej": "String",
}
~~~

### PUT musculo:
>7) Si se quiere editar un ejercicio se espera del body solo un JSON y se edita con la siguiente url: (PUT) api/musculos/**:ID**

El formato para enviar deber ser el siguiente:
~~~
{
    "nombre_musculo": "String",
    "division_ej": "String",
}
~~~

### DELETE musculo:
>8) Si se quiere eliminar un ejercicio respecto a su **ID** (numero) colocar url: (DELETE) api/musculos/**:ID**.
----------------------------------------------------------------------------

## Autentificacion en la API:

Para poder realizar las consultas de editado, agregado y eliminición de datos posteriormente debe realizarse un proceso de validacíon que consiste en:
- 1) Conseguir el token de validacíon con la siguiente consulta:
~~~
api/auth/token
~~~
Tenga en cuanta que solo va a poder recibir una respuesta valida en caso que su cuenta en la base de datos esté cargada y tenga el rol de "Admin".
El token resultante deberia lucir a algo como eso:
~~~
eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwibmFtZSI6Ik5pY28iLCJleHAiOjE2ODY3MzgzMTZ9.PyTorkHVa3Wg8IU_HhyYWmUgRg8VoRhrxibshCO_Pt0
~~~
- 2) Copie su token y arrastrelo a la seccion de autenticacion, inserte su token en la casilla y asegurese que el metodo de autenticacion sea Bearer.
