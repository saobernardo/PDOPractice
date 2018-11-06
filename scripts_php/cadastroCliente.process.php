<?php
  require_once 'Conexao.php';
  require_once 'cliente.class.php'
  require_once 'ClienteCRUD.class.php';

  #Instanciando o objeto dla classe ClienteCrud
  $crudCliente = new ClienteCRUD(Conexao::getInstance());

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
