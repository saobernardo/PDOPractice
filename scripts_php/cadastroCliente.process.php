<?php
  require_once 'Conexao.php';
  require_once 'cliente.class.php';
  require_once 'ClienteCRUD.class.php';

  #Instanciando o objeto dla classe ClienteCrud
  $crudCliente = new ClienteCRUD(Conexao::getInstance());
  $novoCliente = new Cliente();

  #Pegando os nomes colocados nas caixas de texto e colocando-os nos métodos sets
  #Nomes precisam ser inseridos nas caixas de texto
  $novoCliente->setNome($_POST['']);
  $novoCliente->setDataNascimento($_POST['']);
  $novoCliente->setGenero($_POST['']);
  $novoCliente->setEmail($_POST['']);
  $novoCliente->setCelular($_POST['']);
  $novoCliente->setSenha($_POST['']);
  $novoCliente->setLembreteSenha($_POST['']);
  $novoCliente->setPais($_POST['']);
  $novoCliente->setEstado($_POST['']);
  $novoCliente->setCidade($_POST['']);

  #invocando o método de registro no banco de dados
  $crudCliente->CriarUsuario($novoCliente->getNome(),$novoCliente->getDataNascimento(),$novoCliente->getGenero(),
                              $novoCliente->getEmail(),$novoCliente->getCelular(),$novoCliente->getSenha(),
                              $novoCliente->getLembreteSenha(), $novoCliente->getPais(), $novoCliente->getEstado(),
                              $novoCliente->getCidade());

 ?>
