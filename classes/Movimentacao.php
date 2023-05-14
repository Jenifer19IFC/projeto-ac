<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentacao</title>
</head>
<body>
<form action="" method="GET">
     <div class="tituloOpcao">
        <p>O que você deseja fazer?</p>
        <select name="opcaoUser">
            <option value="1">Realizar depósito</option>
            <option value="2">Realizar saque</option>
            <option value="3">Imprimir extrato</option>
        </select>
        <button type="submit">Acessar</button><br><br>
    </div>
</form>

<?php 
    if(!empty($_GET['opcaoUser'])){

         if($_GET['opcaoUser'] == "1"){?>
            <div>
                <p>Digite o valor do depósito:</p>
                <input type="number" name="valor">
                <button type="submit" value="deposito">Depositar</button>
            </div>
        <?php
         }
         else if($_GET['opcaoUser'] == "2"){?>
            <div>
                <p>Digite o valor do saque:</p>
                <input type="number" name="valor">
                <button type="submit" value="saque">Sacar</button>
            </div>
        <?php
         }else{?>
            <div>
                <p>Impriminto extrato...</p>
            </div>
        <?php    
         }

    }


    
?>
</body>
</html>