<!DOCTYPE html>
<html>

<head>
    <title>PROTOCOLO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            width: 100%;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        img {
            height: 100px;
            margin-bottom: 20px;
        }

        h4 {
            font-weight: bold;
            margin: 20px 0 10px;
        }

        #customers {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        #customers th,
        #customers td {
            border: 1px solid #000;
            padding: 10px;
            font-size: 14px;
            text-align: left;
        }

        #customers th {
            background-color: #f4f4f4;
        }

        #customers tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        #customers tr:hover {
            background-color: #f1f1f1;
        }

        .section-title {
            text-align: center;
            font-weight: bold;
            margin: 20px 0;
            font-size: 16px;
        }

        textarea {
            width: 100%;
            height: 90px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .signature-table {
            width: 100%;
            margin-top: 10px;
        }

        .signature-table td {
            text-align: center;
            vertical-align: bottom;
            padding: 20px;
        }

        .signature-line {
            border-top: 1px solid #000;
            margin: 0 auto;
            width: 60%;
        }

        footer {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <header>
        <img src="../public/logo-sme/sme.png" alt="Logo SME">
        <h4>LAUDO DE AVALIAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA</h4>
    </header>

    <div class="section-title">ORIGEM DO EQUIPAMENTO</div>

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

    <div class="section-title">Dados do Equipamento</div>

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

    <div class="section-title">Condições do Equipamento</div>

    <table id="customers">
        <tr>
            <th>Obsoleto ( )</th>
            <th>Sem Conserto ( x )</th>
        </tr>
    </table>

    <div class="section-title">Destino Sugerido</div>

    <table id="customers">
        <tr>
            <th>Manutenção ( )</th>
            <th>Atualização ( )</th>
            <th>Baixa Patrimonial ( x )</th>
        </tr>
    </table>

    <div class="section-title">Observações</div>
     <textarea readonly>O Scanner Patrimonial nº {{$num_patrimonio}} apresenta defeito de {{--{{$problemaInservivel}}. --}} Equipamento fora da garantia e sem contrato de manutenção. Uma ou mais peças foram removidas do equipamento para reserva.</textarea>

    <table class="signature-table">
        <tr>
            <td>
                <div class="signature-line"></div>
                <p>Coordenador de TI</p>
                <p>Data</p>
            </td>
            <td>
                <div class="signature-line"></div>
                <p>Técnico Responsável</p>
                <p>Data</p>
            </td>
        </tr>
    </table>

    <footer>
        <p>Secretaria de Educação - Sistema de Gerenciamento de Equipamentos</p>
    </footer>

</body>

</html>
