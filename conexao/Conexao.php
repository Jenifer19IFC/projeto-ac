<?php
  

  class Conexao{

    public $conexao;

    private $host = "localhost";
    private  $usuario = "root"; 
    private  $senha = ""; 
    private  $bancoDados = "ac";
  
    // function __construct($host, $usuario, $senha, $bancoDados){
    //     $this->host = $host;
    //     $this->usuario = $usuario;
    //     $this->senha = $senha;
    //     $this->bancoDados = $bancoDados;
    // }

    public function setConexao(){
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->bancoDados);
       
        //Verifica se houve erro na conexão
        if ($this->conexao->connect_error) {
            return die("Falha na conexão: " . $this->conexao->connect_error);
        }
        return "Conexão bem-sucedida!<br>";
    }

    function getConexao(){
      return $this->conexao;
    }
   

  }
   

