<?php

require_once 'Conexao.php';
require_once 'ClienteCRUD.class.php';
require_once 'cliente.class.php';

$crud = new ClienteCRUD(Conexao::getInstance());

$code = $_GET['code'];

$crud->Delete($code);


 ?>
