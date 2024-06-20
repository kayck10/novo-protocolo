@foreach ($equipamentos as $equipamento)
<div class="col-md-3 text-center mb-4" data-toggle="modal" data-target="#exampleModal{{ $equipamento->id }}">
    <div>
        <img src="http://tiprotocolo.maracanau.ce.gov.br/imagens/estante/1.png"
            width="100" height="100" alt="Figura nao encontrada" class="mb-2">
    </div>
    <div class="text text-center">
        <h4>
            <span class="text-red">
                <b>{{ $equipamento->tombamento }}</b>
            </span>
        </h4>
        <span class="text-red">
            <b>{{ \Carbon\Carbon::parse($equipamento->created_at)->format('d/m/y') }}</b>
        </span>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $equipamento->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $equipamento->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel{{ $equipamento->id }}"><i class="bi bi-card-checklist"></i> Dados do Equipamento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div style="font-size: 0.8rem" class="text-start">
                      <p class="text-start"><b>Origem:</b></p>
                      <p><b>Data de Entrada:</b> {{ \Carbon\Carbon::parse($equipamento->created_at)->format('d/m/y') }}</p>
                      <p><b>Tombamento|NS: </b> {{ $equipamento->tombamento }}</p>
                      <p class="text-start"><b>Problema: {{ $equipamento->desc }}</b></p>
                      <div class="form-group">
                        <label class="form-label">
                            <b>Atribuir a um funcionário</b>
                        </label>
                        <select name="" class="form-control">
                            <option value="Gender">Selecione um Técnico</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary">Andamento <i class="bi bi-arrow-right"></i></button>
            </div>
          </div>
        </div>
      </div>
</div>
@endforeach
