    @extends('layout.main')

    @section('content')
        <div class="row">
            <div class="col-lg-8 offset-1">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar" class="app-fullcalendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
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
        </div>

        <!-- Modal Add Category -->
        <div class="modal fade none-border overflowh" id="add-category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Adicionar Categoria</strong></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade event-modal" id="event-modal" tabindex="-1" aria-labelledby="eventModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered overflowh">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">
                            <strong>Agendar Atendimento <i class="bi bi-calendar3"></i>
                            </strong>
                        </h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
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
                            <input name="datepicker" id="data_entrada" class="datepicker-default form-control"
                                id="datepicker1">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Problema:</label>
                            <input class="form-control" type="text" name="desc_problema" id="desc_problema">
                        </div>
                        <p id="selected-date"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success save-event waves-effect waves-light"
                            onclick="changeEvent()">Criar Evento</button>
                    </div>
                </div>
            </div>
        </div>
                <!-- Modal finalizar -->

            <div class="modal fade event-modal" id="event-modal-click" tabindex="-1" aria-labelledby="eventModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel">Detalhes do Evento</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Escola:</label>
                                <p id="modal-event-click-escola"></p> <!-- Aqui será mostrado o nome da escola -->
                            </div>
                            <div class="form-group">
                                <label class="form-label"><b>Atribuir a um funcionário</b></label>
                                <select name="id_user" class="form-control" id="select-tecnicos">
                                    <option>Selecione um Técnico</option>
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p><b>Data:</b> <span id="modal-event-click-date"></span></p>
                            <p><b>Problema:</b> <span id="modal-event-click-desc"></span></p>
                            <div class="form-group">
                                <label class="form-label">Solução:</label>
                                <textarea class="form-control" name="solucao" id="solucao" cols="20" rows="2"></textarea>
                            </div>
                            <!-- Input hidden para armazenar o ID do atendimento -->
                            <input type="hidden" id="modal-event-click-id" name="atendimento_id">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-warning text-light" onclick="deleteEvent()" data-dismiss="modal">Excluir <i
                                    class="bi bi-trash3-fill"></i></button>
                            <button type="submit" class="btn btn-info text-light" data-dismiss="modal">Salvar <i
                                    class="bi bi-floppy-fill"></i></button>
                            <button type="submit" class="btn btn-success text-light" onclick="finalizeEvent()"
                                data-dismiss="modal">Finalizar <i class="bi bi-check2-circle"></i></button>
                        </div>
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
                        }
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status == 500) {
                            iziToast.error({
                                title: 'Erro',
                                message: 'Status: Você não tem permissão!',
                            });
                        }
                        console.log("Erro na requisição AJAX:", textStatus, errorThrown);
                    });
                }

                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');

                    // Carrega os eventos do backend com id_status
                    var events = {!! json_encode(
                        $eventos->map(function ($evento) {
                            return [
                                'id' => $evento->id,
                                'title' => $evento->desc_problema,
                                'start' => $evento->data,
                                'id_status' => $evento->id_status, // Certifique-se de que o status está sendo retornado
                                'extendedProps' => [
                                    'desc' => $evento->desc_problema,
                                    'escola' => $evento->local->desc, // Supondo que a relação esteja corretamente definida no model
                                ],
                            ];
                        }),
                    ) !!};

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        locale: 'pt-br',
                        events: events.map(event => {
                            // Aplica cor verde para eventos com id_status = 3
                            if (event.id_status === 3) {
                                event.backgroundColor = '#28a745'; // Cor verde
                                event.borderColor = '#28a745'; // Borda verde
                            }
                            return event;
                        }),
                        dateClick: function(info) {
                            document.getElementById('selected-date').innerText = info.dateStr;
                            $('#event-modal').modal('show');
                        },

                        eventClick: function(info) {
                            // Exibir informações do evento na modal
                            $('#modal-event-click-id').val(info.event.id);
                            $('#modal-event-click-date').html(info.event.start.toISOString().split('T')[0]);
                            $('#modal-event-click-desc').html(info.event.extendedProps.desc);
                            $('#modal-event-click-escola').html(info.event.extendedProps
                                .escola); // Exibe o nome da escola
                            $('#event-modal-click').modal('show');
                        },
                    });

                    calendar.render();
                });


                function finalizeEvent() {
                    let atendimentoId = $('#modal-event-click-id').val();
                    if (!atendimentoId) {
                        iziToast.error({
                            title: 'Erro',
                            message: 'ID do atendimento não encontrado!',
                        });
                        return;
                    }

                    let userId = $('#select-tecnicos').val();
                    let solucao = $('#solucao').val();

                    console.log("Finalizando evento com ID:", atendimentoId);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('atendimento.finalize') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'id': atendimentoId,
                            'id_user': userId,
                            'solucao': solucao
                        },
                        success: function(response) {
                            iziToast.success({
                                title: 'Finalizado',
                                message: 'Atendimento finalizado com sucesso!',
                            });

                            let event = calendar.getEventById(atendimentoId);
                            if (event) {
                                event.setProp('backgroundColor',
                                    '#28a745');
                                event.setExtendedProp('status',
                                    'finalizado');
                            }

                            $('#event-modal-click').modal('hide');
                            calendar.refetchEvents();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            iziToast.error({
                                title: 'Erro',
                                message: 'Ocorreu um erro ao tentar finalizar o atendimento. Verifique os dados e tente novamente.',
                            });
                            console.log("Erro na requisição AJAX:", textStatus, errorThrown);
                        }
                    });
                }

                function deleteEvent() {
                    let atendimentoId = $('#modal-event-click-id').val();
                    if (!atendimentoId) {
                        iziToast.error({
                            title: 'Erro',
                            message: 'ID do atendimento não encontrado!',
                        });
                        return;
                    }

                    $.ajax({
                        type: "POST",
                        url: "{{ route('atendimento.delete') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'id': atendimentoId
                        },
                        success: function(response) {
                            iziToast.error({
                                title: 'Excluído',
                                message: 'Atendimento excluído com sucesso!',
                            });

                            let event = calendar.getEventById(atendimentoId);
                            if (event) {
                                event.remove(); // Remove o evento do calendário
                            }

                            $('#event-modal-click').modal('hide');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            iziToast.error({
                                title: 'Erro',
                                message: 'Ocorreu um erro ao tentar excluir o atendimento. Tente novamente.',
                            });
                            console.log("Erro na requisição AJAX:", textStatus, errorThrown);
                        }
                    });
                }
            </script>
        @endsection
