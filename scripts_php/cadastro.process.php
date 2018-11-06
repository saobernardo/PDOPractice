<?php
  require_once 'Conexao.php';
  require_once 'ClienteCRUD.class.php';

  #Instanciando o objeto dla classe ClienteCrud
  $crudCliente = new ClienteCRUD(Conexao::getInstance());

  #Atributo
  private $nome;
  private $dataNascimento;
  private $genero;
  private $email;
  private $celular;
  private $senha;
  private $lembreteSenha;

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

  #Pegando os nomes colocados nas caixas de texto e coloando-os nos métodos sets
  #Nomes precisam ser inseridos nas caixas de texto
  $this->setNome($_POST['']);
  $this->setDataNascimento($_POST['']);
  $this->setGenero($_POST['']);
  $this->setEmail($_POST['']);
  $this->setCelular($_POST['']);
  $this->setSenha($_POST['']);
  $this->setLembreteSenha($_POST['']);

  $crudCliente->CriarUsuario(getNome(),getDataNascimento(),getGenero(),getEmail(),getCelular(),getSenha(),getLembreteSenha());
 ?>
