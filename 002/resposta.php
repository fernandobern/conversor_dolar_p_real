<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Desafio 001</title>
    
</head>
<body>
    <main>
        <h1>Resposta</h1>
        <p>
            <?php
                $n = $_REQUEST['num'] ?? 0;
                $a = $n -1;
                $s = $n +1;
                echo"O número antecessor é <strong>$a<strong> <br>";
                echo"O número sucessor é $s <br>";
                echo"O número informado foi $n <br>";
            ?>
        </p>
    </main>
</body>
</html>