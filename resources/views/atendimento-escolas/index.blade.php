@extends('layout.main')

@section('content')
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Calendário de Atendimento às Escolas</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Atendimento às Escolas</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <input type="text" id="responsavel">
                        <input type="date" id="data">
                        <div id="calendar" class="app-fullcalendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-intro-title">Calendário <i class="bi bi-calendar-week-fill"></i></h4>

                        <div class="">
                            <div id="external-events" class="my-3">
                                <p>Adicione o Atendimento a Escola</p>
                                <div class="external-event" data-class="bg-danger"><i class="fa fa-move"></i>Prioridade
                                </div>
                                <div class="external-event" data-class="bg-success"><i class="fa fa-move"></i>Concluído
                                </div>
                                <div class="external-event" data-class="bg-primary"><i class="fa fa-move"></i>Em Aberto
                                </div>
                                <div class="external-event" data-class="bg-warning"><i class="fa fa-move"></i>Em Andamento
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN MODAL -->
            <div class="modal fade none-border" id="event-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><strong>Agendar Atendimento</strong></h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Criar
                                Evento</button>

                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                                data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        locale: 'pt-br',
                        eventClick: function(info) {
                            changeEvent();

                            // change the border color just for fun
                            info.el.style.borderColor = 'red';
                        },

                        events: [{
                                title: 'simple event',
                                start: '2024-04-02'
                            },
                            {
                                title: 'event with URL',
                                start: '2024-04-03'
                            }
                        ]
                    });

                    calendar.render();


                    function changeEvent() {
                        let resp = $('#responsavel').val();
                        let data = $('#data').val();
                        $.ajax({
                            type: "POST",
                            url: "{{ route('atendimento.store') }}", // Altere para o URL apropriado
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                'resp': resp,
                                'date': data
                            },
                            success: function(response) {
                                console.log(response.error)
                            }
                        }).done(function() {
                            // Esta função é chamada quando a requisição AJAX é bem-sucedida
                            // alert("tudo certo");
                        }).fail(function(jqXHR, textStatus, errorThrown) {
                            // Esta função é chamada quando a requisição AJAX falha
                            console.log("Erro na requisição AJAX:", textStatus, errorThrown);
                        })
                    }
                });
            </script>

            <!-- Modal Add Category -->
            <div class="modal fade none-border" id="add-category">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><strong>Adicionar Categoria</strong></h4>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
