@foreach ($equipamentos as $index => $equipamento)
    @if ($index % 4 == 0)
        <div class="row">
    @endif
    <div class="col-md-3 text-center mb-4 abrirModal" data-id="{{ $equipamento->id }}">
        <div>
            <img src="http://tiprotocolo.maracanau.ce.gov.br/imagens/estante/{{ $equipamento->id_tipos_equipamentos }}.png"
                width="100" height="100" alt="Figura nao encontrada" class="mb-2">
        </div>
        <div class="text text-center">
            <h4>
                <span class="text-red">
                    <b>{{ $equipamento->tombamento }}</b>
                </span>
            </h4>
            <span class="text-red">
                <b>{{ \Carbon\Carbon::parse($equipamento->protocolo->data_entrada)->format('d/m/y') }}</b>
            </span>
        </div>
    </div>
    @if ($index % 4 == 3)
        </div>
    @endif
@endforeach

<!-- The Modal -->
<div class="modal fade" id="equipamentos_abertos">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="bi bi-layout-text-sidebar-reverse"></i> Dados do Equipamento</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div style="font-size: 0.8rem" class="text-start">
                    <p id="p-local"><b>Origem: </b><span id="protocolo_local"></span></p>
                    <p id="p-data"><b>Data de Entrada:</b> <span id="equipamento_data"></span></p>
                    <p id="p-tombamento"><b>Tombamento|NS:</b> <span id="equipamento_tombamento"></span></p>
                    <p id="p-problema"><b>Problema:</b> <span id="equipamento_problema"></span></p>
                    <p id="p-acessorio"><b>Acessório:</b> <span id="acessorio"></span></p>

                    <div class="form-group">
                        <label class="form-label">
                            <b>Atribuir a um funcionário</b>
                        </label>
                        <select name="id_user" class="form-control" id="select-tecnicos">
                            <option>Selecione um Técnico</option>
                        </select>
                    </div>
                    <div id="div-solucao">
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer" id="btn-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar <i class="bi bi-x-lg"></i></button>
                <div id="btn-entrada">
                    {{-- botao entrada --}}
                    <button id="btn-em-andamento" data-id-status="2" type="button" class="btn btn-primary atualizar-status">Em Andamento <i class="bi bi-arrow-right"></i></button>
                </div>
                <div id="btn-andamento">
                    {{-- botao andamento --}}
                    <button id="btn-em-aberto" data-id-status="1" type="button" class="btn btn-primary atualizar-status">Em aberto <i class="bi bi-arrow-right"></i></button>
                    <button id="btn-finalizado" data-id-status="3" type="button" class="btn btn-primary atualizar-status">Finalizado <i class="bi bi-arrow-right"></i></button>
                </div>
                <div id="btn-finalizar">
                    {{-- botao finalizar --}}
                    <button id="btn-voltar" data-id-status="2" type="button" class="btn btn-primary atualizar-status">Em Andamento</button>
                    <button id="btn-inservivel" data-id-status="5" type="button" class="btn btn-warning atualizar-status">Inservível</button>
                    <button id="btn-retirar" data-id-status="4" type="button" class="btn btn-success atualizar-status">Retirar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.atualizar-status').on('click', function() {
        passarStatus($(this).data('id-status'));
    });
</script>
