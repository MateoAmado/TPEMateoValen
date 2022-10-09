{include 'header.tpl'};
<div class="form">
    <form action="confirmar/{$ejercicio->id_ejer}" method="POST">
          <div class="formnombre">
          <h2>Editar ejercicio</h2>
          <label for="nombre_ej">Nombre del Ejercicio:</label>
          <input type="text" name="nombre_ejercicio" value="{$ejercicio->nombre_ej}">
          </div>
          <div class="formmusculo">
        <label for="nombre_musculo">Nombre del Musculo:</label>
        <select name="nombre_musculo">
            <option value="1">Pecho</option>
            <option value="2">Espalda</option>
            <option value="3">Piernas</option>
            <option value="4">Biceps</option>
            <option value="5">Triceps</option>
            <option value="6">Hombros</option>
        </select>
          </div>
          <div class="formintensidad">
        <label for="Intensidad">Intensidad:</label>
          <p>Baja</p>
          <input type="radio" name="Intensidad" value="1">
          <p>Meida</p>
          <input type="radio" name="Intensidad" value="2">
          <p>Alta</p>
          <input type="radio" name="Intensidad" value="3">
          </div>
          <div class="formseccion">
            <label for="seccion">Seccion del Ejercicio:</label>
          <input type="text" name="seccion" id="" value="{$ejercicio->seccion_ej}">
          <label for="descripcion">Descripcion del Ejercicio:</label>
          <input type="text" name="descripcion" id="" value="{$ejercicio->descripcion_ej}">
          </div>
          <input type="submit">
        </form>
        </div>
    {include 'footer.tpl'};