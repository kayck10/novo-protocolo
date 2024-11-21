<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login | Protocolo</title>
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
    <style>

        .section {
            margin-top: 200px;
        }
        h3 {
            font-size: 2rem;
        }
        .formulario {
            background-color: #fff;
            width: 400px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px
        }
    </style>
</head>

<body class="bg-body-secondary">

    <div class="section">
        <div class="text-center">
            <h3 class="mb-4 fw-lighter">
                <b class="fw-bold">SIS</b> Protocolo TI
            </h3>
        </div>

        <div class="formulario">
            <form action="{{ route('login.store') }}" method="POST" class="p-3 border border-bottom-0">
                @csrf
                <p class="text-center login-box-msg">Entre para iniciar uma nova sessão</p>
                <div class="mb-3">
                    <input type="text" name="login" class="form-control" placeholder="E-mail ou Nome de Usuário" aria-describedby="loginHelp">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Senha" id="exampleInputPassword1">
                </div>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>
</html>
