Consultas Basicas:
1) Si se quiere obtener todos los ejercicios debera colocar la url: (GET) api/ejercicios
2) Si se quiere obtener solo un ejercicio respecto a su ID(numero) colocar esta url: (GET) api/ejercicios/:ID
3) Si se quiere obtener una paginacion de ejercicios entre 2 numeros colocar url: (GET) api/ejercicios/paginacion?primernum=(numero1)&segundonum=(numero2>numero1).
4) Si se quiere agregar un ejercicio se espera del body uno o varios JSON y se agregan con la siguiente url: (POST) api/ejercicios
5) Si se quiere editar un ejercicio se espera del body solo un JSON y se edita con la siguiente url: (PUT) api/ejercicios/:ID
6) Si se quiere eliminar un ejercicio respecto a su ID(numero) colocar url: (DELETE) api/ejercicios/:ID
7) Si se quiere obtener ejercicios ordenados de manera ascendente o descente respecto a solo un campo colocar la url: (GET) api/ejercicios/ordernar/:CAMPO(nombre/musculo/intensidad/seccion/descripcion)?order=(ASC/DESC).
8) Si se quieren filtrar ejercicios de la coleccion entera respecto a un campo o varios y su respectivo filtro de busqueda colocar url:
 (GET) api/ejercicios/filtro?campo1=(valor)&campo2=(valor)&campo3=(valor)&campo4=(valor).
 Siendo nombre, seccion, musculo, intensidad los campos posibles para iterar, el orden es indistinto y pueden o no estar todos.


<!-- TODO: poner lo del token  -->
