@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Cadastrar Protocolo de Entrada de Equipamento</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('index.protocolo') }}">Protocolos de Entrada</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('create.protocolo') }}">Cadastrar Protocolo</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Cadastrar Protocolo</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12 mx-auto p-5">
                            <div class="form-group">
                                <label class="form-label">Origem:<i class="fa fa-asterisk text-danger"></i></label>
                                <select id="local" class="form-control">
                                    <option value="Gender">Selecione uma Escola | Prédio</option>
                                    @foreach ($escolas as $escola)
                                        <option value="{{ $escola->id }}">{{ $escola->desc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data:<i class="fa fa-asterisk text-danger"></i></label>
                                <input id="data_entrada" name="datepicker" class="datepicker-default form-control"
                                    id="datepicker1">
                            </div>
                            <button style=" display:none;" type="button" class="btn btn-primary buttons"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">Adicionar Equipamento <i
                                    class="bi bi-plus"></i> </button>
                            <button id="imprimirButton" style="display:none;" type="button"
                                class="btn btn-primary buttons">
                                Imprimir <i class="bi bi-printer-fill"></i>
                            </button>

                            <button id="btnCadastrar" type="button" class="btn btn-primary">Cadastrar <i
                                    class="bi bi-check color-white"></i></button>
                        </div>
                        <hr>
                        <div class="col-12" id="tabela-equipamentos-div" style="display: none;">
                            <div class="table-responsive">
                                <table id="tableEquipamentos" class="display table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Tombamento</th>
                                            <th>Problema</th>
                                            <th>Excluir</th>
                                            <th>Ver detalhes</th>
                                    </thead>
                                    <tbody id="dadosTbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content shadow-lg border-0">
                            <div class="modal-header text-white">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Equipamento</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="form-protocolo">
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <!-- Tombamento -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Tombamento: <i
                                                        class="fa fa-asterisk text-danger"></i></label>
                                                <input class="form-control" type="text" id="tombamento" required>
                                            </div>
                                        </div>

                                        <!-- Tipo de Equipamento -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Tipo de Equipamento: <i
                                                        class="fa fa-asterisk text-danger"></i></label>
                                                <select id="id_tipos_equipamentos" class="form-control" required>
                                                    <option value="">Selecione um Equipamento</option>
                                                    @foreach ($tiposequipamentos as $tipoequipamento)
                                                        <option value="{{ $tipoequipamento->id }}">
                                                            {{ $tipoequipamento->desc }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Descrição do Acessório -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Descrição do Acessório:</label>
                                                <textarea cols="30" rows="2" class="form-control" id="descricao_acessorio"></textarea>
                                                <input type="hidden" name="id_protocolo" id="id_protocolo">

                                            </div>
                                        </div>

                                        <!-- Local -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Local: <i
                                                        class="fa fa-asterisk text-danger"></i></label>
                                                <select id="id_setor_escolas" class="form-control" required>
                                                    <option value="">Selecione um Local</option>
                                                    @foreach ($setorEscolas as $setorescolas)
                                                        <option value="{{ $setorescolas->id }}">{{ $setorescolas->desc }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Checkboxes: Prioridade e Peças em Falta -->
                                        <div class="col-md-6">
                                            <div class="form-group d-flex align-items-center">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="checkbox" id="prioridade"
                                                        name="prioridade" value="1">
                                                    <label class="form-check-label" for="prioridade">Prioridade?</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="pecas_falta"
                                                        name="pecas_falta" value="1">
                                                    <label class="form-check-label" for="pecas_falta">Peças em
                                                        falta?</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Textarea: Descrição de Peças em Falta -->
                                        <div class="col-12" id="textarea-container" style="display: none;">
                                            <div class="form-group">
                                                <label class="form-label">Liste as peças ausentes, separando-as por
                                                    vírgulas:
                                                    <i class="fa fa-asterisk text-danger"></i>
                                                </label>
                                                <textarea cols="30" rows="2" class="form-control" id="faltamPecas" name="faltamPecas"></textarea>
                                            </div>
                                        </div>

                                        <!-- Descrição do Problema -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Descrição do Problema:</label>
                                                <textarea cols="30" rows="2" class="form-control" id="desc" name="desc" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer bg-light">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-success text-light save-event">Criar
                                        Evento</button>
                                </div>
                            </form>

                            <!-- Modal detalhes -->
                            <div class="modal fade" id="equipamentoDetalhesModal" tabindex="-1"
                                aria-labelledby="equipamentoDetalhesLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="equipamentoDetalhesLabel">Detalhes do Equipamento
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Detalhes do equipamento serão preenchidos aqui -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fechar</button>
                                        </div>
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

    <script>
        let protocoloId;
        const imprimirProtocolo = (protocoloId) => {
            $.ajax({
                url: "{{ route('indexProtocolo.pdf') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id_protocolo: protocoloId
                },
                success: function(response) {
                    const byteCharacters = atob(response.pdf);
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
            // Função de clique no botão de visualizar detalhes
            $(document).on('click', '.view-details', function() {
                const equipamentoId = $(this).data('id'); // Obtém o ID do equipamento
                carregarDetalhesEquipamento(equipamentoId);
            });

        });

        function carregarDetalhesEquipamento(id) {
            $.ajax({
                url: `/protocolo-entrada/equipamento/${id}`,
                method: 'GET',
                success: function(response) {
                    $('#equipamentoDetalhesModal .modal-body').html(`
            `);
                    const modal = new bootstrap.Modal(document.getElementById('equipamentoDetalhesModal'));
                    modal.show();
                },
                error: function() {
                    iziToast.error({
                        title: 'Erro',
                        message: 'Erro ao carregar os detalhes do equipamento.',
                    });
                }
            });
        }


        document.getElementById('pecas_falta').addEventListener('change', function() {
            const textareaContainer = document.getElementById('textarea-container');
            if (this.checked) {
                textareaContainer.style.display = 'block';
            } else {
                textareaContainer.style.display = 'none';
            }
        });


        $(document).ready(function() {
            $('#imprimirButton').prop('disabled', true);

            $('#btnCadastrar').on('click', function() {
                cadastrarProtocolo();
            });

            $("#form-protocolo").on("submit", function(e) {
                e.preventDefault();

                let equipamentos = $('#id_tipos_equipamentos').val();
                let id_protocolo = $('#id_protocolo').val();
                let tombamento = $('#tombamento').val();
                let setor = $('#id_setor_escolas').val();
                let desc = $('#desc').val();
                let prioridade = $('#prioridade').is(':checked') ? 1 : 0;
                let descricao_acessorio = $('#descricao_acessorio').val();
                let faltamPecas = $('#faltamPecas').val();
                let equipamento_id = $('#equipamento_id').val();


                let data = {
                    equipamentos: equipamentos,
                    id_protocolo: id_protocolo,
                    tombamento: tombamento,
                    setor: setor,
                    desc: desc,
                    prioridade: prioridade,
                    descricao_acessorio: descricao_acessorio,
                    faltamPecas: faltamPecas,
                    equipamento_id: equipamento_id,
                };

                let settings = {
                    url: '{{ route('store.equipamento') }}',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                };

                $.ajax(settings).done(function(response) {
                    let dados = `
                    <tr>
                        <td>${response.tombamento}</td>
                        <td>${response.desc}</td>
                        <td><i class="bi bi-trash3-fill text-danger" onclick="deleteEquipamento(${response.id})"></i></td>
                        <td><i class="bi bi-eye-fill text-dark view-details" data-id="${response.id}"></i></td>

                    </tr>
                `;

                    $('#dadosTbody').append(dados);
                    $('#tabela-equipamentos-div').show();
                    $("#exampleModal").modal('hide');

                    $('#imprimirButton').prop('disabled', false);

                    iziToast.success({
                        title: 'Sucesso',
                        message: 'Equipamento cadastrado com sucesso!',
                    });
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    iziToast.error({
                        title: 'Erro',
                        message: 'Ocorreu um erro ao cadastrar o equipamento.',
                    });
                });
            });

            $('#imprimirButton').on('click', function() {
                imprimirProtocolo(protocoloId)
            });
        });




        function deleteEquipamento(id) {
            if (confirm('Tem certeza que deseja excluir este equipamento?')) {
                $.ajax({
                    url: `/protocolo-entrada/equipamento/destroy/${id}`,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.message === 'Equipamento excluído com sucesso!') {
                            $(`#equipamento-${id}`).remove();
                            iziToast.success({
                                title: 'Sucesso',
                                message: response.message,
                            });
                        } else {
                            iziToast.error({
                                title: 'Erro',
                                message: 'Erro ao excluir equipamento.',
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        iziToast.error({
                            title: 'Erro',
                            message: 'Ocorreu um erro ao excluir o equipamento.',
                        });
                    }
                });
            }
        }

        function cadastrarProtocolo() {
            $('#btnCadastrar').hide();

            let local = $('#local').val();
            let data = $('#data_entrada').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('protocolo.store') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'local': local,
                    'data_entrada': data,
                },
                success: function(response) {
                    protocoloId = response;
                    iziToast.success({
                        title: 'Cadastrado',
                        message: 'Datas e locais cadastrados com sucesso! Insira os equipamentos',
                    });
                    $('#id_protocolo').val(response);
                    $('#btnCadastrar').hide();
                    $('.buttons').show();
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 400) {
                    iziToast.error({
                        title: 'Erro',
                        message: jqXHR.responseJSON.message,
                    });
                }
                $('#btnCadastrar').show();
            });
        }
    </script>
@endsection
