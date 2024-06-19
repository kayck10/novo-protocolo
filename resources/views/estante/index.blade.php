@extends('layout.main')

<style>
    .itens {
        width: 100%;
    }
</style>

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
                    <ul class="nav nav-tabs itens" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">

                          <button class="nav-link tab-estante"  id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" data-status="1" aria-selected="true">Em aberto</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link tab-estante" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" data-status="2" aria-controls="profile" aria-selected="false">Em andamento</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link tab-estante" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" data-status="3" aria-controls="contact" aria-selected="false">Finalizado</button>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-sm-3 offset-md-1 mt-3">
                            <input id="pesquisa" type="text" class="form-control" placeholder="Pesquisa">
                        </div>
                        <div class="col-sm-3 mt-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalFiltros" class="btn btn-outline-dark">Filtros <i class="bi bi-sliders"></i></button>
                        </div>
                    </div>
                    <div class="tab-content mb-5 mt-3 ms-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <h1>teste</h1>
                                <div class="col-12" id="tbody_equipamentos">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <h1>Em andamento</h1>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="col-12">
                                    <h1>Saída</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection

@section('scripts')
<script>
    $('.tab-estante').click(function(){
        let status = $(this).data('status')
        let _token = $('#_token').val();
        $.ajax({
            type: "get",
            url: "{{route('estante.status')}}",
            data: {status, _token},
            success: function (response) {
                $('#tbody_equipamentos').empty()
                $('#tbody_equipamentos').html(response);
                console.log(response)
            }
        });
    })
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection


