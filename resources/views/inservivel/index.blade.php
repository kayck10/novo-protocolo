@extends('layout.main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Listagem de Atendimentos Internos</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Professors</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">All Professors</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-primary mr-1 show active">List View</a></li>
                    <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid View</a>
                    </li>
                </ul>
            </div>
            <table class="responsive table table-striped" id="table">
                <thead>
                    <tr>

                        <th class="center">Tombamento | NS</th>
                        <th class="center">Origem</th>
                        <th class="center">Data</th>
                        <th class="center">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeA">

                        <td><a href="#"><span class="badge btn">157047</span></a></td>
                        <td class="center">NARCISO PESSOA DE ARAUJO EMEIEF </td>
                        <td>27/03/2024</td>
                        <td class="btn-xs btn-group-xs center">
                            <button class="btn btn-primary" title="Ver" onclick="visualizar(2699)">
                                <i class="fa fa-television"></i>
                            </button>
                            <button class="btn btn-warning" title="Editar" onclick="editar(2699)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="gradeA">

                        <td><a href="#"><span class="badge btn">82986</span></a></td>
                        <td class="center">Secretaria Municipal de Educação</td>
                        <td>06/10/2021</td>
                        <td class="btn-xs btn-group-xs center">
                            <button class="btn btn-primary" title="Ver" onclick="visualizar(2883)">
                                <i class="fa fa-television"></i>
                            </button>
                            <button class="btn btn-warning" title="Editar" onclick="editar(2883)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="gradeA">

                        <td><a href="#"><span class="badge btn">84581</span></a></td>
                        <td class="center">Secretaria Municipal de Educação</td>
                        <td>06/10/2021</td>
                        <td class="btn-xs btn-group-xs center">
                            <button class="btn btn-primary" title="Ver" onclick="visualizar(1752)">
                                <i class="fa fa-television"></i>
                            </button>
                            <button class="btn btn-warning" title="Editar" onclick="editar(1752)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="gradeA">

                        <td><a href="#"><span class="badge btn">84581</span></a></td>
                        <td class="center">Secretaria Municipal de Educação</td>
                        <td>06/10/2021</td>
                        <td class="btn-xs btn-group-xs center">
                            <button class="btn btn-primary" title="Ver" onclick="visualizar(1751)">
                                <i class="fa fa-television"></i>
                            </button>
                            <button class="btn btn-warning" title="Editar" onclick="editar(1751)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="gradeA">

                        <td><a href="#"><span class="badge btn">84581</span></a></td>
                        <td class="center">Secretaria Municipal de Educação</td>
                        <td>06/10/2021</td>
                        <td class="btn-xs btn-group-xs center">
                            <button class="btn btn-primary" title="Ver" onclick="visualizar(1643)">
                                <i class="fa fa-television"></i>
                            </button>
                            <button class="btn btn-warning" title="Editar" onclick="editar(1643)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="gradeA">

                        <td><a href="#"><span class="badge btn">84581</span></a></td>
                        <td class="center">Secretaria Municipal de Educação</td>
                        <td>06/10/2021</td>
                        <td class="btn-xs btn-group-xs center">
                            <button class="btn btn-primary" title="Ver" onclick="visualizar(1746)">
                                <i class="fa fa-television"></i>
                            </button>
                            <button class="btn btn-warning" title="Editar" onclick="editar(1746)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="gradeA">

                        <td><a href="#"><span class="badge btn">84581</span></a></td>
                        <td class="center">Secretaria Municipal de Educação</td>
                        <td>06/10/2021</td>
                        <td class="btn-xs btn-group-xs center">
                            <button class="btn btn-primary" title="Ver" onclick="visualizar(1463)">
                                <i class="fa fa-television"></i>
                            </button>
                            <button class="btn btn-warning" title="Editar" onclick="editar(1463)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="gradeA">

                        <td><a href="#"><span class="badge btn">06948</span></a></td>
                        <td class="center">Secretaria Municipal de Educação</td>
                        <td>08/07/2021</td>
                        <td class="btn-xs btn-group-xs center">
                            <button class="btn btn-primary" title="Ver" onclick="visualizar(2757)">
                                <i class="fa fa-television"></i>
                            </button>
                            <button class="btn btn-warning" title="Editar" onclick="editar(2757)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="gradeA">

                        <td><a href="#"><span class="badge btn">126230</span></a></td>
                        <td class="center">Secretaria Municipal de Educação</td>
                        <td>14/06/2021</td>
                        <td class="btn-xs btn-group-xs center">
                            <button class="btn btn-primary" title="Ver" onclick="visualizar(2675)">
                                <i class="fa fa-television"></i>
                            </button>
                            <button class="btn btn-warning" title="Editar" onclick="editar(2675)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="gradeA">

                        <td><a href="#"><span class="badge btn">126260</span></a></td>
                        <td class="center">Secretaria Municipal de Educação</td>
                        <td>14/06/2021</td>
                        <td class="btn-xs btn-group-xs center">
                            <button class="btn btn-primary" title="Ver" onclick="visualizar(2711)">
                                <i class="fa fa-television"></i>
                            </button>
                            <button class="btn btn-warning" title="Editar" onclick="editar(2711)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
