@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Criar Laudo Inservíveis</h4>
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
                                <table class="responsive table table-striped" id="table">
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
                                                    <button class="btn btn-warning ver-btn"
                                                        data-id="{{ $equipamento->id }}"><i
                                                            class="bi bi-eye-fill"></i></button>
                                                    <button id="editar" class="btn btn-primary"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                </td>
                                            </tr>
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

    <!-- Modal -->
    <div class="modal fade" id="equipamentoModal" tabindex="-1" aria-labelledby="equipamentoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="equipamentoModalLabel">Detalhes do Equipamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Tombamento | NS:</strong> <span id="modalTombamento"></span></p>
                    <p><strong>Origem:</strong> <span id="modalOrigem"></span></p>
                    <p><strong>Data de criação do laudo:</strong> <span id="modalDataCriacao"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const verButtons = document.querySelectorAll('.ver-btn');

            verButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const equipamentoId = this.getAttribute('data-id');

                    fetch(`/api/equipamentos/${equipamentoId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Equipamento não encontrado');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log(
                            data);

                            if (data.setor_escola && data.setor_escola.desc) {
                                document.getElementById('modalTombamento').innerText = data
                                    .tombamento;
                                document.getElementById('modalOrigem').innerText = data
                                    .setor_escola.desc;
                                document.getElementById('modalDataCriacao').innerText =
                                    new Date(data.created_at).toLocaleDateString('pt-BR');

                                const equipamentoModal = new bootstrap.Modal(document
                                    .getElementById('equipamentoModal'));
                                equipamentoModal.show();
                            } else {
                                alert('Dados do setor não encontrados');
                            }
                        })


                });
            });
        });
    </script>
@endsection
