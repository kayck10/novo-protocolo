@extends('layout.main')

@section('content')

<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Cadastrar Protocolo de Entrada de Equipamento</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{route('index.protocolo')}};">Protocolos de Entrada</a></li>
                <li class="breadcrumb-item active"><a href="{{route('create.protocolo')}}">Cadastrar Protocolo</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Cadastrar Protocolo</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="col-12 mx-auto p-5">
                            <div>
                                <div class="form-group">
                                    <label class="form-label">Origem:<i class="fa fa-asterisk text-danger"></i></label>
                                    <select class="form-control">
                                        <option value="Gender">Selecione uma Escola | Prédio</option>
                                    </select>
                                </div>
                           	<div>
											<div class="form-group">
												<label class="form-label">Data:<i class="fa fa-asterisk text-danger"></i></label>
												<input name="datepicker" class="datepicker-default form-control" id="datepicker1">
											</div>


							</div>
                            <div class="d-grid gap-2 col-6 mx-auto mt-5 ">
                                <button type="submit" class="btn btn-primary">Cadastrar <i class="bi bi-check color-white"></i> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
