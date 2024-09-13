@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Listagem de Protocolos</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('index.protocolo') }}">Protocolos de Entrada</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('index.protocolo') }}">Ver Protocolos</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Listagem de Protocolos</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="listProtocolos" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Escola | Setor</th>
                                                <th>Data</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($protocolos as $protocolo)
                                                <tr>
                                                    <td>{{ $protocolo->id }}</td>
                                                    <td>{{ $protocolo->local->desc }}</td>
                                                    <td>{{ $protocolo->data_entrada }}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-sm btn-primary mx-1 view-protocolo"
                                                            data-id="{{ $protocolo->id }}" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                        <form action="{{ route('protocolo.destroy', $protocolo->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Tem certeza que deseja excluir este protocolo?')">
                                                                <i class="la la-trash-o"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('gerar.protocolo.pdf') }}" method="POST" target="_blank" style="display:inline;">
                                                            @csrf
                                                            <input type="hidden" name="id_equipamento" value="{{ $protocolo->id }}">
                                                            <button type="submit" class="btn btn-warning">
                                                                <i class="bi bi-printer-fill"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">VISUALIZAR REGISTROS
                                                        DO PROTOCOLO</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-striped-columns">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Tombamento</th>
                                                                <th scope="col">Funcionário</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Problema</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="protocolo-details">
                                                            <!-- Detalhes do protocolo serão carregados aqui -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.view-protocolo').forEach(function(button) {
                button.addEventListener('click', function() {
                    var protocoloId = this.getAttribute('data-id');
                    fetch('/protocolo-entrada/show/' + protocoloId)
                        .then(response => response.json())
                        .then(data => {
                            var tbody = document.getElementById('protocolo-details');
                            tbody.innerHTML = '';
                            data.equipamentos.forEach(function(equipamento) {
                                var tr = document.createElement('tr');
                                tr.innerHTML = `
                                <td>${equipamento.tombamento}</td>
                                <td>${equipamento.user ? equipamento.user.name : ''}</td>
                                <td>${equipamento.status ? equipamento.status.desc : ''}</td>
                                <td>${equipamento.desc}</td>
                            `;
                                tbody.appendChild(tr);
                            });
                        })
                        .catch(error => console.error('Erro:', error));
                });
            });
        });
    </script>
@endsection
