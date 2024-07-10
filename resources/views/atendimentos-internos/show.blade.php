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
                    <li class="breadcrumb-item active"><a href="{{ route('atendimento-interno.index') }}">Atendimento Interno</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('create.protocolo') }}">Cadastrar Atendimento</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Protocolo Cadastrado</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12 mx-auto p-5">
                            <div class="form-group">
                                <label class="form-label">Técnico:<i class="fa fa-asterisk text-danger"></i></label>
                                <p class="form-control-plaintext">{{ $tecnicos->firstWhere('id', $atendimento->id_user)->name }}</p>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Setor:<i class="fa fa-asterisk text-danger"></i></label>
                                <p class="form-control-plaintext">{{ $setores->firstWhere('id', $atendimento->id_local)->desc }}</p>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data:<i class="fa fa-asterisk text-danger"></i></label>
                                <p class="form-control-plaintext">{{ $atendimento->data }}</p>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Problema:<i class="fa fa-asterisk text-danger"></i></label>
                                <p class="form-control-plaintext">{{ $atendimento->desc_problema }}</p>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Solução:<i class="fa fa-asterisk text-danger"></i></label>
                                <p class="form-control-plaintext">{{ $atendimento->solucao }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
