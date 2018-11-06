<?php
  require_once 'Conexao.php';
  require_once 'ClienteCRUD.class.php';

  #Instanciando o objeto dla classe ClienteCrud
  $crudCliente = new ClienteCRUD(Conexao::getInstance());

  #Atributo
  private $nome;
  private $dataNascimento;
  private $sexo;
  private $email;
  private $celular;
  private $senha;
  private $lembreteSenha;

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

  #Pegando os nomes colocados nas caixas de texto e coloando-os nos métodos sets
  $this->setNome($_POST['']);
  $this->setDataNascimento($_POST['']);
  $this->setSexo($_POST['']);
  $this->setEmail($_POST['']);
  $this->setCelular($_POST['']);
  $this->setSenha($_POST['']);
  $this->setLembreteSenha($_POST['']);

  $crudCliente->CriarUsuario(getNome(),getDataNascimento(),getSexo(),getEmail(),getCelular(),getSenha(),getLembreteSenha());
 ?>
