<?php
  class cliente{

    private $nome;
    private $dataNascimento;
    private $sexo;
    private $email;
    private $celular;
    private $senha;
    private $lembreteSenha;

    public function setNome($nome){
      $this->nome = $nome;
    }

    public function getNome(){
      return $this->nome;
    }

    public function setDataNascimento($dataNascimento){
      $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento(){
      return $this->dataNascimento;
    }

    public function setSexo($sexo){
      $this->sexo = $sexo;
    }

    public function getSexo(){
      return $this->sexo;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function getEmail(){
      return $this->email;
    }

    public function setCelular($celular){
      $this->celular = $celular;
    }

    public function getCelular(){
      return $this->celular;
    }

    public function setSenha($senha){
      $this->senha =$senha;
    }

    public function getSenha(){
      return $this->senha;
    }

    public function setLembreteSenha($lembreteSenha){
      $this->lembreteSenha = $lembreteSenha;
    }

    public function getLembreteSenha(){
      return $this->lembreteSenha;
    }

    public function __construct($conexao){
      $this->pdo = $conexao;
    }

    public function CriarUsuario($nome,$dataNascimento,$sexo,$email,$celular,$senha,$lembreteSenha){
      try{
        $sql = "INSERT into cliente (nome_cliente,data_nascimento,sexo,email,celular,senha,lembrete_senha) values (?,?,?,?,?,?,?)";
      }
      catch(PDOException $erro){
        echo "Erro na linha: " . $erro->getLine();
      }
    }
    
  }
 ?>
