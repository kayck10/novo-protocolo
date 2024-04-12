@extends('layout.main')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6">
            <div class="welcome-text">
                <h4>Participações por Funcionários</h4>
                <span class="mb-0">Acompanhamento da Média de trabalho por Fucionário</span>
            </div>
        </div>
        <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gráficos</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Participações</a></li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Gradient Bar Chart</h4>
        </div>
        <div class="card-body">
            <canvas id="barChart_2"></canvas>
        </div>
    </div>
</div>
@endsection
