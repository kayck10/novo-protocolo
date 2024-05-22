@extends('layout.main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Listagem de Protocolos</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('index.protocolo') }};">Protocolos de Entrada</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('index.protocolo') }}">Ver Protocolos</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Listagem de Protocolos</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Escola | Setor</th>
                                            <th>Data</th>
                                            <th>Opções</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($protocolos as $protocolo)
                                        <tr>
                                            <td>{{$protocolo->id}}</td>
                                            <td></td>
                                            <td>{{$protocolo->data_entrada}}</td>
                                        </td>
                                        <td >
                                            <button type="button" class="btn btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-eye"></i>
                                              </button>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
