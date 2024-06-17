@extends('layout.main')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Estante</li>
    </ol>
    <h6 class="font-weight-bolder text-white mb-0">Estante</h6>


    <style>
        .back-btn {
            background-color: #024f9b;
        }
    </style>

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Estante de Equipamentos</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">Estante de Equipamentos</a></li>
                    <li class="breadcrumb-item active"><a href="">Cadastrar Usuário</a></li>
                </ol>
            </div>
        </div>
        <input type="hidden" id="_token" value="{{ csrf_token() }}">

        <div class="row mb-5">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mx-auto">

            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mx-auto">

            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mx-auto">

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                      </div>
                    <div class="row">
                        <div class="col-sm-3 offset-md-1 mt-3">
                            {{-- PESQUISA --}}
                            <input id="pesquisa" type="text" class="form-control" placeholder="Pesquisa">
                        </div>
                        <div class="col-sm-3 mt-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalFiltros" class="btn btn-outline-dark">Filtros <i class="bi bi-sliders"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>

                            </thead>
                            <tbody>
                                @foreach($equipamentos as $equipamento)
                                    <tr>
                                        <td>{{ $equipamento->id }}</td>
                                        <td>{{ $equipamento->nome }}</td>
                                        <td>{{ $equipamento->descricao }}</td>
                                        <td>{{ $equipamento->status->nome }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Filtros -->
    <div class="modal fade" id="modalFiltros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Filtros</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-6 mt-3">
                        {{-- ANO --}}
                        <div class="form-group">
                            <select class="form-control ano">
                                <option>Selecione o ano</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="0">Todos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-4">
                        {{-- STATUS --}}
                        <div class="form-group">
                            <select class="form-control status">
                                <option>Selecione o status</option>
                                <option value="1">Em aberto</option>
                                <option value="2">Em andamento</option>
                                <option value="3">Saída</option>
                                <option value="0">Todos</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button id="filtro" type="button" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </div>
    </div>




@endsection
