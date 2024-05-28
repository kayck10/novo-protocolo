@extends('layout.main')

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
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
                            <div class="external-event" data-class="bg-danger"><i class="fa fa-move"></i>Prioridade</div>
                            <div class="external-event" data-class="bg-success"><i class="fa fa-move"></i>Concluído</div>
                            <div class="external-event" data-class="bg-primary"><i class="fa fa-move"></i>Em Aberto</div>
                            <div class="external-event" data-class="bg-warning"><i class="fa fa-move"></i>Em Andamento</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Category -->
    <div class="modal fade none-border" id="add-category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Adicionar Categoria</strong></h4>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN MODAL -->
    <div class="modal fade none-border" id="event-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">
                        <strong>Agendar Atendimento <i class="bi bi-calendar3"></i>
                        </strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Escola:</label>
                        <select id="id_local" class="form-control">
                            <option value="">Selecione uma Escola</option>
                            @foreach ($escolas as $escola)
                                <option value="{{ $escola->id }}">{{ $escola->desc }}</option>
                            @endforeach
                        </select>
                        <div class="form-check mt-3">
                            <label class="form-check-label" for="flexCheckDefault">Prioridade?</label>
                            <input class="form-check-input mx-2" type="checkbox" id="prioridade" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Data:</label>
                        <input name="datepicker" id="data_entrada" class="datepicker-default form-control" id="datepicker1">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Problema:</label>
                        <input class="form-control" type="text" name="desc_problema" id="desc_problema">
                    </div>
                    <p id="selected-date"></p>
                </div class="modal-footer">
                <button type="submit" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success save-event waves-effect waves-light" onclick="changeEvent()">Criar Evento</button>
            </div>
        </div>
    </div>

    <script>
        function changeEvent() {
            let local = $('#id_local').val();
            let prioridade = $('#prioridade').is(':checked');
            let problema = $('#desc_problema').val();
            let data_entrada = $('#data_entrada').val();
            $.ajax({
                type: "POST",
                url: "{{ route('atendimento.store') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'local': local,
                    'prioridade': prioridade,
                    'problema': problema,
                    'data_entrada': data_entrada,
                },
                success: function(response) {
                    iziToast.success({
                        title: 'Cadastrado',
                        message: 'Atendimento cadastrado com sucesso!',
                    });
                    $('#event-modal').modal('hide');
                    calendar.refetchEvents(); // Atualizar o calendário para mostrar o novo evento
                    console.log(response.error)
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 500) {
                    iziToast.error({
                        title: 'Erro',
                        message: `Status: Voce nao permissao!`,
                    });
                }
                console.log("Erro na requisição AJAX:", textStatus, errorThrown);
            })
        }

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                events: @json($eventos->map(function($evento) {
                    return [
                        'title' => $evento->desc_problema,
                        'start' => $evento->data,
                        // Adicione outros atributos conforme necessário
                    ];
                })),
                dateClick: function(info) {
                    document.getElementById('selected-date').innerText = info.dateStr;
                    $('#event-modal').modal('show');
                },
            });

            calendar.render();
        });
    </script>
@endsection
