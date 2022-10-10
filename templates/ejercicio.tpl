{include 'header.tpl'};
    <div class="flex">
    <div class="card">
          <h2>{$ejercicio->nombre_ej}</h2>
          <div class="popo">
          <h3>{$ejercicio->nombre_musculo}</h3>
          <h3>Intesidad:
          {if ($ejercicio->intensidad_ej==1)}
             Baja
         {elseif ($ejercicio->intensidad_ej==2)}
            Media
         {else}
            Alta
         {/if}</h3>
          <h3>{$ejercicio->seccion_ej}</h3>
            </div>
            <p>{$ejercicio->descripcion_ej}</p>
            <div class="botones">
            <a href="ejercicios/{$ejercicio->id_ejer}/editar">Editar</button>
            <a href="ejercicios/{$ejercicio->id_ejer}/eliminar">Eliminar</button>
            </div>
        </div>
    </div>
{include 'footer.tpl'};