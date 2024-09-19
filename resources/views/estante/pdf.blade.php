<!DOCTYPE html>
<html>

<head>
    <title>Protocolo de Entrada</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }

        img {
            height: 100px;
            display: block;
            margin-right: 125px;
        }

        h4 {
            font-weight: bold;
        }

        h1 {
            margin-top: 20px;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #0e0d0d;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #eee8e8;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            text-align: left;
            background-color: #fafafa;
            color: rgb(31, 29, 29);
        }

        .solucao {
            margin: 20px auto;
            text-align: center;
            width: 50%;
        }

        .solucao textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>

    <img src="../public/logo-sme/sme.png" alt="Logo SME">

    <div>
        <h4>
            <br>
            PROTOCOLO DE SAÍDA DO EQUIPAMENTO Nº: {{$tombamento}}
            <br>
        </h4>
    </div>

    <h4>ORIGEM DO EQUIPAMENTO</h4>

    <div>
        <h4>Escola: {{$local}}</h4>
    </div>

    <h4>Dados do Equipamento</h4>

    <table id="customers">
        <tr>
            <th>Tombamento</th>
            <th>Tipo de Equipamento</th>
            <th>Acessórios</th>
            <th>Técnico</th>
        </tr>
        <tr>
            <td>{{ $tombamento }}</td>
            <td>{{ $tipoEquipamento }}</td>
            <td>{{ $acessorios }}</td>
            <td>{{ $tecnico }}</td>
        </tr>
    </table>

    <div class="solucao">
        <h4>Solução</h4>
        <textarea name="" id="" cols="30" rows="10">{{ $solucao }}</textarea>
    </div>

    <table style="width: 100%; margin-top:20px">
        <tr>
            <td style="width: 50%; text-align: center;">
                __________________________
                <p><b>Data de Saída:</b> {{ $dataEntrada }}</p>
                <p><b>Hora:</b> {{ $horaEntrada }}</p>
            </td>
        </tr>
    </table>

</body>

</html>
