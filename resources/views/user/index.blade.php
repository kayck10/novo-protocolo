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
                              <a class="btn btn-light" href="{{route('user.show', $user->id)}}">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span class="mb-0">Perfil</span>
                                        <strong class="text-muted"><i class="bi bi-arrow-right-short"></i></strong>
                                    </li>
                                </a>
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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    @endsection
