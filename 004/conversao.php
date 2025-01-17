
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão cotação</title>
    <style>
        body {
            background-color: black;
            color: blanchedalmond;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            vertical-align: baseline;
        }

        .container {
            width: 900px;
            display: flex;
        }

        main {
            padding-top: 100px;
            width: 100%;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        form {
            text-align: center;
            background-color: dimgray;
            width: 500px;
            height: auto;
            padding: 50px 0px;
            margin: 0 auto;
            border-radius: 10px;
        }

        input {
            background-color: dimgray;
            border: none;
            border-bottom: 2px solid #ffff;
            width: 70%;
            font-size: 80px;
        }

        input:focus {
            border: none;
            outline: none;
            border-bottom: 4px solid #d4d4d4;
        }
        button {
            border: none;
            margin-top: 20px;
            width: 30%;
            height: auto;
            background-color: rgb(24, 235, 24);
        }
    </style>
</head>
<body>
    <main>
    <?php
        $inicio = date("m-d-Y", strtotime("-7 days"));
        $fim = date("m-d-Y");

        $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''. $inicio .'\'&@dataFinalCotacao=\''. $fim .'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

        $dados = json_decode(file_get_contents($url), true);

        //var_dump($dados);

        $cotacao = $dados["value"][0]["cotacaoCompra"];

        // echo "A cotação foi R$$cotacao";

        //Quanto você tem ?
        $real = $_REQUEST["submit"] ?? 0;
        $real = floatval($_REQUEST["din"]) ?? 0;
        $dolar = $real / $cotacao;

        $padrão = numfmt_create("pt-BR", NumberFormatter::CURRENCY);
        echo"
            <p>
            Seus " . numfmt_format_currency($padrão, $real, "BRL") . " equivalem a
            <strong>" . numfmt_format_currency($padrão, $dolar, "USD") . 
            "</strong>
            </p>
            <button onclick='javascript:history.go(-1)'><strong>VOLTAR</strong></button>
            ";
    ?>
    </main>
    
</body>
</html>

