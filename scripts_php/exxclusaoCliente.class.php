<?php

require_once 'Conexao.php';
require_once 'ClienteCRUD.php';
require_once 'cliente.class.php';

$crud = new ClienteCRUD(Conexao::getInstance());

$code = $_GET['id'];

$crud->Delete($code);

 ?>
