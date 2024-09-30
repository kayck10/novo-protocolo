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
                    <li class="breadcrumb-item active"><a href="">Editar Atendimento</a></li>
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
                        <form action="{{ route('atendimento-interno.update', $atendimento->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-12 mx-auto p-5">
                                <div>
                                    <div class="form-group">
                                        <label class="form-label">Técnico:<i class="fa fa-asterisk text-danger"></i></label>
                                        <select name="id_user" class="form-control">
                                            <option value="">Selecione um Técnico</option>
                                            @foreach ($tecnicos as $tecnico)
                                                <option value="{{ $tecnico->id }}" @if($tecnico->id == $atendimento->id_user) selected @endif>
                                                    {{ $tecnico->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Setor:<i class="fa fa-asterisk text-danger"></i></label>
                                        <select name="id_local" class="form-control">
                                            <option value="">Selecione um Setor</option>
                                            @foreach ($setores as $setor)
                                                <option value="{{ $setor->id }}" @if($setor->id == $atendimento->id_local) selected @endif>
                                                    {{ $setor->desc }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label class="form-label">Data:<i class="fa fa-asterisk text-danger"></i></label>
                                            <input name="data" class="datepicker-default form-control" value="{{ \Carbon\Carbon::parse($atendimento->data)->translatedFormat('d\ M, Y') }}" id="datepicker1">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Problema:<i class="fa fa-asterisk text-danger"></i></label>
                                            <textarea name="desc_problema" class="form-control" rows="3">{{ $atendimento->desc_problema }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Solução:<i class="fa fa-asterisk text-danger"></i></label>
                                            <textarea name="solucao" class="form-control" rows="3">{{ $atendimento->solucao }}</textarea>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto mt-5">
                                        <button type="submit" class="btn btn-primary">Editar <i class="bi bi-pencil-square"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
