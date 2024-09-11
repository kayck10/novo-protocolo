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
                            <p class="mb-1">Atendimento a Escolas </p>
                            <h3 class="text-white">{{ $interno }}</h3>
                            <div class="progress mb-2 bg-white">
                                <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                            </div>
                            <small><a class="text-light" href="{{ route('atendimento.escola') }}">Mais Informações</a></small>
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
                            <h3 class="text-white">{{ $externo }}</h3>
                            <div class="progress mb-2 bg-white">
                                <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                            </div>
                            <small><a class="text-light" href="{{ route('atendimento-interno.index') }}">Mais Informações</a></small>
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
                            <h3 class="text-white">{{ $inserviveisCount }}</h3>
                            <div class="progress mb-2 bg-white">
                                <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                            </div>
                            <small><a class="text-light" href="{{ route('inservivel.index') }}">Mais Informações</a></small>
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
                            <h3 class="text-white">{{$finalizados}}</h3>
                            <div class="progress mb-2 bg-white">
                                <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                            </div>
                            <small><a class="text-light" href="{{ route('estante.index') }}">Mais Informações</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mantendo os dois gráficos -->
    <div class="row p-2">
        <div class="col-lg-6 col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Atividades do mês</h4>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Gráfico de Atividades do Mês
        const ctxPie = document.getElementById('pie_chart').getContext('2d');
        const pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Atendimento a Escolas', 'Atendimentos Internos', 'Laudos de Inservível', 'Protocolos Finalizados'],
                datasets: [{
                    data: [{{ $interno }}, {{ $externo }}, {{ $inserviveisCount }}, {{ $finalizados }}],
                    backgroundColor: ['#007bff', '#ffc107', '#6c757d', '#dc3545'],
                    borderColor: ['#007bff', '#ffc107', '#6c757d', '#dc3545'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });


    });
</script>

@endsection
