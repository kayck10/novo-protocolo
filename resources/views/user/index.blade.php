@extends('layout.main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Lista de Usuários</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('atendimento-interno.index') }};">Usuários</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('create.protocolo') }}">Ver Todos</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="container">
            @php
                $count = 0;
            @endphp
            <div class="row">
                @foreach ($users as $user)
                    @php
                        $count++;
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="text-center p-4 overlay-box" style="background-color: blue;">
                                <h3 class="mt-3 mb-1 text-white"></h3>
                                <p class="text-white mb-0">{{ $user->name }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0">Atendimentos Internos</span>
                                    <strong class="text-muted">1204</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0">Atendimentos a Escolas</span>
                                    <strong class="text-muted">1204</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0">Consertos de Máquinas</span>
                                    <strong class="text-muted">1204</strong>
                                </li>
                                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-light">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span class="mb-0">Perfil</span>
                                        <strong class="text-muted"><i class="bi bi-arrow-right-short"></i></strong>
                                    </li>
                                </button>
                            </ul>
                        </div>
                    </div>



                    @if ($count % 3 == 0)
            </div>
            <div class="row">
                @endif
                @endforeach
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Informações do Usuário</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="">
                            @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mb-4">
                                <div class="">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="form6Example1">Nome:</label>
                                        <input type="text" name="name" id="form6Example1" class="form-control" />
                                    </div>
                                </div>

                            </div>

                            <!-- Text input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Usuário:</label>
                                <input type="text" name="usuario" id="form6Example3" class="form-control" />
                            </div>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form6Example5">E-mail:</label>
                                <input type="email" name="email" id="form6Example5" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label class="form-label">Função:</label>
                                <select name="id_funcoes" class="form-control">
                                    <option value="Gender">Selecione uma Função</option>

                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Editar</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    @endsection
