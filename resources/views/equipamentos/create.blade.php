@extends('layout.main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Cadastrar Equipamento</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('create.equipamento') }}">Criação de
                        equipamanetos</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Cadastrar Equipamento</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.equipamento') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 mx-auto p-5">

                            <div class="form-group">
                                <label class="form-label">Equipamento:<i class="fa fa-asterisk text-danger"></i></label>
                                <input type="text" name="equipamento" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Problemas:<i class="fa fa-asterisk text-danger"></i></label>
                                <input type="text" name="problemas" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Imagem:<i class="fa fa-asterisk text-danger"></i></label>
                                <input type="file" name="imagem" class="form-control" required>
                            </div>

                            <div class="d-grid gap-2 col-6 mx-auto mt-5">
                                <button type="submit" class="btn btn-primary">Cadastrar <i class="bi bi-check color-white"></i> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
