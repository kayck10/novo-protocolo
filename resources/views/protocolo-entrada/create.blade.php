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
                    <li class="breadcrumb-item active"><a href="{{ route('index.protocolo') }};">Protocolos de Entrada</a>
                    </li>
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
                                data-bs-toggle="modal" data-bs-target="#exampleModal">Adicionar
                                Equipamento <i class="bi bi-plus"></i> </button>
                            <button style=" display:none;" type="button" class="btn btn-primary buttons">Imprimir
                                <i class="fa fa-print"></i></i>
                            </button>
                            <button id="btnCadastrar" type="button" class="btn btn-primary"
                                onclick="cadastrarProtocolo()">Cadastrar
                                <i class="bi bi-check color-white"></i>
                            </button>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar
                                    Equipamento
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="form-protocolo">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="form-label">Tombamento:</label>
                                        <input class="form-control" type="text" id="tombamento">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tipo de Equipamento:</label>
                                        <select name="id_tipos_equipamentos" class="form-control">
                                            <option value="">Selecione um Equipamento</option>
                                            @foreach ($tiposequipamentos as $tipoequipamento)
                                                <option value="{{ $tipoequipamento->id }}">{{ $tipoequipamento->desc }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="form-check">
                                            <label class="form-check-label" for="flexCheckDefault">Acessórios?</label>
                                            <input name="acessorios" class="form-check-input mx-2" type="checkbox"
                                                id="prioridade" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Locais:</label>
                                        <select name="id_setor_escolas" class="form-control">
                                            <option value="">Selecione um Local</option>
                                            @foreach ($setorEscolas as $setorescolas)
                                                <option value="{{ $setorescolas->id }}">{{ $setorescolas->desc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexCheckDefault">Prioridade?</label>
                                        <input class="form-check-input mx-2" type="checkbox" id="prioridade" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Descrição do Problema:</label>
                                        <textarea cols="30" rows="3" class="form-control" type="text" id="desc"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit"
                                            class="btn btn-success save-event waves-effect waves-light">Criar
                                            Evento</button>
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
        function cadastrarProtocolo() {
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


                    $('.buttons').show('hide');
                    $('#btnCadastrar').hide();

                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                // Esta função é chamada quando a requisição AJAX falha
                if (jqXHR.status == 400) {
                    iziToast.error({
                        title: 'Erro',
                        message: jqXHR.responseJSON.message,
                    });
                }
            })
        }
        $(document).ready(function() {
            $("#form-protocolo").on("submit", function(e) {
                e.preventDefault();

                let equipamentos = $('#id_tiposequipamentos').val();
                let tombamento = $('#tombamento').val();
                let setor = $('#id_setor_escolas').val();
                let problema = $('#desc').val();

                let settings = {
                    url: '{{route ('store.equipamento')}}',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                };

                let data = {
                    equipamentos: equipamentos,
                    tombamento: tombamento,
                    setor: setor,
                    problema: problema
                };

                let dados = `
                    <tr>
                        <td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                                                    <td>  </td>
                                                    <td>    </td>
                                                    <td><i class="bi bi-trash3-fill text-danger"></i></td>

                    </tr>
                `;

                $('#dadosTbody').append(dados);
                $('#tabela-equipamentos-div').show('hide');
                $("#exampleModal").modal('hide')


            })
        });
    </script>
@endsection
