@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Usuário Cadastrado</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">Usuário</a></li>
                    <li class="breadcrumb-item active"><a href="">Cadastrar Usuário</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Usuário Cadastrado <i class="bi bi-person-add"></i></h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12 mx-auto p-5">
                            <div>
                                <div>
                                    <form id="user-form" action="{{ route('user.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="name">Nome:</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" readonly />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="usuario">Usuário:</label>
                                                    <input type="text" name="usuario" id="usuario" class="form-control" value="{{ $user->usuario }}" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="email">E-mail:</label>
                                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Tipo de Usuário:</label>
                                                <select name="id_tipos_usuarios" class="form-control selects" disabled="true">
                                                    @foreach ($tipos as $tipo )
                                                    @if ($tipo->id == $user->id_tipos_usuarios)
                                                    <option selected value="{{ $tipo->id }}">{{ $tipo->desc }}</option>

                                                    @else
                                                    <option value="{{ $tipo->id }}">{{ $tipo->desc }}</option>

                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <label class="form-label">Função:</label>
                                                <select name="id_funcoes" class="form-control selects"  disabled="true">
                                                    <option value="{{ $user->id_funcoes }}">{{ $user->funcao->desc }}</option>
                                                    @foreach ($funcoes as $funcao)
                                                        <option value="{{ $funcao->id }}">{{ $funcao->desc }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Situação:</label>
                                                <select name="id_situacao" class="form-control selects" disabled="true">
                                                    <option value="{{ $user->id_situacao }}">{{ $user->situacao->desc }}</option>
                                                    @foreach ($situacoes as $situacao)
                                                    @if ($situacao->id == $user->id_situacao) {
                                                        <option selected value="{{ $situacao->id }}">{{ $situacao->desc }}</option>
                                                    }  @else {
                                                        <option selected value="{{ $situacao->id }}">{{ $situacao->desc }}</option>
                                                    }

                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary mt-3" id="edit-button">Editar <i class="bi bi-pencil-square"></i></button>
                                        <button type="submit" class="btn btn-warning mt-3" id="reset-button">Resetar Senha <i class="bi bi-arrow-clockwise"></i></button>
                                        <button type="submit" class="btn btn-success mt-3" id="update-button" style="display: none;">Atualizar <i class="bi bi-check2-all"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')

    <script>
        $('#edit-button').on('click', function() {
            var inputs = $('#user-form input');
            var selects = $('.selects');

            inputs.each(function() {
                $(this).removeAttr('readonly');
            });

            selects.each(function() {
                $(this).removeAttr('disabled');
            });

            $('#reset-button').hide();
            $('#update-button').show();
            $('#edit-button').hide();
        });

        function updateSelectOptions() {
            var selectedValues = [];
            $('.selects').each(function() {
                selectedValues.push($(this).val());
            });

            $('.selects').each(function() {
                var currentSelect = $(this);
                currentSelect.find('option').each(function() {
                    var option = $(this);
                    if (selectedValues.includes(option.val()) && option.val() != currentSelect.val()) {
                        option.hide();
                    } else {
                        option.show();
                    }
                });
            });
        }

        $('.selects').on('change', updateSelectOptions);

        // Trigger change event to initialize the options hiding correctly on page load
        $(document).ready(function() {
            updateSelectOptions();
        });

    </script>
    @endsection
@endsection
