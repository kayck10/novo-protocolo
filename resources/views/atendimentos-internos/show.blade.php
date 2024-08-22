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
                    <li class="breadcrumb-item active"><a href="">Ver Atendimento</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Atendimento Cadastrado</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12 mx-auto p-5">
                            <div class="form-group">
                                <label class="form-label">Técnico:<i class="fa fa-asterisk text-danger"></i></label>
                                <input type="text" class="form-control" value="{{ $tecnicos->firstWhere('id', $atendimento->id_user)->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Setor:<i class="fa fa-asterisk text-danger"></i></label>
                                <input type="text" class="form-control" value="{{ $setores->firstWhere('id', $atendimento->id_local)->desc }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data:<i class="fa fa-asterisk text-danger"></i></label>
                                <input type="text" class="form-control" value="{{ $atendimento->data }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Problema:<i class="fa fa-asterisk text-danger"></i></label>
                                <textarea class="form-control" rows="3" readonly>{{ $atendimento->desc_problema }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Solução:<i class="fa fa-asterisk text-danger"></i></label>
                                <textarea class="form-control" rows="3" readonly>{{ $atendimento->solucao }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
