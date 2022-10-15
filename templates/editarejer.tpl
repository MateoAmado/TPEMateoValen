{include 'header.tpl'};
<div class="form">
    <form action="ejercicios/{$ejercicio->id_ejer}/editar/confirmar" method="POST">
          <div class="formnombre">
          <h2>Editar ejercicio</h2>
          <label for="nombre_ej">Nombre del Ejercicio:</label>
          <input type="text" name="nombre_ejercicio" value="{$ejercicio->nombre_ej}">
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
          {if (isset($ejercicio->intensidad_ej) && $i==$ejercicio->intensidad_ej)}
            {if ($i == 1)}
              <label for="Intensidad">Baja</label>
              {elseif ($i == 2)}
                <label for="Intensidad">Media</label>
                {else}
                  <label for="Intensidad">Alta</label>
            {/if}
            <input checked value="{$ejercicio->intensidad_ej}" type="radio" name="Intensidad">
              {else}
                {if ($i == 1)}
                  <label for="Intensidad">Baja</label>
                  {elseif ($i == 2)}
                    <label for="Intensidad">Media</label>
                    {else}
                      <label for="Intensidad">Alta</label>
                {/if}
              <input value="{$i}" type="radio" name="Intensidad">
          {/if}
        {/for}
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