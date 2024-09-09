@extends('layout.main')

@section('content')
<style>
    .hide {
        display: none;
    }
</style>

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6">
            <div class="welcome-text">
                <h4>Média de Trabalho Anual - {{ date('Y') }}</</h4>
                <span class="">Número de Atendimentos e Consertos</span>
            </div>
        </div>
        <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gráficos</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Inservíveis</a></li>
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
                            <h4 class="card-title">Produção de laudos para equipamentos inservíveis - 2024</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('myChart').getContext('2d');
                const dadosPorAno = @json($dadosPorAno);

                const datasets = [];
                for (const [ano, dados] of Object.entries(dadosPorAno)) {
                    datasets.push({
                        label: `Inservíveis - ${ano}`,
                        data: Object.values(dados),
                        borderWidth: 1,
                    });
                }

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                        datasets: datasets
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    </div>
</div>
@endsection
