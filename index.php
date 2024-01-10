<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo PHP</title>
</head>
<body>
    <?php
        require_once('Carro.php');
      

        $carro = new Carro("Toyota", "Corolla", 2022);

        $dao = new CarroDAO();
        $dao->salvarCarro($carro);
        $dao->fecharConexao();

        print_r($carro);
    ?>
</body>
</html>
