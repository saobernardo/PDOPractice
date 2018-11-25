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
      return $this->nome;
    }

    public function setDataNascimento($dataNascimento){
      $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento(){
      return $this->dataNascimento;
    }

    public function setGenero($genero){
      $this->genero = $genero;
    }

    public function getGenero(){
      return $this->genero;
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
      $this->senha = $senha;
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

    function setPais($pais){
      $this->pais = $pais;
    }

    function getPais(){
      return $this->pais;
    }

    function setEstado($estado){
      $this->estado = $estado;
    }

    function getEstado(){
      return $this->estado;
    }

    function setCidade($cidade){
      $this->cidade = $cidade;
    }

    function getCidade(){
      return $this->cidade;
    }

  }
?>
