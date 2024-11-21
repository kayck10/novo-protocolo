    @extends('layout.main')

    @section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Listagem de equipamentos</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="">Equipamentos</a></li>
                </ol>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Equipamentos</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabelaInservivel" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipos as $tipo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tipo->desc }}</td>
                                        <td>
                                            <a href="{{route('equipamentos.edit', $tipo->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            <form action="#" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este tipo de equipamento?')"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

        @section('scripts')
        @endsection
    @endsection
