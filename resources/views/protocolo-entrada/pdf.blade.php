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
    </style>
</head>

<body>

    <img src="../public/logo-sme/sme.png" alt="Logo SME">

    <div>
        <h4>
            <br>
            PROTOCOLO DE ENTRADA DO EQUIPAMENTO Nº: {{$tombamento}}
            <br>
        </h4>
    </div>

    <h4>ORIGEM DO EQUIPAMENTO</h4>

    <table id="customers">
        <tr>
            <th>Local</th>
            <th>Setor</th>
        </tr>
        <tr>
            <td>{{ $local }}</td>
            <td>{{ $setor }}</td>
        </tr>
    </table>

    <h4>Dados do Equipamento</h4>

    <table id="customers">
        <tr>
            <th>Tombamento</th>
            <th>Tipo de Equipamento</th>
            <th>Acessórios</th>
            <th>Problema Relatado</th>
        </tr>
        <tr>
            <td>{{ $tombamento }}</td>
            <td>{{ $tipoEquipamento }}</td>
            <td>{{ $acessorios }}</td>
            <td>{{ $problemaRelatado }}</td>
        </tr>
    </table>

    <table style="width: 100%; margin-top:20px">
        <tr>
            <td style="width: 50%; text-align: center;">
                __________________________
                <p><b>Data de Entrada:</b> {{ $dataEntrada }}</p>
                <p><b>Hora:</b> {{ $horaEntrada }}</p>

            </td>
            <td style="width: 50%; text-align: center; ">
                __________________________
                <p><b>Secretaria de Educação</b></p>
                <p><b>Setor de Tecnologia da Informação</b></p>

            </td>
        </tr>
    </table>

</body>

</html>
