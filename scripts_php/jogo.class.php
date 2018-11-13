<?php

  class Jogo
  {
    #Conexão de banco de dados
    require_once 'Conexão.php';
     #Método construtor
    function __construct(argument)
    {

    }

    private $nome;
    private $descricao;
    private $dataLancamento;
    private $precoAluguel; #Tabela tag_jogo
    private $tag #tabela tag_jogo
    private $faixaEtaria; #tabela faixa_etaria
    private $categoria; #tabela categoria
    private $plataforma; #Requisição do banco de dados. Um jogo seá registrado em uma plataforma e será contatdo no banco de dados

    #métodos de encapsulmento
    function setNome($nome){
      $this->nome = $nome;
    }

    function getNome(){
      return $nome;
    }

    function setDescricao($descricao){
      $this->descricao = $descricao;
    }

    function getDescricao(){
      return $descricao;
    }

    function setDataLancamento($dataLancamento){
      $this->dataLancamento = $dataLancamento;
    }

    function getDataLancamento(){
      return $dataLancamento;
    }

    function setPrecoAluguel($precoAluguel){
      $this->precoAluguel = $precoAluguel;
    }

    function getPrecoAluguel(){
      return $precoAluguel;
    }

    function setTag($tag){
      $this->tag = $tag;
    }

    function getTag(){
      return $tag;
    }

    function setFaixaEtaria($faixaEtaria){
      $this->faixaEtaria = $faixaEtaria;
    }

    function getFaixaEtaria(){
      return $faixaEtaria;
    }

    function setCategoria($categoria){
      $this->categoria = $categoria;
    }

    function getCategoria(){
      return $categoria;
    }

    function setPlataforma($plataforma){
      $this->plataforma = $plataforma;
    }

    function getPlataforma(){
      return $plataforma;
    }

    #método para fazer a média de notas recebidas pelo jogo e salvá-lo no
    function Media(){

    }

  }

 ?>
