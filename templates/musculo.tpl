{include 'header.tpl'}
    <div class="flex">
        <div class="card">
          <h2>{$musculo->nombre_musculo}</h2>
          <div class="popo">
          <h3>{$musculo->division_musculo}</h3>
          </div>
          <div class="botones">
            <button>Editar</button>
            <button>Eliminar</button>
            </div>
        </div>
      </div>
{include 'footer.tpl'};