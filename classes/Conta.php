<?php

require("../conexao/Conexao.php");

class Conta{

    private $nome;
    private $contaCorrente;
    private $saldo;

    function __construct($nome, $contaCorrente, $saldo){
        $this->nome = $nome;
        $this->contaCorrente = $contaCorrente;
        $this->saldo = $saldo;
    }

    function getNome(){
        return $this->nome;
    }

    function setNome($nome){
        $this->nome = $nome;
    }

    function getContaCorrente(){
        return $this->contaCorrente;
    }

    function setContaCorrente($contaCorrente){
        $this->contaCorrente = $contaCorrente;
    }

    function getSaldo(){
        return $this->saldo;
    }

    function setSaldo($saldo){
        $this->saldo = $saldo;
    }

    function deposito($valor){
        if($valor > 0){
            $this->saldo = $this->getSaldo() + $valor;
            return "Depósito de ".$valor." reais realizado com sucesso!";
        }else{
            return "Valor para depósito inválido";
        }
    }

    function saque($valor){
        if($valor > 0 && $valor < $this->getSaldo()){
            $this->saldo = $this->getSaldo() - $valor;
            return "Saque de ".$valor." reais realizado com sucesso!";
        }else{
            return "Valor para saque inválido!";
        }
    }

    // Funcao incompleta
    function imprimirExtrato(){
        $extrato = "<br> ----- <b>Extrato bancário Banco Central</b> ----- <br>
        <br><b>Conta corrente:</b> ".$this->contaCorrente."
        <br><b>Nome:</b> ".$this->nome."
        <br><b>Saldo</b>: ".$this->saldo
        ."<br>-----------------------------------------------------";
        return $extrato;
    }
    
    function salvarContaBD($conn, $conta){
               
        try {
            $sql = "INSERT INTO conta (conta_corrente, nome, saldo) VALUES ('$this->contaCorrente', '$this->nome', '$this->saldo')";

            if ($conn->query($sql) === TRUE) {
                return "<br>Conta inserida no banco de dados com sucesso.";
            } 
        } catch (Throwable $ex) {
            if ($conn == null){
                throw new Exception("<br>Conexão vazia!");
            }else{
                throw new Exception("Erro ao tentar se conectar com o banco de dados: ",$conn->error);
                
            }
        }
           
    

    }
}

?>