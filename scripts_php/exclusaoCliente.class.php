<?php

#Requisição de arquivos necesários
require_once 'Conexao.php';
require_once 'ClienteCRUD.class.php';

#Cruando objeto de ClienteCrud com o parâmetro necessário
$crud = new ClienteCRUD(Conexao::getInstance());

#Pegando o valor mndado via get e armazenando em uma váriável
$code = $_GET['code'];

#Chamando o método de ClienteCRUD com o parâmetro
$crud->Delete($code);
 ?>
