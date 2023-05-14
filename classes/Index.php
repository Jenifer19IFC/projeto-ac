<?php

require("../classes/Conta.php");

$conexao = new Conexao();
$conexao->setConexao();
$conn = $conexao->getConexao();

// print("<br> ----- BEM VINDO AO BANCO CENTRAL! ----- <br><br>");

// print("<b>Nome:</b> ".$conta->getNome()."<br><b>Conta corrente:</b>  ".$conta->getContaCorrente(). "<br><b>Saldo:</b> " . $conta->getSaldo());

// $conta->setSaldo(1500);
// $conta->setContaCorrente("00A1");
// $conta->setNome("Jenifer Vieira Goedert");

// print("<br><br>");
// print($conta->saque(500));
// print("<br>");
// print($conta->saque(300));
// print("<br>");
// print($conta->deposito(1000));
// print("<br>");
// print($conta->imprimirExtrato());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../estilo/style.css">
    <title>Caixa Eletrônico</title>
</head>
<body>
    <div class="titulo">
        <h2>BEM VINDO AO BANCO CENTRAL!</h2>
    </div>
    <form action="" method="GET">
        <div class="conta">
            <div>
                <h4>Adicione uma conta bancária</h4>
                <p>Conta corrente</p>
                <input type="text" name="conta_corrente" required>
                <p>Nome</p>
                <input type="text" name="nome" required>
                <p>Saldo</p>
                <input type="number" name="saldo" required>
                <br><br>
                <button type="submit">Salvar</button><br><br>
            </div>
        </div>
    </form>
    
    <?php 
        if(isset($_GET['conta_corrente']) && isset($_GET['nome']) && isset($_GET['saldo'])){
            $conta_corrente = $_GET['conta_corrente'];
            $nome = $_GET['nome'];
            $saldo = $_GET['saldo'];
            $conta = new Conta($nome, $conta_corrente, $saldo);
            //var_dump($conta);
            try {
                print($conta->salvarContaBD($conn, $conta));?>
                <br><br><a href="Movimentacao.php?conta_corrente=<?php echo $conta_corrente; ?>&nome=<?php echo $nome; ?>&saldo=<?php echo $saldo; ?>">Acessar conta</a><br>
            <?php
            } catch (\Throwable $th) {
                throw new Exception();
            }
        } else{
            echo "Há dado(s) nulo(s)!";
        }
    ?>
        
</body>
</html>
