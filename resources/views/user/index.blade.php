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

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                @foreach ($users as $user)



                    <div class="card">
                        <div class="">
                                <div class="text-center p-4 overlay-box" style="background-color:blue;">
                                    <div class="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white"></h3>
                                    <p class="text-white mb-0">{{ $user->name }}</p>
                                    @foreach ($funcoes as $funcao)
                                    <p class="text-white mb-0"></p>
                                    @endforeach

                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Atendimentos Internos</span> <strong class="text-muted">1204
                                        </strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Atendimentos a Escolas</span> <strong class="text-muted">2540
                                        </strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Consertos em Máquinas</span> <strong
                                            class="text-muted">2540</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span
                                            class="mb-0">Perfil</span> <strong class="text-muted">2540</strong></li>
                                </ul>
                            </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
