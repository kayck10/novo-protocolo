<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF - Protocolo de Saída</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        header img {
            height: 80px;
        }

        header h1 {
            margin: 10px 0;
            font-size: 20px;
            text-transform: uppercase;
            color: #444;
        }

        header h4 {
            font-size: 16px;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        table th {
            background-color: #f4f4f4;
            color: #333;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .solucao {
            margin-top: 30px;
        }

        .solucao h4 {
            font-size: 16px;
            margin-bottom: 10px;
            text-align: left;
        }

        .solucao textarea {
            width: 100%;
            height: 60px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
            background-color: #f9f9f9;
            font-size: 14px;
        }

        .signature {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .signature div {
            text-align: center;
            width: auto;
            /* Remove largura fixa para evitar distorções */
        }

        .signature-line {
            border-top: 1px solid #000;
            margin: 10px auto;
            width: 50%;
            /* Ajusta a largura da linha */
        }


        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #555;
        }


        footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #888;
        }
    </style>
</head>

<body>

    <header>
        <img src="../public/logo-sme/sme.png" alt="Logo SME">
        <h1>Protocolo de Saída do Equipamento Nº: {{ $tombamento }}</h1>
        <h4>Origem do Equipamento: Escola {{ $local }}</h4>
    </header>

    <section>
        <h4>Dados do Equipamento</h4>
        <table>
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
    </section>

    <section class="solucao">
        <h4>Solução</h4>
        <textarea readonly>{{ $solucao }}</textarea>
    </section>

    <section class="signature">
        <div>
            <div class="signature-line"></div>
            <p><b>Assinatura do Responsável</b></p>
            <p><b>Data de Saída:</b> {{ $dataEntrada }}</p>
            <p><b>Hora:</b> {{ $horaEntrada }}</p>
        </div>
    </section>



    <footer>
        Secretaria de Educação - Sistema de Gerenciamento de Equipamentos
    </footer>

</body>

</html>
