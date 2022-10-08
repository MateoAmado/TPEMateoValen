{include 'header.tpl'};
    <div class="flex">
    <div class="card">
    <form action="">
          <h2>{$ejercicio->nombre_ej}</h2>
          <label for="nombre_ej">Nombre del Ejercicio:</label>
          <input type="text" name="nombre_ej">
          <div class="popo">
        <label for="nombre_musculo">Nombre del Musculo:</label>
        <select name="nombre_musculo" id="">
            <option value="1"></option>
        </select>
        <label for="Intensidad">Intensidad:</label>
          <p>Baja</p>
          <input type="radio" name="Intensidad" value="1">
          <p>Meida</p>
          <input type="radio" name="Intensidad" value="2">
          <p>Alta</p>
          <input type="radio" name="Intensidad" value="3">
          <input type="radio" name="" id="">
            <label for="seccion">Seccion del Ejercicio:</label>
          <input type="text" name="seccion" id="" value="{$ejercicio->seccion_ej}">
          <label for="descripcion">Descripcion del Ejercicio:</label>
          <input type="text" name="descripcion" id="" value="{$ejercicio->descripcion_ej}">
            </div>
        </form>
            </div>
        </div>
    </div>
    {include 'footer.tpl'};