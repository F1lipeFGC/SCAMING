<?php include "conecta.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="GET">
        Nome do usuário: <input type="text" name="nome">
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($_GET["nome"])) {
        $nome = $_GET["nome"];
        $sql = " SELECT * FROM usuarios WHERE nome = '$nome' ";

        //Descomente a linha a seguir para você visualizar como é
        //construída a consulta SQL:
        echo $sql . "<br>";
        $dados = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

        while ($linha = mysqli_fetch_assoc($dados)) {
            $endereco = $linha["endereco"];
            $telefone = $linha["telefone"];
            echo "<pre>Endereco: {$endereco}<br />Telefone: {$telefone}</pre>";
        }
        mysqli_close($conexao);
    }
    ?>
</body>

</html>