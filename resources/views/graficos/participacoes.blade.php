@extends('layout.main')

@section('content')
<style>
    .hide{
        display: none;
    }
</style>

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6">
            <div class="welcome-text">
                <h4>Participações por Funcionários</h4>
                <span class="">Acompanhamento da Média de trabalho por Fucionário</span>
            </div>
        </div>
        <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gráficos</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Participações</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="morris_bar" class="morris_chart_height"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 hide">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Donught Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="morris_donught" class="morris_chart_height"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 hide">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Line Chart</h4>
                        </div>
                        <div class="card-body p-0">
                            <div id="morris_line" class="morris_chart_height"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 hide" hide>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="morris_bar" class="morris_chart_height"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 hide">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Line Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="line_chart_2" class="morris_chart_height"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
