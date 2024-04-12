@extends('layout.main')

@section('content')
<style>
    .zoom {

  transition: transform .1s;

}
.zoom:hover {

  transform: scale(1.1);
}
</style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-primary">
                    <div class="card-body">
                        <div class="media">
                            <span class="mr-3">
                                <i class="bi bi-calendar2-check zoom"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Atendimentos a Escolas</p>
                                <h3 class="text-white">3280</h3>
                                <div class="progress mb-2 bg-white">
                                    <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                </div>
                                <small>Mais Informações</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-warning">
                    <div class="card-body">
                        <div class="media">
                            <span class="mr-3">
                                <i class="la la-building zoom"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Atendimentos Internos</p>
                                <h3 class="text-white">245</h3>
                                <div class="progress mb-2 bg-white">
                                    <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                </div>
                                <small>Mais Informações</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-secondary">
                    <div class="card-body">
                        <div class="media">
                            <span class="mr-3">
                                <i class="bi bi-box-seam-fill zoom"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Laudos de Inservível</p>
                                <h3 class="text-white">28</h3>
                                <div class="progress mb-2 bg-white">
                                    <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                                </div>
                                <small>Mais Informações</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-danger">
                    <div class="card-body">
                        <div class="media">
                            <span class="mr-3">
                                <i class="bi bi-journal-check zoom"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Protocolos Finalizados</p>
                                <h3 class="text-white">25160$</h3>
                                <div class="progress mb-2 bg-white">
                                    <div class="progress-bar progress-animated bg-light" style="width: 30%"></div>
                                </div>
                                <small>Mais Informações</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-lg-6 col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Atividades do Mês</h4>
                </div>
                <div class="card-body">
                    <canvas id="pie_chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Status das Máquinas</h4>
                </div>
                <div class="card-body">
                    <canvas id="doughnut_chart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
