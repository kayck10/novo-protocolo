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
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#modalcriarlaudo{{ $equipamento->id }}"
                                                            data-equipamento-id="{{ $equipamento->id }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                <button class="btn btn-warning">
                                                    <i class="bi bi-eye-fill" data-bs-toggle="modal"
                                                    data-bs-target="#modalmostrardados{{ $equipamento->id }}"
                                                    data-equipamento-id="{{ $equipamento->id }}"></i>
                                                </button>
                                                </td>
                                                <td class="center">
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
