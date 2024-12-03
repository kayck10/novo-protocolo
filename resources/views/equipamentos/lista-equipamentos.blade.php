@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Histórico de Máquinas</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('historico') }}">Equipamentos</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="">Histórico de Máquinas </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Tombamento</th>
                                                <th>Tipo</th>
                                                <th>Data de Entrada</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($equipamentos as $equipamento)
                                                <tr>
                                                    <td>{{ $equipamento->tombamento }}</td>
                                                    <td>{{ $equipamento->tiposEquipamentos ? $equipamento->tiposEquipamentos->desc : 'N/A' }}
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary text-light"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalEquipamento{{ $equipamento->id }}">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </button>
                                                        <button class="btn btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!-- Modal de Detalhes -->
                                                <div class="modal fade" id="modalEquipamento{{ $equipamento->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="modalEquipamentoLabel{{ $equipamento->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="modalEquipamentoLabel{{ $equipamento->id }}">
                                                                    Detalhes do Equipamento
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><strong>Origem:</strong>
                                                                    {{ $equipamento->protocolos->local->desc ?? 'N/A' }}</p>
                                                                <p><strong>Tombamento / NS:</strong>
                                                                    {{ $equipamento->tombamento }}</p>
                                                                <p><strong>Problema:</strong> {{ $equipamento->desc }}</p>
                                                                <p><strong>Solução:</strong> {{ $equipamento->solucao }}
                                                                </p>

                                                                <hr>
                                                                <h5>Protocolos Relacionados</h5>
                                                                @if ($equipamento->protocolos)
                                                                    <div class="accordion"
                                                                        id="protocolosAccordion{{ $equipamento->id }}">
                                                                        @foreach ($equipamento->protocolos->equipamentos as $protocolo)
                                                                            <div class="accordion-item">
                                                                                <h2 class="accordion-header"
                                                                                    id="heading{{ $protocolo->id }}">
                                                                                    <button
                                                                                        class="accordion-button collapsed"
                                                                                        type="button"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target="#collapse{{ $protocolo->id }}"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapse{{ $protocolo->id }}">
                                                                                        Protocolo #{{ $protocolo->id }}
                                                                                    </button>
                                                                                </h2>
                                                                                <div id="collapse{{ $protocolo->id }}"
                                                                                    class="accordion-collapse collapse"
                                                                                    aria-labelledby="heading{{ $protocolo->id }}"
                                                                                    data-bs-parent="#protocolosAccordion{{ $equipamento->id }}">
                                                                                    <div class="accordion-body">
                                                                                        <p><strong>Data de Entrada:</strong>
                                                                                            {{ \Carbon\Carbon::parse($equipamento->protocolos->data_entrada)->format('d/m/Y') }}
                                                                                        </p>
                                                                                        <p><strong>Local:</strong>
                                                                                            {{ $equipamento->protocolos->local->desc ?? 'N/A' }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @else
                                                                    <p>Nenhum protocolo relacionado encontrado.</p>
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net@1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
