<?php

require_once 'Conexao.php';
require_once 'ClienteCRUD.class.php';
require_once 'cliente.class.php';

$crud = new ClienteCRUD(Conexao::getInstance());
$client = new Cliente();

$client->setNome($_POST['cad_nome']);
$client->setDataNascimento($_POST['cad_datanascimento']);
$client->setGenero($_POST['cad_genero']);
$client->setEmail($_POST['cad_email']);
$client->setCelular($_POST['cad_celular']);
$client->setSenha($_POST['cad_senha']);
$client->setLembreteSenha($_POST['cad_lembretesenha']);
$client->setPais($_POST['cad_pais']);
$client->setEstado($_POST['cad_estado']);
$client->setCidade($_POST['cad_cidade']);
$codigo = $_POST['cad_code'];

$crud->Change($client->getNome(),$client->getDataNascimento(),$client->getGenero(),$client->getEmail(),$client->getCelular(),$client->getSenha(), $client->getLembreteSenha(),$client->getPais(),$client->getEstado(),$client->getCidade(), $codigo)
 ?>
