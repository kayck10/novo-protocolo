    @extends('layout.main')

    @section('content')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
            integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .itens {
                width: 100%;
            }

            .back-btn {
                background-color: #024f9b;
            }
        </style>

        <div class="container-fluid">
            <div class="row page-tines mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Estante de Equipamentos</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('estante.create') }}">Estante de
                                Equipamentos</a>
                        </li>
                    </ol>
                </div>
            </div>
            <input type="hidden" id="_token" value="{{ csrf_token() }}">

            <div class="row mb-5">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mx-auto"></div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mx-auto"></div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mx-auto"></div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <ul class="nav nav-tabs itens" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link tab-estante active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    data-status="1" aria-selected="true">Em aberto
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link tab-estante" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile" type="button" role="tab" data-status="2"
                                    aria-controls="profile" aria-selected="false">Em andamento
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link tab-estante" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact" type="button" role="tab" data-status="3"
                                    aria-controls="contact" aria-selected="false">Finalizado
                                </button>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-sm-3 offset-md-1 mt-3">
                                <input id="pesquisa" type="text" class="form-control" placeholder="Pesquisa">
                            </div>
                            <div class="col-sm-3 mt-3">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalFiltros"
                                    class="btn btn-outline-dark">Filtros <i class="bi bi-sliders"></i></button>
                            </div>
                        </div>
                        <div class="tab-content mb-5 mt-3 ms-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div id="tbody_equipamentos" class="col-12">
                                        <!-- Conteúdo de equipamentos em aberto aqui -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div id="tbody_equipamentos_andamento" class="col-12">
                                        <!-- Conteúdo de equipamentos em andamento aqui -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <h1>Saída</h1>
                                        <!-- Conteúdo de equipamentos finalizados aqui -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="equipamentos_abertos" tabindex="-1" aria-labelledby="equipamentos_abertosLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="equipamentos_abertosLabel">Informações</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <div style="font-size: 0.8rem" class="text-start">
                            <p id="p-local"><b>Origem: </b><span id="protocolo_local"></span></p>
                            <p id="p-data"><b>Data de Entrada:</b> <span id="equipamento_data"></span></p>
                            <p id="p-tombamento"><b>Tombamento|NS:</b> <span id="equipamento_tombamento"></span></p>
                            <p id="p-problema"><b>Problema:</b> <span id="equipamento_problema"></span></p>
                            <div class="form-group">
                                <label class="form-label"><b>Atribuir a um funcionário</b></label>
                                <select name="id_user" class="form-control" id="select-tecnicos">
                                    <option>Selecione um Técnico</option>
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-floating" id="div-solucao">
                            <!-- Campo de solução será inserido aqui -->
                        </div>
                        <div id="div-botoes-status" class="text-start mt-3">
                            <!-- Botões serão inseridos aqui -->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button id="btn-andamento-passar" type="button" class="btn btn-primary">Andamento <i
                                class="bi bi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
            integrity="sha512-3l2QOFNBLXc3Gr+krSL6s6QfM7TH25G3+9h83ZK7cEr2QkZBqlrAEnu9jU6n7UnbS9+M14J8nMgCXuNGWU3H0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                pegarEquipamentos(1);
            });

            let idEquipamento;

            function getIdEquipamento() {
                return idEquipamento;
            }

            $('.tab-estante').click(function() {
                let status = $(this).data('status');
                pegarEquipamentos(status);
            });

            const pegarEquipamentos = (statusEq) => {
                let _token = $('#_token').val();
                $.ajax({
                    type: "get",
                    url: "{{ route('estante.status') }}",
                    data: {
                        statusEq,
                        _token
                    },
                    success: function(response) {
                        if (statusEq == 1) {
                            $('#tbody_equipamentos_andamento').empty().html('');
                            $('#tbody_equipamentos').empty().html(response);
                        } else if (statusEq == 2) {
                            $('#tbody_equipamentos').empty().html('');
                            $('#tbody_equipamentos_andamento').empty().html(response);
                        } else if (statusEq == 3) {
                            $('#tbody_equipamentos_andamento').empty().html('');
                            $('#tbody_equipamentos').empty().html('');
                            $('#contact').empty().html(response);
                        }

                        $(".abrirModal").off('click').on('click', function(e) {
                            abrirModal($(this).data('id'));
                        });

                        $("#fechar-modal").off('click').on('click', function(e) {
                            $("#equipamentos_abertos").modal('hide');
                        });

                        $('#btn-andamento-passar').off('click').on('click', function() {
                            let id = getIdEquipamento();
                            let status = $(this).text() === 'Saída' ? 3 : 2;
                            let solucao = status === 3 ? $('#floatingTextarea2').val() : null;
                            atualizarStatus(id, status, solucao);
                        });
                    },
                    error: function(error) {
                        alert(error);
                    }
                });
            }

            function atualizarStatus(id, status, solucao) {
                let id_tecnico = $('#select-tecnicos').val();
                let _token = $('#_token').val();
                let url = status === 3 ? "{{ route('estante.saida') }}" : "{{ route('estante.passar') }}";

                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        id,
                        statusEq: status,
                        id_tecnico,
                        solucao,
                        _token
                    },
                    success: function(response) {
                        iziToast.success({
                            title: 'Sucesso',
                            message: response.success
                        });
                        $("#equipamentos_abertos").modal('hide');
                        $('#profile-tab').click();
                    }
                });
            }

            const abrirModal = (id) => {
                idEquipamento = id;

                $.ajax({
                    type: "get",
                    url: "{{ route('estante.status.modal') }}",
                    data: {
                        id
                    },
                    success: function(response) {
                        $('#div-solucao').empty();
                        $('#div-botoes-status').empty();
                        let usuarios = "<option>Selecione um Técnico</option>";

                        let dataDeEntrada = response.equipamento.created_at.split('T')[0].split('-');
                        $("#p-data").html(
                            `<b>Data de entrada: </b> ${dataDeEntrada[2]}/${dataDeEntrada[1]}/${dataDeEntrada[0]}`
                        );
                        $("#p-tombamento").html(`<b>Tombamento|NS: </b> ${response.equipamento.tombamento}`);
                        $("#p-acessorio").html(`<b>Acessório: </b> ${response.equipamento.acessorios}`);
                        $("#p-problema").html(`<b>Problema:</b> ${response.equipamento.desc}`);
                        $("#p-local").html(`<b>Local:</b> ${response.equipamento.protocolo.local.desc}`);
                        console.log(response);

                        $.each(response.usuarios, function(indexInArray, valueOfElement) {
                            if (response.equipamento.id_users == valueOfElement.id) {
                                usuarios +=
                                    `<option value="${valueOfElement.id}" selected>${valueOfElement.name}</option>`;
                            } else {
                                usuarios +=
                                    `<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
                            }
                        });

                        if (response.equipamento.id_status == 2) {
                            $('#div-solucao').html(
                                `<div class="form-floating">
                        <textarea class="form-control" placeholder="Insira a solução aqui" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Solução</label>
                    </div>`
                            );
                            $('#btn-andamento-passar').text('Saída');
                            $('#div-botoes-status').hide(); // Esconde os botões para status 2
                        } else if (response.equipamento.id_status == 3) {
                            $('#div-solucao').html(
                                `<p><b>Solução:</b> ${response.equipamento.solucao}</p>`
                            );
                            $('#btn-andamento-passar').hide(); // Esconde o botão de andamento para status 3
                            $('#div-botoes-status').html(`
                            <button type="button" class="btn btn-primary">Html <i class="bi bi-filetype-html"></i></button>
                            <button type="button" class="btn btn-warning">Inservível <i class="bi bi-arrow-down-square-fill"></i></button>
                            <button type="button" class="btn btn-success">Retirar <i class="bi bi-check-all"></i></button>
`);                        } else {
                            $('#div-botoes-status').empty(); // Limpa os botões para outros status
                            $('#btn-andamento-passar').show(); // Mostra o botão de andamento para outros status
                        }

                        $("#select-tecnicos").html(usuarios);
                        $("#equipamentos_abertos").modal('show');
                    }
                });
            }
        </script>
    @endsection
