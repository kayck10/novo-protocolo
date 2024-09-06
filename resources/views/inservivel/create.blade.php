@extends('layout.main')

@section('content')
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Listagem de Laudo Inservíveis</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
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
                                            <th class="center">Data</th>
                                            <th class="center">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($equipamentos as $equipamento)
                                            <tr id="list-equipamento-{{ $equipamento->id }}">
                                                <td class="center">{{ $equipamento->tombamento }}</td>
                                                <td class="center">{{ $equipamento->setorEscola->desc }}</td>
                                                <td class="center">
                                                    {{ \Carbon\Carbon::parse($equipamento->protocolo->data_entrada)->format('d/m/y') }}
                                                </td>
                                                <td class="center">
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#modalEquipamento{{ $equipamento->id }}">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button>
                                                    <button class="btn btn-primary abrirModal" data-bs-toggle="modal"
                                                        data-bs-target="#modalcriarlaudo{{ $equipamento->id }}"
                                                        data-equipamento-id="{{ $equipamento->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal Criar Laudo -->
                                            <div class="modal fade" id="modalcriarlaudo{{ $equipamento->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel2">Criar
                                                                Laudo
                                                                Inservível</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="font-weight-bold">
                                                                <p>Origem: {{ $equipamento->setorEscola->desc }}</p>
                                                                <p>Tombamento / NS: {{ $equipamento->tombamento }}</p>
                                                                <p>Tipo: {{ $equipamento->tiposEquipamentos->desc }}
                                                                </p>
                                                            </div>
                                                            <form action="{{ route('gerar.pdf') }}" target="_blank"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id_equipamento"
                                                                    value="{{ $equipamento->id }}">
                                                                <div class="form-group">
                                                                    <label class="form-label"><b>Problema:</b></label>
                                                                    <select id="id_problema" name="id_problema"
                                                                        class="form-control" required>
                                                                        <option value="">Selecione um Problema
                                                                        </option>
                                                                        @foreach ($problemas as $problema)
                                                                            <option value="{{ $problema->id }}">
                                                                                {{ $problema->desc }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"><b>Marca:</b></label>
                                                                    <input id="marca" name="marca" type="text"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"><b>Modelo:</b></label>
                                                                    <input id="modelo" name="modelo" type="text"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"><b>Número de
                                                                            série:</b></label>
                                                                    <input id="num_serie" name="num_serie" type="text"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Fechar</button>
                                                                    <button type="submit" class="btn btn-primary">Devolver
                                                                        <i class="bi bi-arrow-up"></i></button>
                                                                    <button type="submit" id="imprimir"
                                                                        class="btn btn-warning">Imprimir <i
                                                                            class="bi bi-printer-fill"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Equipamento -->
                                            <div class="modal fade" id="modalEquipamento{{ $equipamento->id }}"
                                                tabindex="-1"
                                                aria-labelledby="modalEquipamentoLabel{{ $equipamento->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="modalEquipamentoLabel{{ $equipamento->id }}">Detalhes
                                                                do Equipamento</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Origem:</strong>
                                                                {{ $equipamento->setorEscola->desc }}</p>
                                                            <p><strong>Tombamento / NS:</strong>
                                                                {{ $equipamento->tombamento }}</p>
                                                            <p><strong>Funcionário Responsável:</strong>
                                                                {{ $equipamento->user->name }}</p>
                                                            <p><strong>Problema:</strong> {{ $equipamento->desc }}</p>
                                                            <p><strong>O que foi feito:</strong>
                                                                {{ $equipamento->solucao }}</p>
                                                            <p><strong>Tipo:</strong>
                                                                {{ $equipamento->tiposEquipamentos->desc }}</p>
                                                            <p><strong>Data da Entrada:</strong>
                                                                {{ \Carbon\Carbon::parse($equipamento->protocolo->data_entrada)->format('d/m/y') }}
                                                            </p>



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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>

        let id;
        $('.abrirModal').click(function() {
            id = $(this).data('equipamento-id');

        });

        $('#imprimir').click(async function() {
            let campos = {
                modelo: $('#modelo').val(),
                marca: $('#marca').val(),
                num_serie: $('#num_serie').val(),
                id_problema: $('#id_problema').val()
            };

            let validador = true;
            for (let key in campos) {
                if (campos[key].trim() === '') {
                    validador = false;
                    break;
                }
            }

            if (validador == true) {
                $(`#modalcriarlaudo${id}`).modal('hide');
                $(`#list-equipamento-${id}`).remove();

                iziToast.success({
                    title: 'Excluído',
                    message: 'Registro excluído com sucesso!',
                });
            }

        });
    </script>
@endsection
