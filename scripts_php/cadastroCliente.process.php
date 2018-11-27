<?php
  require_once 'Conexao.php';
  require_once 'cliente.class.php';
  require_once 'ClienteCRUD.class.php';

  #Instanciando o objeto da classe ClienteCrud
  $crudCliente = new ClienteCRUD(Conexao::getInstance());
  #Instanciando a classe cliente para poder usar seus Gets e Sets
  $novoCliente = new Cliente();

  #Pegando os nomes colocados nas caixas de texto e colocando-os nos métodos sets
  #Nomes precisam ser inseridos nas caixas de texto
  $novoCliente->setNome($_POST['cad_nome']);
  $novoCliente->setDataNascimento($_POST['cad_datanascimento']);
  $novoCliente->setGenero($_POST['cad_genero']);
  $novoCliente->setEmail($_POST['cad_email']);
  $novoCliente->setCelular($_POST['cad_celular']);
  $novoCliente->setSenha($_POST['cad_senha']);
  $novoCliente->setLembreteSenha($_POST['cad_lembretesenha']);
  $novoCliente->setPais($_POST['cad_pais']);
  $novoCliente->setEstado($_POST['cad_estado']);
  $novoCliente->setCidade($_POST['cad_cidade']);

  #invocando o método de registro no banco de dados
  $crudCliente->CreateUser($novoCliente->getNome(),$novoCliente->getDataNascimento(),$novoCliente->getGenero(),
                              $novoCliente->getEmail(),$novoCliente->getCelular(),$novoCliente->getSenha(),
                              $novoCliente->getLembreteSenha(), $novoCliente->getPais(), $novoCliente->getEstado(),
                              $novoCliente->getCidade());

 ?>
