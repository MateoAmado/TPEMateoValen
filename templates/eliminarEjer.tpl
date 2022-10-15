{include 'header.tpl'};
<h2 class="mensaje">Quieres eliminar el ejercicio numero {$ejercicio->id_ejer} ?</h2>
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
     <div class="botones">
      <a href="ejercicios/{$ejercicio->id_ejer}/eliminar/confirmar"> confirmar</a>
     </div>
 </div>
</div>
{include 'footer.tpl'};