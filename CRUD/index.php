<?php
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css" />
    <?php
        $sqlN = "SELECT * FROM niveis";

        $consultaN = $pdo->prepare($sqlN);
        $consultaN->execute();
        $niveis = $consultaN->fetchAll();

        $sqlD = "SELECT * FROM desenvolvedores";

        $consultaD = $pdo->prepare($sqlD);
        $consultaD->execute();
        $desenvolvedores = $consultaD->fetchAll();
    ?>
</head>

<?php
    include 'navbar.php'
?>
<body>
    <div class="divTabelas">
        <table  class="table tabela">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Niveis</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    foreach ($niveis as $nivel) {
                        $id = $nivel['id'];
                        $nome = $nivel['nome'];
                        ?>
                            <tr>
                                <th scope="row dadoColuna"><?=$id?></th>
                                <td class="dadoColuna"><?=$nome?></td>
                                <td><form action="excluirNivel.php" method="post"> <button type="submit" class="btn btn-primary mb-3 btn-sm" name="id" value="<?=$id?>">Deletar</button></form></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>

        <table class="table tabela">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">nome</th>
                <th scope="col">nivel</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    foreach ($desenvolvedores as $desenvolvedor) {
                        $id = $desenvolvedor['id'];
                        $nome = $desenvolvedor['nome'];
                        $idNivel = $desenvolvedor['nivel'];
                        
                        $sqlId = "SELECT nome FROM niveis where id = :id";
                        $consulta = $pdo->prepare($sqlId);
                        $consulta->bindParam(":id", $idNivel);
                        $consulta->execute();
                        $result = $consulta->fetch();
                        $nivel = $result[0];
                        
                        ?>
                            <tr>
                            <th scope="row"><?=$id?></th>
                            <td class="dadoColuna"><?=$nome?></td>
                            <td><?=$nivel?></td>
                            <td><form action="excluirDesenvolvedor.php" method="post"> <button type="submit" class="btn btn-primary mb-3 btn-sm" name="id" value="<?=$id?>">Deletar</button></form></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>