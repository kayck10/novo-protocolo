@extends('layout.main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Cadastro de Usuário</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('atendimento-interno.index') }}">Usuário</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('create.protocolo') }}">Cadastrar Usuário </a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Cadastrar Usuário <i class="bi bi-person-add"></i></h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12 mx-auto p-5">
                            <div>
                                <div>
                                    <form action="{{ route('user.store') }}" method="POST">
                                        @csrf
                                        <div class="row mb-4">
                                            <div class="">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="form6Example1">Nome:</label>
                                                    <input type="text" name="name" id="form6Example1"
                                                        class="form-control" value="{{ old('name') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form6Example3">Usuário:</label>
                                            <input type="text" name="usuario" id="form6Example3" class="form-control"
                                                value="{{ old('usuario') }}" />
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form6Example5">E-mail:</label>
                                            <input type="email" name="email" id="form6Example5" class="form-control"
                                                value="{{ old('email') }}" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Função:</label>
                                            <select name="id_funcoes" class="form-control">
                                                <option value="">Selecione uma Função</option>
                                                @foreach ($funcoes as $funcao)
                                                    <option value="{{ $funcao->id }}"
                                                        {{ old('id_funcoes') == $funcao->id ? 'selected' : '' }}>
                                                        {{ $funcao->desc }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Tipo de Usuário:<i></i></label>
                                            <select name="id_tipos_usuarios" class="form-control">
                                                <option value="">Selecione um tipo de usuário</option>
                                                @foreach ($tipos as $tipo)
                                                    <option value="{{ $tipo->id }}"
                                                        {{ old('id_tipos_usuarios') == $tipo->id ? 'selected' : '' }}>
                                                        {{ $tipo->desc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-grid gap-2 col-6 mx-auto mt-5">
                                            <button type="submit" class="btn btn-primary">Cadastrar <i
                                                    class="bi bi-check color-white"></i> </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Incluir Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Incluir Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if(\Illuminate\Support\Facades\Session::has('success'))
    <script>
        toastr.success("{{ \Illuminate\Support\Facades\Session::get('success') }}");
    </script>
@endif


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}");
            </script>
        @endforeach
    @endif
@endsection
