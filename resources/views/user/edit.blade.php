<!-- resources/views/user/edit.blade.php -->
@extends('layout.main')

@section('content')
<div class="container">
    <h2>Editar Usuário: {{ $user->name }}</h2>

    <form action="{{ route('user.atualizar', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="usuario">Usuário:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $user->usuario }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="idfuncao">Função:</label>
            <input type="text" class="form-control" id="idfuncao" name="idfuncao" value="{{ $user->funcao->desc }}" readonly>
        </div>

        <div class="form-group">
            <label for="id_tipos_usuarios">Tipo de Usuário:</label>
            <input type="text" class="form-control" id="id_tipos_usuarios" name="id_tipos_usuarios" value="{{ $user->tipoUsuario->desc}}" readonly>
        </div>

        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" id="password" name="password">
            <small>
                Deixe em branco para manter a senha atual. A nova senha deve ter:
                <ul>
                    <li>Entre 6 e 15 caracteres</li>
                    <li>Ao menos uma letra maiúscula</li>
                    <li>Ao menos um dos seguintes caracteres especiais: $ * & @ #</li>
                </ul>
            </small>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
