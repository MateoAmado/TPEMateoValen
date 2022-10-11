{include 'header.tpl'}
   <div>
   <h3>Filtrar por Musculo: </h3>
   <form action="ejercicios/filtro" method="GET">
   <select name="nombre_musculo">
        {foreach $musculos as $musculo}
            <option value="{$musculo->id}">{$musculo->nombre_musculo}</option>
        {{/foreach}}
        <input type="submit">
   </form>
   </div>
    <div class="flex">
    {foreach $ejercicios as $ejercicio}
        <div class="card">
          <h2>{$ejercicio->nombre_ej}</h2>
          <div class="popo">
          <h3>{$ejercicio->nombre_musculo}</h3>
          <h3>Intensidad:
          {if ($ejercicio->intensidad_ej==1)}
             Baja
         {elseif ($ejercicio->intensidad_ej==2)}
            Media
         {else}
            Alta
         {/if}</h3>
          <h3>{$ejercicio->seccion_ej}</h3>
          </div>
          <a href="ejercicios/{$ejercicio->id_ejer}">Leer mas</a>
          <div class="botones">
         <a href="ejercicios/{$ejercicio->id_ejer}/editar">Editar</a>
         <a href="ejercicios/{$ejercicio->id_ejer}/eliminar">Eliminar</a>
            </div>
        </div>
      {/foreach}
      </div>
{include 'footer.tpl'};
