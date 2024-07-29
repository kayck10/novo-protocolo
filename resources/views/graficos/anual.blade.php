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
                <h4>Média de Trabalho Anual - </h4>
                <span class="">Número de Atendimentos e Consertos</span>
            </div>
        </div>
        <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gráficos</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Anual</a></li>
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('myChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                        datasets: [
                            {
                                label: 'Atendimentos',
                                data: [30, 25, 35, 20, 30, 40, 50, 45, 30, 25, 20, 30],
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Consertos',
                                data: [20, 15, 25, 10, 20, 30, 40, 35, 20, 15, 10, 20],
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Inspeções',
                                data: [10, 20, 15, 25, 10, 20, 30, 25, 10, 20, 25, 15],
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
