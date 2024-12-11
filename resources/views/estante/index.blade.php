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

        .hidden {
            display: none;
        }

        .drop-shadown {
            width: 150px;
            -webkit-filter: drop-shadow(5px 5px 5px rgb(255, 255, 255));
            filter: drop-shadow(5px 5px 5px rgb(99, 99, 99));
        }

        /* .abrirModal {
                                transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                                padding: 20px;
                                outline: 1px solid rgba(114, 110, 110, 0.048);
                                outline-offset: -10px;
                                box-shadow: initial 70px 7px 15px rgba(172, 153, 153, 0.568);
                            }

                            .abrirModal:hover {
                                transform: scale(1.1);
                                box-shadow: inset 0 8px 10px rgba(90, 1, 1, 0.911), 0 8px 15px rgb(236, 4, 4);
                            } */

        .nicho {
            height: 195px;
            background: radial-gradient(circle, rgba(162, 165, 162, 0.5) 35%, #dad7d7 70%);
            border-right: solid 3px #ada8a85b;
            border-bottom: solid 3px #7270705b;
            position: relative;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2),
                inset 0 -5px -5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.1s ease-in-out, box-shadow 0.3s ease-in-out;
            outline-offset: -10px;
        }

        .nicho:hover {
            transform: scale(1);
            box-shadow: inset 0 8px 10px rgba(0, 0, 0, 0.2), 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .nicho:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(0, 0, 0, 0.1));
            /* border-radius: 15px; */
            z-index: 1;
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
                                data-bs-target="#home" type="button" role="tab" aria-controls="home" data-status="1"
                                aria-selected="true">Em aberto
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
                        <li class="nav-item" role="presentation">


                            <div class="input-group mb-3">
                                <input id="pesquisa" data-bs-toggle="tab" data-bs-target="#search" role="tab"
                                    aria-controls="search" aria-selected="false" type="text"
                                    class="form-control nav-link tab-estante" placeholder="Pesquisa">
                                <i class="bi bi-search btn btn-primary" ></i>
                            </div>
                        </li>
                    </ul>
                    <div class="tab-content mb-5 mt-3 ms-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="pesquisa">
                            <div class="row">
                                <div class="col-12">
                                    <div id="tbody_equipamentos_search" class="col-12">
                                        <p class="text-center text-muted"> Informe o tombamento para iniciar a pesquisa </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            $('#pesquisa').on('input', function() {
                const termoPesquisa = $(this).val();
                console.log(termoPesquisa);
                if(termoPesquisa < 1){
                    $('#tbody_equipamentos_search').empty().html('<p class="text-center text-muted"> Informe o tombamento para iniciar a pesquisa </p>')
                }else{
                    pesquisarEquipamentoPorTombamento(termoPesquisa);
                }
            });
        });

        const ligaligaliga = () => {
            $("abrirModal").on('click', function(e) {
                abrirModal($(this).data('id'));
            });
        }

        function pesquisarEquipamentoPorTombamento(tombamento) {
            let _token = $('#_token').val();
            $.ajax({
                type: "get",
                url: "{{ route('estante.pesquisarTombamento') }}",
                data: {
                    tombamento,
                    _token
                },
                success: function(response) {
                    $('#tbody_equipamentos').empty();
                    $('#tbody_equipamentos_andamento').empty();
                    $('#contact').empty();
                    $('#tbody_equipamentos_search').empty().html(response);
                    $(".abrirModal").off('click').on('click', function(e) {
                        abrirModal($(this).data('id'));
                    });

                    $("#fechar-modal").off('click').on('click', function(e) {
                        $("#equipamentos_abertos").modal('hide');
                    });
                },
                error: function(error) {
                    console.error('Erro ao pesquisar tombamento:', error);
                    alert('Erro ao buscar equipamento: ' + error.responseText);
                }
            });
        }


        const passarStatus = (idStatus) => {
            let id = getIdEquipamento();
            let solucao;
            if ($('#floatingTextarea2').length) {
                solucao = $('#floatingTextarea2').val();
            }
            atualizarStatus(id, idStatus, solucao);
        }

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
                    $(".abrirModal").on('click', function(e) {
                        abrirModal($(this).data('id'));
                    });

                    // $(".abrirModal").off('click').on('click', function(e) {
                    //     abrirModal($(this).data('id'));
                    // });

                    $("#fechar-modal").off('click').on('click', function(e) {
                        $("#equipamentos_abertos").modal('hide');
                    });
                },
                error: function(error) {
                    alert('Erro ao pegar equipamentos: ' + error.responseText);
                }
            });
        }

        function atualizarStatus(id, status, solucao) {
            let id_tecnico = $('#select-tecnicos').val();
            let _token = $('#_token').val();

            if (id_tecnico === '' || id_tecnico === 'Selecione um Técnico') {
                iziToast.error({
                    title: 'Erro',
                    message: 'Por favor, selecione um técnico.',
                });
                return;
            }

            if ($('#floatingTextarea2').length && !solucao && status != 1) {
                iziToast.error({
                    title: 'Erro',
                    message: 'Por favor, insira a solução.',
                });
                return;
            }

            $.ajax({
                type: "post",
                url: "{{ route('estante.passar') }}",
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
                    pegarEquipamentos(1);
                    pegarEquipamentos(2);
                },
                error: function(error) {
                    iziToast.error({
                        title: 'Erro',
                        message: 'Não foi possível atualizar o status.'
                    });
                    console.error('Erro ao atualizar status:', error);
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
                    console.log(response)
                    $('#div-solucao').empty();
                    $('#div-botoes-status').empty();
                    let usuarios = "<option>Selecione um Técnico</option>";

                    let dataDeEntradaCompleta = response.protocoloEntrada.data_entrada.split(' ')[
                        0];
                    let dataDeEntrada = dataDeEntradaCompleta.split('-');

                    $("#p-data").html(
                        `<b>Data de entrada: </b> ${dataDeEntrada[2]}/${dataDeEntrada[1]}/${dataDeEntrada[0]}`
                    );

                    $("#p-tombamento").html(`<b>Tombamento|NS: </b> ${response.equipamento.tombamento}`);
                    $("#p-acessorio").html(`<b>Acessório: </b> ${response.equipamento.acessorios}`);
                    $("#p-problema").html(`<b>Problema:</b> ${response.equipamento.desc}`);
                    $("#p-pecas").html(`<b>Peças em Falta:</b> ${response.equipamento.faltamPecas ?? 'Não há peças em falta'}`);
                    $("#p-local").html(`<b>Local:</b> ${response.equipamento.protocolo.local.desc}`);

                    $.each(response.usuarios, function(indexInArray, valueOfElement) {
                        if (response.equipamento.id_users == valueOfElement.id) {
                            usuarios +=
                                `<option value="${valueOfElement.id}" selected>${valueOfElement.name}</option>`;
                        } else {
                            usuarios +=
                                `<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
                        }
                    });

                    if (response.equipamento.id_status == 1) {
                        $('#btn-entrada').removeClass('hidden')
                        $('#btn-andamento').addClass('hidden')
                        $('#btn-finalizar').addClass('hidden')
                    }

                    if (response.equipamento.id_status == 2) {
                        $('#div-solucao').html(
                            `<div class="form-floating">
                                    <textarea class="form-control" placeholder="Insira a solução aqui" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Solução</label>
                                </div>`
                        );

                        $('#btn-entrada').addClass('hidden')
                        $('#btn-andamento').removeClass('hidden')
                        $('#btn-finalizar').addClass('hidden')

                    } else if (response.equipamento.id_status == 3) {
                        $('#div-solucao').html(
                            `<p><b>Solução:</b> ${response.equipamento.solucao}</p>`
                        );

                        $('#btn-entrada').addClass('hidden')
                        $('#btn-andamento').addClass('hidden')
                        $('#btn-finalizar').removeClass('hidden')

                        $('#btn-retirar').off('click').on('click', function() {
                            atualizarStatusEspecial(id, 'retirar');
                        });

                        $('#btn-inservivel').off('click').on('click', function() {
                            atualizarStatusEspecial(id, 'inservivel');
                        });

                         $('#btn-imprimir').off('click').on('click', function() {
                            var equipamentoId = getIdEquipamento();
                            var url = '/estante/pdf/' + equipamentoId;

                            window.open(url, '_blank');
                        });

                        $('#btn-voltar').off('click').on('click', function() {
                            atualizarStatusEspecial(id, 'entrada');
                        });
                    } else {
                        $('#div-botoes-status').empty();
                        $('#btn-andamento-passar').show();
                    }

                    $("#select-tecnicos").html(usuarios);
                    $("#equipamentos_abertos").modal('show');
                    console.log('jasasajs');
                },
                error: function(error) {
                    iziToast.error({
                        title: 'Erro',
                        message: 'Não foi possível carregar as informações do equipamento.'
                    });
                    console.error('Erro ao abrir modal:', error);
                }
            });
        }

        function atualizarStatusEspecial(id, tipo) {
            let _token = $('#_token').val();
            let url;
            let status;

            if (tipo === 'retirar') {
                url = "{{ route('estante.retirar') }}";
            } else if (tipo === 'inservivel') {
                url = "{{ route('estante.inservivel') }}";
            } else if (tipo === 'entrada') {
                url = "{{ route('estante.passar') }}";
                status = 2;
            }

            $.ajax({
                type: "post",
                url: url,
                data: {
                    id,
                    statusEq: status,
                    _token
                },
                success: function(response) {
                    iziToast.success({
                        title: 'Sucesso',
                        message: response.success
                    });
                    $("#equipamentos_abertos").modal('hide');
                    $('#profile-tab').click();
                    pegarEquipamentos(1);
                    pegarEquipamentos(2);
                },
                error: function(error) {
                    iziToast.error({
                        title: 'Erro',
                        message: 'Não foi possível atualizar o status.'
                    });
                    console.error('Erro ao atualizar status especial:', error);
                }
            });
        }
    </script>
@endsection
