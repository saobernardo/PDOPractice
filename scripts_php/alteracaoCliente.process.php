<?php
#Chamando arquivos PHP necessários
require_once 'Conexao.php';
require_once 'ClienteCRUD.class.php';
require_once 'cliente.class.php';

#Criando objeto de clienteCRUD
$crud = new ClienteCRUD(Conexao::getInstance());
#criando objeto da classe  cliente
$client = new Cliente();

#Adicionando o que foi mandado via POST para os sets da classe Cliente
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

#Chamando o método de alteração
$crud->Change($client->getNome(),$client->getDataNascimento(),$client->getGenero(),$client->getEmail(),$client->getCelular(),$client->getSenha(), $client->getLembreteSenha(),$client->getPais(),$client->getEstado(),$client->getCidade(), $codigo)
 ?>
