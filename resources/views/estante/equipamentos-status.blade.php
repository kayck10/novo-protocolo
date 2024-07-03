<div class="row" id="tbody_equipamentos">

    @foreach ($equipamentos as $index => $equipamento)
        @if ($index % 4 == 0)
</div>
<div class="row">
    @endif
    <div class="col-md-3 text-center mb-4 abrirModal" data-id="{{ $equipamento->id }}">
        <div>
            <img src="http://tiprotocolo.maracanau.ce.gov.br/imagens/estante/{{$equipamento->id_tipos_equipamentos}}.png" width="100" height="100"
                alt="Figura nao encontrada" class="mb-2">
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
    </div>
    @endforeach
</div>
<!-- The Modal -->
<div class="modal fade" id="equipamentos_abertos">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Informações</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div style="font-size: 0.8rem" class="text-start">
                    <p id="p-local"><b>Origem: </b>$protocoloEntrada->id_local</p>
                    <p id="p-data"><b>Data de Entrada:</b> data</p>
                    <p id="p-tombamento"><b>Tombamento|NS:</b> $equipamento->tombamento</p>
                    <p id="p-problema"><b>Problema:</b> $equipamento->desc</p>
                    <div class="form-group">
                        <label class="form-label">
                            <b>Atribuir a um funcionário</b>
                        </label>
                        <select name="id_user" class="form-control" id="select-tecnicos">
                            <option>Selecione um Técnico</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="fechar-modal">Fechar</button>
                <button id="btn-andamento-passar" type="button" class="btn btn-primary">Andamento <i class="bi bi-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>

