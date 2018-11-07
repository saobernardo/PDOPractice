<?php
  class Cliente{

    #Atributo
    private $nome;
    private $dataNascimento;
    private $genero;
    private $email;
    private $celular;
    private $senha;
    private $lembreteSenha;
    private $pais;
    private $estado;
    private $cidade;

    #Métodos de encapsulamento
    public function setNome($nome){
      $this->nome = $nome;
    }

    public function getNome(){
      return $nome;
    }

    public function setDataNascimento($dataNascimento){
      $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento(){
      return $dataNascimento;
    }

    public function setGenero($genero){
      $this->genero = $genero;
    }

    public function getGenero(){
      return $genero;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function getEmail(){
      return $email;
    }

    public function setCelular($celular){
      $this->celular = $celular;
    }

    public function getCelular(){
      return $celular;
    }

    public function setSenha($senha){
      $this->senha = $senha;
    }

    public function getSenha(){
      return $senha;
    }

    public function setLembreteSenha($lembreteSenha){
      $this->lembreteSenha = $lembreteSenha;
    }

    public function getLembreteSenha(){
      return $lembreteSenha;
    }

    function setPais($pais){
      $this->pais = $pais;
    }

    function getPais(){
      return $pais;
    }

    function setEstado($estado){
      $this->estado = $estado;
    }

    function getEstado(){
      return $estado;
    }

    function setCidade(){
      $this->cidade = $cidade;
    }

    function getCidade(){
      return $cidade;
    }

  }
?>
