<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Desafio 001</title>
    
</head>
<body>
        <h1>Números Randoms</h1>
        <p>se cair 1 vc é feio.</p>
            <?php
                $min = 0;
                $max = 500;

                $res = mt_rand($min, $max);
                echo"Gerando um número entre $min e $max...<br> O valor gerado foi <strong>$res</strong>";
            ?>
        <button onclick="javascript:document.location.reload()">&#x1F504; Gerar novamente</button>
</body>
</html>