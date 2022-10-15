{include 'header.tpl'};
<h2 class="mensaje">{$texto}</h2>
{if (isset($ejercicios))}
    <div class="flex">
    {foreach $ejercicios as $ejercicio}
        <div class="card">
          <h2>{$ejercicio->nombre_ej}</h2>
          <div class="popo">
          </div>
          <a href="ejercicios/{$ejercicio->id_ejer}">Leer mas</a>
          <div class="botones">
         <a href="ejercicios/{$ejercicio->id_ejer}/eliminar">Eliminar</a>
            </div>
        </div>
      {/foreach}
{/if}   
    </div> 
{include 'footer.tpl'};