<!DOCTYPE html>
<html>

<head>
    <title>Protocolo de Entrada</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }

        img {
            height: 100px;
            display: block;
            margin-right: 100px;
        }

        h1 {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        h4 {
            font-weight: bold;
            margin: 10px 0;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        #customers td,
        #customers th {
            border: 1px solid #0e0d0d;
            padding: 12px;
        }

        #customers tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        #customers tr:hover {
            background-color: #f1f1f1;
        }

        #customers th {
            background-color: #fafafa;
            color: #1f1d1d;
        }

        .solucao {
            margin: 20px auto;
            text-align: center;
            width: 80%; /
        }

        .solucao h4 {
            margin: 10px 0;
        }

        .solucao textarea {
            width: 100%;
            height: 60px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
        }

        .signature {
            margin-top: 40px;

        }

        .signature div {
            margin-left: 60px;
            width: 80%;
        }

        .signature-line {
            border-top: 1px solid #000;
            margin: 20px auto;
            width: 100%;
        }
    </style>
</head>

<body>

    <img src="../public/logo-sme/sme.png" alt="Logo SME">

    <h1>PROTOCOLO DE SAÍDA DO EQUIPAMENTO Nº: {{$tombamento}}</h1>

    <h4>ORIGEM DO EQUIPAMENTO</h4>
    <h4>Escola: {{$local}}</h4>

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
        <textarea readonly>{{ $solucao }}</textarea>
    </div>

    <div class="signature">
        <div>
            <div class="signature-line"></div>
            <p><b>Assinatura do Responsável</b></p>
        </div>
        <div>
            <div class="signature-line"></div>
            <p><b>Data de Saída:</b> {{ $dataEntrada }}</p>
            <p><b>Hora:</b> {{ $horaEntrada }}</p>
        </div>

    </div>

</body>

</html>
