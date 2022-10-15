{include 'header.tpl'};
<div class="formularioejercicio">
    <form action="ejercicios/agregar/confirmar" method="POST">
          <div class="formnombre">
          <h2>Agregar ejercicio</h2>
          <label for="nombre_ej">Nombre del Ejercicio:</label>
          <input type="text" name="nombre_ejercicio" >
          </div>
          <div class="formmusculo">
        <label for="nombre_musculo">Nombre del Musculo:</label>
        <select name="nombre_musculo">
        {foreach $musculos as $musculo}
          <option value="{$musculo->id}">{$musculo->nombre_musculo}</option>
      {{/foreach}}
        </select>
          </div>
          <div class="formintensidad">
        <label for="Intensidad">Intensidad:</label>
        {for $i=1 to 3}
          {if ($i == 1)}
            <label for="Intensidad">Baja</label>
            {elseif ($i == 2)}
              <label for="Intensidad">Media</label>
              {else}
                <label for="Intensidad">Alta</label>
          {/if}
          <input type="radio" name="Intensidad" value="{$i}">
        {/for}
          </div>
          <div class="formseccion">
            <label for="seccion">Seccion del Ejercicio:</label>
          <input type="text" name="seccion" id="" >
          <label for="descripcion">Descripcion del Ejercicio:</label>
          <input type="text" name="descripcion" id="">
          </div>
          <input type="submit">
        </form>
        </div>
    {include 'footer.tpl'};