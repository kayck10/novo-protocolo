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
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modalEquipamento{{ $equipamento->id }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                            <button class="btn btn-primary"><i class="bi bi-pencil-square"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalEquipamento{{ $equipamento->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-list-columns"></i> Dados do Equipamento</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="font-weight-bold">
                                                        <p>Origem: {{ $equipamento->setorEscola->desc }}</p>
                                                        <p>Funcionário Responsável: </p>
                                                        <p>Tombamento / NS: {{ $equipamento->tombamento }}</p>
                                                        <p>Problema: {{ $equipamento->desc }}</p>
                                                        <p>O que foi feito: {{ $equipamento->solucao }}</p>
                                                        <p>Tipo: {{ $equipamento->tiposEquipamentos->desc}}</p>
                                                        <p>Data Entrada: </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
@endsection
