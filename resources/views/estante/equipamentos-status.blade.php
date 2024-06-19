@foreach($equipamentos as $equipamento)
<tr>
    <td>{{ $equipamento->id }}</td>
    <td>{{ $equipamento->nome }}</td>
    <td>{{ $equipamento->descricao }}</td>
    <td>{{ $equipamento->desc}}</td>
</tr>
@endforeach
