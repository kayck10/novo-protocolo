    @extends('layout.main')

    @section('content')
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
                                                <th class="center">Data </th>
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
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalEquipamento{{ $equipamento->id }}">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </button>
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
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
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="font-weight-bold">
                                                                    <p>Origem: {{ $equipamento->setorEscola->desc }}</p>
                                                                    <p>Tombamento / NS: {{ $equipamento->tombamento }}</p>
                                                                    <p>Tipo: {{ $equipamento->tiposEquipamentos->desc }}
                                                                    </p>
                                                                </div>
                                                                <form action="{{ route('gerar.pdf') }}" target="_blank" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id_equipamento" value="{{ $equipamento->id }}">
                                                                    <div class="form-group">
                                                                        <label class="form-label"><b>Problema:</b></label>
                                                                        <select name="id_problema" class="form-control" required>
                                                                            <option value="">Selecione um Problema</option>
                                                                            @foreach ($problemas as $problema)
                                                                                <option value="{{ $problema->id }}">{{ $problema->desc }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label"><b>Marca:</b></label>
                                                                        <input name="marca" type="text" class="form-control" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label"><b>Modelo:</b></label>
                                                                        <input name="modelo" type="text" class="form-control" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label"><b>Número de série:</b></label>
                                                                        <input name="num_serie" type="text" class="form-control" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                                                        <button type="submit" class="btn btn-primary">Devolver <i class="bi bi-arrow-up"></i></button>
                                                                        <button type="submit" class="btn btn-warning">Imprimir <i class="bi bi-printer-fill"></i></button>
                                                                    </div>
                                                                </form>
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
        <script>


                const marca = document.querySelector('input[name="marca"]').value.trim();
                const modelo = document.querySelector('input[name="modelo"]').value.trim();
                const num_serie = document.querySelector('input[name="num_serie"]').value.trim();

                if (!marca || !modelo || !num_serie) {
                    alert("Por favor, preencha todos os campos.");
                    return false;
                }

                return true;
            }

            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('[data-bs-target^="#modalcriarlaudo"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        var equipamentoId = button.getAttribute('data-equipamento-id');
                        var inputHidden = document.querySelector(
                            `#modal-event-click-id${equipamentoId}`);
                        inputHidden.value = equipamentoId;
                    });
                });
            });
        </script>
    @endsection
