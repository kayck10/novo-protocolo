@extends('layout.main')

@section('content')
<div class="container">
    <h2>Editar Tipo de Equipamento</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipamentos.update', $tipoEquipamento->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="equipamento">Descrição do Equipamento</label>
            <input type="text" name="equipamento" id="equipamento" class="form-control" value="{{ $tipoEquipamento->desc }}" required>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem do Equipamento</label>
            <input type="file" name="imagem" id="imagem" class="form-control">
            @if($tipoEquipamento->imagem)
                <div class="mt-2">
                    <img src="{{ asset($tipoEquipamento->imagem) }}" alt="Imagem do equipamento" width="150">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="problemas">Problemas Associados</label>
            <div id="problemas-list">
                @foreach ($tipoEquipamento->problemas as $problema)
                    <div class="input-group mb-2">
                        <input type="text" name="problemas[]" class="form-control" value="{{ $problema->desc }}" required>
                        <button type="button" class="btn btn-danger remove-problema">Remover</button>
                    </div>
                @endforeach
            </div>

            <button type="button" class="btn btn-secondary" id="add-problema">Adicionar Problema</button>
        </div>

        <div class="form-group mt-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('lista.tipoequipamento') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<template id="problema-template">
    <div class="input-group mb-2">
        <input type="text" name="problemas[]" class="form-control" placeholder="Descrição do problema" required>
        <button type="button" class="btn btn-danger remove-problema">Remover</button>
    </div>
</template>

<script>
    document.getElementById('add-problema').addEventListener('click', function() {
        var template = document.getElementById('problema-template').content.cloneNode(true);
        document.getElementById('problemas-list').appendChild(template);
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-problema')) {
            e.target.closest('.input-group').remove();
        }
    });
</script>
@endsection
