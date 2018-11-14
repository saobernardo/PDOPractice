<?php
  class jogoCRUD{

    private $pdo = null;

    function __construct($conexao){
      $this->pdo = $conexao;
    }

    #Funções de adicionar ao banco de dados, feitas separadamente pois cada uma é em uma tabela
    function AddGame($nome,$descricao,$dataLancamento){

    }

    function AddTag($precoAluguel,$tag){

    }

    function addFE($faixaEtaria){

    }

    function addCategoria($categoria){

    }
  }
 ?>
