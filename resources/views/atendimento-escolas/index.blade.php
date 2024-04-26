@extends('layout.main')

@section('content')
    <!-- row -->
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
                </form>
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
                        <select name="id_local" class="form-control">
                            <option value="Gender">Selecione uma Escola</option>
                            @foreach ($escolas as $escola)
                            <option value="{{$escola->id}}">{{$escola->desc}}</option>
                            @endforeach
                        </select>
                        <div class="form-check mt-3">
                            <label class="form-check-label" for="flexCheckDefault">Prioridade?</label>
                            <input class="form-check-input mx-2" type="checkbox" value="" id="prioridade" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Data:</label>
                        <input name="datepicker" class="datepicker-default form-control" id="datepicker1">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Problema:</label>
                        <input class="form-control" type="text" name="desc_problema" id="desc_problema" disabled>
                    </div>
                    <p id="selected-date"></p>
                </div
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success save-event waves-effect waves-light">Criar
                        Evento</button>
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
                    ªªªª // Exemplo de mudança de cor para eventos
                    info.el.style.borderColor = 'red';
                },
                dateClick: function(info) {
                    // Atualize o texto na modal para mostrar a data clicada
                    document.getElementById('selected-date');

                    // Abra a modal quando uma data é clicada
                    $('#event-modal').modal('show');
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

    <script>
        function checkFields() {
            var escola = $('#escola').val(); // Valor selecionado do campo "Escola"
            var dataEvento = $('#data-evento').val(); // Valor do campo "Data"

            // Desabilita ou habilita o campo "Problema" com base nos outros campos
            if (escola && dataEvento) {
                $('#problema').prop('disabled', false); // Habilita se ambos os campos estiverem preenchidos
            } else {
                $('#problema').prop('disabled', true); // Desabilita se algum campo estiver vazio
            }
        }

        // Adiciona eventos de mudança para os campos que precisamos verificar
        $('#escola, #data-evento').on('change', checkFields);

        // Garante que o campo "Problema" esteja desabilitado ao abrir a modal
        $('#event-modal').on('show.bs.modal', function() {
            checkFields(); // Chama para garantir que o campo "Problema" esteja no estado certo
        });
    </script>
@endsection
