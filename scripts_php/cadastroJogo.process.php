<?php
  require_once 'Conexao.php';
  require_once 'jogo.class.php';
  require_once 'jogoCrud.class.php';

  #Instanciando a conexão do ClienteCrud
  $crudJogo = new jogoCRUD(Conexao::getInstance());
  #Instanciando o objeto da classe jogo para poder usar seus métodos
  $novoJogo = new Jogo();

  #Definindo os valores os atributos da classe jogo
  $novoJogo->setNome($_POST['']);
  $novoJogo->setDescricao($_POST['']);
  $novoJogo->setDataLancamento($_POST['']);
  $novoJogo->setTag($_POST['']);
  $novoJogo->setFaixaEtaria($_POST['']);
  $novoJogo->setCategoria($_POST['']);

  #Chamando os métodos de CRUD para armazenar no banco de dados
  $crudJogo->AddGame($novoJogo->getNome(),$novoJogo->getDescricao()->,$novoJogo->getDataLancamento());

?>
