@extends('layout.main')

@section('content')
<style>
    .hide {
        display: none;
    }
    #myChart {
        height: 400px; /* Ajuste a altura conforme necessário */
    }
</style>

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6">
            <div class="welcome-text">
                <h4>Número de Atendimentos e Consertos - {{ date('Y') }}</</h4>
            </div>
        </div>
        <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gráficos</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Participaçõees</a></li>
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
                const usuarios = @json($usuarios);

                const nomes = usuarios.map(usuario => usuario.name);
                const atendimentos = usuarios.map(usuario => usuario.atendimentos);
                const consertos = usuarios.map(usuario => usuario.consertos);
                const inspeções = usuarios.map(usuario => usuario.inspecoes);

                const ctx = document.getElementById('myChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: nomes,
                        datasets: [
                            {
                                label: 'Atendimentos Internos',
                                data: atendimentos,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Máquinas',
                                data: consertos,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Escolas',
                                data: inspeções,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }
                        ]
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
