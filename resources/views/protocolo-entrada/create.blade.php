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
                                    <button id="imprimirButton" style="display:none;" type="button" class="btn btn-primary buttons">
                                        Imprimir <i class="fa fa-print"></i>
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
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Equipamento</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="form-protocolo">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="form-label">Tombamento: <i
                                                class="fa fa-asterisk text-danger"></i></label>
                                        <input class="form-control" type="text" id="tombamento" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tipo de Equipamento: <i
                                                class="fa fa-asterisk text-danger"></i></label>
                                        <select id="id_tipos_equipamentos" class="form-control" required>
                                            <option value="">Selecione um Equipamento</option>
                                            @foreach ($tiposequipamentos as $tipoequipamento)
                                                <option value="{{ $tipoequipamento->id }}">{{ $tipoequipamento->desc }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Descrição do Acessório:</label>
                                        <textarea cols="20" rows="3" class="form-control" id="descricao_acessorio"></textarea>
                                        <input type="hidden" name="id_protocolo" id="id_protocolo">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label mx-2">Local: <i
                                                class="fa fa-asterisk text-danger"></i></label>
                                        <select id="id_setor_escolas" class="form-control" required>
                                            <option value="">Selecione um Local</option>
                                            @foreach ($setorEscolas as $setorescolas)
                                                <option value="{{ $setorescolas->id }}">{{ $setorescolas->desc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="prioridade" value="0">
                                    <div class="form-check">
                                        <label class="form-check-label" for="prioridade">Prioridade?</label>
                                        <input class="form-check-input mx-2" type="checkbox" id="prioridade" name="prioridade" value="1">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Descrição do Problema: <i
                                                class="fa fa-asterisk text-danger"></i></label>
                                        <textarea cols="30" rows="3" class="form-control" type="text" id="desc" name="desc"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit"
                                        class="btn btn-success save-event waves-effect waves-light">Criar Evento</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {



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

                let data = {
                    equipamentos: equipamentos,
                    id_protocolo: id_protocolo,
                    tombamento: tombamento,
                    setor: setor,
                    desc: desc,
                    prioridade: prioridade,
                    descricao_acessorio: descricao_acessorio
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
                    // console.log(response);
                    $('#tableEquipamentos').DataTable().clear().destroy();
                    let dados = `
                <tr>
                    <td>${response.tombamento}</td>
                    <td>${response.desc}</td>
                    <td><i class="bi bi-trash3-fill text-danger" onclick="deleteEquipamento(${response.id})"></i></td>
                </tr>
            `

                    $('#dadosTbody').append(dados);
                    $('#tabela-equipamentos-div').show();
                    $("#exampleModal").modal('hide');

                    // $('#tableEquipamentos').DataTable();

                    iziToast.success({
                        title: 'Sucesso',
                        message: 'Equipamento cadastrado com sucesso!',
                    });

                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("Request failed: " + textStatus + ", " + errorThrown);
                    iziToast.error({
                        title: 'Erro',
                        message: 'Ocorreu um erro ao cadastrar o equipamento.',
                    });
                });
            });
        });
        $(document).ready(function() {
        $('#imprimirButton').on('click', function() {
            $.ajax({
                url: "{{ route('gerar.protocolo.pdf') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response) {
                    var blob = new Blob([response], { type: 'application/pdf' });
                    var url = window.URL.createObjectURL(blob);
                    window.open(url); 
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
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
                        console.log("Request failed: " + textStatus + ", " + errorThrown);
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
