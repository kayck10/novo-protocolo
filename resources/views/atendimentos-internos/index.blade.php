@extends('layout.main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Listagem  de Atendimentos Internos</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Professors</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">All Professors</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Listagem de Protocolos</h4>
                        </div>
                        <div class="card-body">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Setor</th>
                                            <th>Técnico</th>
                                            <th>Data</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($atendimentos as $atendimento)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$atendimento->setor->desc}}</td>
                                            <td>{{ $atendimento->tecnico ? $atendimento->tecnico->name : 'N/A' }}</td>
                                            <td>{{ $atendimento->data }}</td>
                                            <td>
                                                <a href="{{route('atendimentointerno.show', $atendimento->id)}}">   <button type="button" class="btn btn-sm btn-primary mx-1"{{ $atendimento->id }}">
                                                   <i class="bi bi-eye"></i>
                                                </button></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
