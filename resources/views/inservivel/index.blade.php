@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Listagem de Laudo Inservíveis</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('inservivel.create') }}">Inservíveis</a></li>
                </ol>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Inservíveis</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabelaInservivel" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th class="center">Tombamento | NS</th>
                                            <th class="center">Origem</th>
                                            <th class="center">Data de criação do laudo</th>
                                            <th class="center">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($equipamentos as $equipamento)
                                            <tr>
                                                <td class="center">{{ $equipamento->tombamento }}</td>
                                                <td class="center">{{ $equipamento->setorEscola->desc }}</td>
                                                <td class="center">{{ $equipamento->created_at->format('d/m/Y') }}</td>
                                                <td class="center">
                                                    <button type="button" class="btn btn-warning btnImprimir"
                                                        data-equipamento-id="{{ $equipamento->id }}">
                                                        <i class="bi bi-printer"></i>
                                                    </button>


                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalmostrardados{{ $equipamento->id }}"
                                                        data-equipamento-id="{{ $equipamento->id }}">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal para mostrar os detalhes do equipamento -->
                    @foreach ($equipamentos as $equipamento)
                        <div class="modal fade" id="modalmostrardados{{ $equipamento->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modalDetalhesEquipamentoLabel{{ $equipamento->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDetalhesEquipamentoLabel{{ $equipamento->id }}">
                                            Detalhes do Equipamento - Tombamento: {{ $equipamento->tombamento }}</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Tipo</th>
                                                    <td>{{ $equipamento->tiposEquipamentos->desc ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Marca</th>
                                                    <td>{{ $equipamento->marca ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Modelo</th>
                                                    <td>{{ $equipamento->modelo ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Número de Série</th>
                                                    <td>{{ $equipamento->num_serie ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Número de Patrimônio</th>
                                                    <td>{{ $equipamento->tombamento ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Local</th>
                                                    <td>{{ $equipamento->protocolo->local->desc ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Setor</th>
                                                    <td>{{ $equipamento->setorEscola->desc ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Data de Criação</th>
                                                    <td>{{ $equipamento->created_at->format('d/m/Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Solução</th>
                                                    <td>{{ $equipamento->solucao ?? 'N/A' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn btn-primary devolver-equipamento"
                                            data-id="{{ $equipamento->id }}" data-bs-dismiss="modal">Devolver</button>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.devolver-equipamento').on('click', function() {
                var equipamentoId = $(this).data('id');

                $.ajax({
                    url: '{{ route('inservivel.atualizar', '') }}/' + equipamentoId,
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success(response.success, 'Sucesso', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: "toast-top-right"
                        });
                        location.reload();
                    },
                    error: function(xhr) {
                        toastr.error('Ocorreu um erro ao devolver o equipamento.', 'Erro', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: "toast-top-right"
                        });
                    }
                });
            });


            document.querySelectorAll('.btnImprimir').forEach(function(button) {
                button.addEventListener('click', function() {
                    var equipamentoId = $(this).closest('tr').find('button[data-equipamento-id]')
                        .data('equipamento-id');

                    var data = {
                        id_equipamento: equipamentoId,
                        id_problema: 2,
                        marca: 'Marca do Equipamento',
                        modelo: 'Modelo do Equipamento',
                        num_serie: 'Número de Série'
                    };

                    fetch('{{ route('pdf.inservivel') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.blob())
                        .then(blob => {
                            var url = window.URL.createObjectURL(blob);
                            window.open(url);
                        })
                        .catch(error => console.error('Erro ao gerar PDF:', error));
                });
            });


        });
    </script>
@endsection
