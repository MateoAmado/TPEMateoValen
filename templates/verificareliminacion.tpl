
{include 'header.tpl'}
<h2>Estas Seguro de Eliminar este Musculo?</h2>
    <div class="flex">
        <div class="card">
          <h2>{$musculo->nombre_musculo}</h2>
          <div class="popo">
          <h3>{$musculo->division_musculo}</h3>
          </div>
          <div class="botones">
            <a href="musculos/{$musculo->id}/eliminar/confirmar">Eliminar</a>
            </div>
        </div>
      </div>
{include 'footer.tpl'};