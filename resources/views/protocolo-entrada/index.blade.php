@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Listagem de protocolos</h4>
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
                                <h4 class="card-title">Listagem de protocolos</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="listProtocolos" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Nº Protocolo</th>
                                                <th>Escola | Setor</th>
                                                <th>Data</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($protocolos as $protocolo)
                                                @php
                                                    $ano = $protocolo->created_at->format('Y');
                                                @endphp
                                                <tr>
                                                    <td>{{ $ano . $protocolo->id }}</td>
                                                    <td>{{ $protocolo->local->desc }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($protocolo->data_entrada)->translatedFormat('d\ M, Y') }}
                                                    </td>
                                                    <td>
                                                        <!-- Botão de visualização -->
                                                        <button type="button"
                                                            class="btn btn-sm btn-primary mx-1 view-protocolo"
                                                            data-id="{{ $protocolo->id }}" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">
                                                            <i class="bi bi-eye"></i>
                                                        </button>

                                                        <!-- Formulário de exclusão -->
                                                        <form action="{{ route('protocolo.destroy', $protocolo->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Tem certeza que deseja excluir este protocolo?')">
                                                                <i class="la la-trash-o"></i>
                                                            </button>
                                                        </form>

                                                        <!-- Botão de impressão -->
                                                        <button onclick="imprimirProtocolo({{ $protocolo->id }})"
                                                            type="button" class="btn btn-warning btn-imprimir"
                                                            data-id="{{ $protocolo->id }}">
                                                            <i class="bi bi-printer-fill"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Modal para detalhes do protocolo -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">VISUSALIZAR
                                                        REGISTROS
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
                                    <!-- Fim do Modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection


@section('scripts')
    <script>
        const imprimirProtocolo = (protocoloId) => {
            $.ajax({
                url: "{{ route('indexProtocolo.pdf') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id_protocolo: protocoloId
                },
                success: function(response) {
                    // Cria o blob a partir do base64 recebido
                    const byteCharacters = atob(response.pdf); // Converte base64 para bytes
                    const byteArrays = [];

                    for (let offset = 0; offset < byteCharacters.length; offset += 1024) {
                        const slice = byteCharacters.slice(offset, offset + 1024);
                        const byteNumbers = new Array(slice.length);

                        for (let i = 0; i < slice.length; i++) {
                            byteNumbers[i] = slice.charCodeAt(i);
                        }
                        const byteArray = new Uint8Array(byteNumbers);
                        byteArrays.push(byteArray);
                    }
                    const blob = new Blob(byteArrays, {
                        type: 'application/pdf'
                    });
                    // Cria um link para abrir o PDF em uma nova aba
                    const link = document.createElement('a');
                    link.href = URL.createObjectURL(blob);
                    link.target = '_blank';
                    link.click();
                },
                error: function(error) {

                    console.error('Erro:', error);
                }
            });
        };



        $(document).ready(function() {
            // Delegação de evento para elementos gerados dinamicamente
            $(document).on('click', '.view-protocolo', function() {
                var protocoloId = $(this).data('id');
                $.ajax({
                    url: '/protocolo-entrada/show/' + protocoloId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var tbody = $('#protocolo-details');
                        tbody.empty(); // Limpar os dados anteriores

                        data.equipamentos.forEach(function(equipamento) {
                            console.log(equipamento);
                            var tr = `
                        <tr>
                            <td>${equipamento.tombamento}</td>
                            <td>${equipamento.user ? equipamento.user.name : ''}</td>
                            <td>${equipamento.status ? equipamento.status.desc : ''}</td>
                            <td>${equipamento.desc}</td>
                        </tr>
                    `;
                            tbody.append(tr);
                        });
                    },
                    error: function(error) {
                        console.error('Erro:', error);
                    }
                });
            });
        });
    </script>
@endsection
