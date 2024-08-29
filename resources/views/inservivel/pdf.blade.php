<!DOCTYPE html>
<html>
<head>
    <title>Laudo Inservível</title>
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
        p {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <img src="../public/logo-sme/sme.png" alt="Logo SME">

    <div>
        <h4>Prefeitura Municipal de Maracanaú<br>
            Setor de Tecnologia da Informação<br>
            Fone: (85) 3521-5964 (85) 9 8192-1818.
        </h4>
    </div>

    <h1>Laudo Inservível</h1>

    <p>Marca: {{ $marca }}</p>
    <p>Modelo: {{ $modelo }}</p>
    <p>Número de Série: {{ $num_serie }}</p>

</body>
</html>
