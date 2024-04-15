@extends('layout.main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Atendimento Interno</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('atendimento-interno.index') }};">Usuário
                            Interno</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('create.protocolo') }}">Cadastrar Usuário </a>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Cadastrar Usuário <i class="bi bi-person-add"></i></h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="col-12 mx-auto p-5">
                                <div>

                                    <div>
                                        <form>
                                            <!-- 2 column grid layout with text inputs for the first and last names -->
                                            <div class="row mb-4">
                                                <div class="">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form6Example1">Nome:</label>
                                                        <input type="text" id="form6Example1" class="form-control" />
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Text input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="form6Example3">Usuário:</label>
                                                <input type="text" id="form6Example3" class="form-control" />
                                            </div>

                                            <!-- Email input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="form6Example5">E-mail:</label>
                                                <input type="email" id="form6Example5" class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Função:</label>
                                                <select class="form-control">
                                                    <option value="Gender">Selecione uma Função</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Setor:<i></i></label>
                                                <select class="form-control">
                                                    <option value="Gender">Selecione um tipo de perfil</option>
                                                </select>
                                            </div>
                                            <div class="d-grid gap-2 col-6 mx-auto mt-5">
                                                <button type="submit" class="btn btn-primary">Cadastrar <i
                                                        class="bi bi-check color-white"></i> </button>
                                            </div>
                                          </form>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
