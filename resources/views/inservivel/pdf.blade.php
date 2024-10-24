<!DOCTYPE html>
<html>

<head>
    <title>Laudo Inservível</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
            text-align: center;
        }

        header {
            margin-right: 80px;
            margin-bottom: 20px;
        }

        img {
            height: 80px;
            margin-bottom: 10px;
        }

        h4 {
            margin-left: 80px;
            font-weight: bold;
            font-size: 14px;
        }

        #customers {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        #customers th,
        #customers td {
            border: 1px solid #000;
            padding: 5px;
            font-size: 0.9rem;
            text-align: left;
        }

        #customers th {
            background-color: #f4f4f4;
        }

        .section-title {
            font-weight: bold;
            margin: 15px 0 10px;
            font-size: 14px;
        }

        textarea {
            width: 100%;
            padding: 5px;
            font-size: 12px;
            border: 1px solid #ccc;
            resize: none;
            box-sizing: border-box;
            margin-bottom: 10px;
            height: 60px;
        }

        .signature-table {
            width: 100%;
            margin-top: 80px;
        }

        .signature-table td {
            text-align: center;
            vertical-align: bottom;
            padding: 10px;
        }

        .signature-line {
            border-top: 1px solid #000;
            margin: 0 auto;
            width: 80%;
        }

        footer {
            font-size: 15px;
            margin-top: 20px;
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
    @if ($equipamento->retirada == 1)
        <textarea readonly>
        O Scanner Patrimonial nº {{ $num_patrimonio }} apresenta defeito de {{ $problema->desc ?? 'Descrição não disponível' }}.
        Equipamento fora da garantia e sem contrato de manutenção.
        Uma ou mais peças foram removidas do equipamento para reserva.
    </textarea>
    @else
        <textarea readonly>
        O Scanner Patrimonial nº {{ $num_patrimonio }} apresenta defeito de {{ $problema->desc ?? 'Descrição não disponível' }}.
        Equipamento fora da garantia e sem contrato de manutenção.
    </textarea>
    @endif




    <table class="signature-table">
        <tr>
            <td>
                <div class="signature-line"></div>
                <p>Coordenador de TI</p>
                <p>Data __/__/___</p>
            </td>
            <td>
                <div class="signature-line"></div>
                <p>Técnico Responsável</p>
                <p>Data __/__/___</p>
            </td>
        </tr>
    </table>

    <footer>
        <p>Secretaria de Educação - Sistema de Gerenciamento de Equipamentos</p>
    </footer>

</body>

</html>
