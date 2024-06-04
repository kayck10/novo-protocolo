@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Usuário Cadastrado</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">Usuário</a></li>
                    <li class="breadcrumb-item active"><a href="">Cadastrar Usuário</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Usuário Cadastrado <i class="bi bi-person-add"></i></h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12 mx-auto p-5">
                            <div>
                                <div>
                                    <form id="user-form" action="{{ route('user.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="name">Nome:</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" readonly />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="usuario">Usuário:</label>
                                                    <input type="text" name="usuario" id="usuario" class="form-control" value="{{ $user->usuario }}" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="email">E-mail:</label>
                                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="tipo_usuario">Tipo de Usuário:</label>
                                                    <input type="text" name="tipo_usuario" id="tipo_usuario" class="form-control" value="{{ $user->tipoUsuario->desc }}" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="funcao">Função:</label>
                                                    <input type="text" name="funcao" id="funcao" class="form-control" value="{{ $user->funcao->desc }}" readonly />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="situacao">Situação:</label>
                                                    <input type="text" name="situacao" id="situacao" class="form-control" value="{{ $user->situacao }}" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary mt-3" id="edit-button">Editar <i class="bi bi-pencil-square"></i></button>
                                        <button type="submit" class="btn btn-warning mt-3">Resetar Senha <i class="bi bi-arrow-clockwise"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('edit-button').addEventListener('click', function() {
            var inputs = document.querySelectorAll('#user-form input');
            inputs.forEach(function(input) {
                input.removeAttribute('readonly');
            });
        });
    </script>
@endsection
