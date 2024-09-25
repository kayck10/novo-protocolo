<!DOCTYPE html>
<html>

<head>
    <title>PROTOCOLO</title>
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
            LAUDO DE AVALIAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA
            <br>
        </h4>
    </div>

    <h4>ORIGEM DO EQUIPAMENTO</h4>

    <table id="customers">
        <tr>
            <th>Escola</th>
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
            <th>Tipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Número de Série</th>
            <th>Número de Patrimônio</th>
        </tr>
        <tr>
            <td>{{ $tipo }}</td>
            <td>{{ $marca }}</td>
            <td>{{ $modelo }}</td>
            <td>{{ $num_serie }}</td>
            <td>{{ $num_patrimonio }}</td>
        </tr>
    </table>

    <h4>Condições do Equipamento</h4>
    <table id="customers">
        <tr>
            <th>Obsoleto ( )</th>
            <th>Sem Conserto ( x )</th>
        </tr>
    </table>

    <h4>Destino Sugerido</h4>
    <table id="customers">
        <tr>
            <th>Manutenção ( )</th>
            <th>Atualização ( )</th>
            <th>Baixa Patrimonial ( x )</th>
        </tr>
    </table>

    <h4>Observações</h4>
    <textarea name="" id="" cols="30" rows="10">{{ $solucao }}</textarea>

    <table style="width: 100%; margin-top:20px">
        <tr>
            <td style="width: 50%; text-align: center;">
                __________________________
                <p>Coordenador de TI</p>
                <p>Data</p>
            </td>
            <td style="width: 50%; text-align: center;">
                __________________________
                <p>Técnico Responsável</p>
                <p>Data</p>
            </td>
        </tr>
    </table>

</body>
</html>
