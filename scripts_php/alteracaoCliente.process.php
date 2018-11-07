<?php

require_once 'Conexao.php';
require_once 'ClienteCRUD.php';
require_once 'client.class.php';

$crud = new ClienteCRUD(Conexao::getInstance());
$client = new Cliente();

$client->setNome($_POST['']);
$client->setDataNascimento($_POST['']);
$client->setGenero($_POST['']);
$client->setEmail($_POST['']);
$client->setCelular($_POST['']);
$client->setSenha($_POST['']);
$client->setLembreteSenha($_POST['']);
$client->setPais($_POST['']);
$client->setEstado($_POST['']);
$client->setCidade($_POST['']);
$code = $_POST[''];

$crud->Change($client->getNome(),$client->getDataNascimento(),$client->getGenero(),$client->getEmail(),$client->getCelular(),$client->getSenha(), $client->getLembreteSenha(),$client->getPais(),$client->getEstado(),$client->getCidade(), $code)
 ?>
