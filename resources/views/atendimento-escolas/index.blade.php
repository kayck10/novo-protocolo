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



        <!-- Modasl cadastro atendimento-->

        <div class="modal fade event-modal" id="event-modal" tabindex="-1" aria-labelledby="eventModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content shadow-lg rounded">
                    <div class="modal-header text-white">
                        <h5 class="modal-title" id="eventModalLabel">
                            <strong>Agendar Atendimento <i class="bi bi-calendar3"></i></strong>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Escola -->
                        <div class="form-group mb-3">
                            <label for="id_local" class="form-label"><strong>Escola:</strong></label>
                            <select id="id_local" class="form-control">
                                <option value="">Selecione uma Escola</option>
                                @foreach ($escolas as $escola)
                                    <option value="{{ $escola->id }}">{{ $escola->desc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-check form-switch mb-3 ms-3"> <!-- Usando um switch para melhorar a usabilidade -->
                            <input class="form-check-input" type="checkbox" id="prioridade" name="prioridade">
                            <label class="form-check-label" for="prioridade">Prioridade?</label>
                        </div>

                        <!-- Data -->
                        <div class="form-group mb-3">
                            <label for="data_entrada" class="form-label"><strong>Data:</strong></label>
                            <input type="text" name="datepicker" id="data_entrada"
                                class="form-control datepicker-default" placeholder="Selecione a data">
                        </div>

                        <!-- Problema -->
                        <div class="form-group mb-3">
                            <label for="desc_problema" class="form-label"><strong>Problema:</strong></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="desc_problema"
                                    placeholder="Descreva o problema">
                                <span class="btn btn-secondary btn-sm" onclick="novoProblema()"><i
                                        class="bi bi-plus-circle"></i></span>
                            </div>
                        </div>
                        <div class="col-md-12" id="to-do-list"></div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success save-event" onclick="changeEvent()">Criar
                            Evento</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal finalizar -->

        <div class="modal fade event-modal" id="event-modal-click" tabindex="-1" aria-labelledby="eventModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content shadow-lg rounded">
                    <div class="modal-header text-white">
                        <h5 class="modal-title" id="eventModalLabel">
                            <strong>Detalhes do Evento</strong>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Escola -->
                        <div class="form-group mb-3">
                            <label for="modal-event-click-escola" class="form-label"><strong>Escola:</strong></label>
                            <p id="modal-event-click-escola" class="form-control-plaintext"></p>
                        </div>

                        <!-- Atribuir Técnico -->
                        <div class="form-group mb-3">
                            <label for="select-tecnicos" class="form-label"><strong>Técnico Responsável</strong></label>
                            <select name="id_user" class="form-control" id="select-tecnicos">
                                <option>Selecione um Técnico</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                            <p id="modal-event-click-tecnico" class="form-control-plaintext"></p>
                        </div>

                        <!-- Data do Evento -->
                        <div class="form-group mb-3">
                            <label class="form-label"><strong>Data:</strong></label>
                            <p id="modal-event-click-date" class="form-control-plaintext"></p>
                        </div>

                        <!-- Problema -->
                        <div id="problemas-container" class="mb-4">
                            <label class="form-label"><strong>Problema:</strong></label>
                            <p id="modal-event-click-desc" class="form-control-plaintext"></p>
                        </div>

                        <!-- Solução -->
                        <div class="form-group mb-3">
                            <label for="solucao" class="form-label"><strong>Solução:</strong></label>
                            <textarea class="form-control" name="solucao" id="solucao" rows="3" placeholder="Digite a solução"></textarea>
                        </div>

                        <!-- ID do Atendimento (Input Hidden) -->
                        <input type="hidden" id="modal-event-click-id" name="atendimento_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                        <button id="btn-excluir" type="button" class="btn btn-danger" onclick="deleteEvent()">
                            Excluir <i class="bi bi-trash3-fill"></i>
                        </button>

                        <button id="btn-finalizar" type="button" class="btn btn-success text-light"
                            onclick="finalizeEvent()">
                            Finalizar <i class="bi bi-check2-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>




        <script>
            let i = 0;
            const novoProblema = () => {
                i++;
                let data = $('#desc_problema').val();
                $('#to-do-list').append(`
            <div class="input-group mb-2" id="div-desc-prob-${i}">
                <input type="text" class="form-control" id="desc_problema_${i}" value="${data}" disabled>
                <span class="btn btn-danger btn-sm" onclick="excluirProblema(${i})"><i class="bi bi-trash"></i></span>
            </div>
        `);
                $('#desc_problema').val('');
            }

            const excluirProblema = (idDiv) => {
                $(`#div-desc-prob-${idDiv}`).remove();
            }

            function changeEvent() {
                let local = $('#id_local').val();
                let prioridade = $('#prioridade').is(':checked') ? 1 : 0;
                let data_entrada = $('#data_entrada').val();

                let problemas = [];
                $('#to-do-list input[type="text"]').each(function() {
                    problemas.push($(this).val());
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('atendimento.store') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'local': local,
                        'prioridade': prioridade,
                        'problemas': problemas,
                        'data_entrada': data_entrada,
                    },
                    success: function(response) {
                        iziToast.success({
                            title: 'Cadastrado',
                            message: 'Atendimento cadastrado com sucesso!',
                        });
                        $('#event-modal').modal('hide');
                        location.reload();
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

                var events = {!! json_encode(
                    $eventos->map(function ($evento) {
                        $jefin = isset($evento->tecnico->name) ? $evento->tecnico->name : '';
                        return [
                            'id' => $evento->id,
                            'title' => $evento->local->desc,
                            'start' => $evento->data,
                            'id_status' => $evento->id_status,
                            'prioridade' => $evento->prioridade,
                            'extendedProps' => [
                                'desc' => $evento->desc_problema,
                                'escola' => $evento->local->desc,
                                'solucao' => $evento->solucao,
                                'id_user' => $evento->id_user,
                                'tecnico_nome' => $jefin,
                                'problemas' => $evento->problemas,
                            ],
                        ];
                    }),
                ) !!};

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'pt-br',
                    events: events.map(event => {

                        console.log(event.id_status)
                        console.log(event.prioridade)
                        if (event.id_status === 3) {
                            event.backgroundColor = '#28a745';
                            event.borderColor = '#28a745';
                        }
                         else if (event.id_status === 1 && event.prioridade == 1) {
                            event.backgroundColor = '#a8323e';
                            event.borderColor = '#a8323e';
                        }
                        return event;
                    }),
                    dateClick: function(info) {
                        $('#event-modal').modal('show');
                    },

                    eventClick: function(info) {
                        $('#event-modal-click').attr('data-status-id', info.event.extendedProps.id_status);
                        $('#modal-event-click-id').val(info.event.id);
                        $('#modal-event-click-date').html(info.event.start.toISOString().split('T')[0]);
                        $('#modal-event-click-desc').html(info.event.extendedProps.desc);
                        $('#modal-event-click-escola').html(info.event.extendedProps.escola);

                        if (info.event.extendedProps.prioridade == 1) {
                            $('#modal-event-click-desc').addClass('title-red');
                        } else {
                            $('#modal-event-click-desc').removeClass('title-red');
                        }

                        $('#event-modal-click').modal('show');

                        let problemas = info.event.extendedProps.problemas || [];
                        let problemasContainer = $('#problemas-container');
                        problemasContainer.empty();

                        problemas.forEach(function(problema, index) {
                            problemasContainer.append(`
                    <div class="problem-item">
                        <strong>Problema ${index + 1}:</strong> ${problema.desc_problema}
                    </div>
                `);
                        });

                        if (info.event.extendedProps.id_status == 1) {
                            $('#select-tecnicos').show();
                            $('#btn-finalizar').show();
                        }
                        if (info.event.extendedProps.id_status == 3) {
                            $('#select-tecnicos').hide();
                            $('#btn-finalizar').hide();
                            $('#modal-event-click-tecnico').html(info.event.extendedProps.tecnico_nome);
                            $('#solucao').html(info.event.extendedProps.solucao).prop('disabled', true);
                        }
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


                        $('#event-modal-click').modal('hide');
                        location.reload();
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
