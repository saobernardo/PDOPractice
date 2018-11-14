<?php
  class jogoCRUD{

    private $pdo = null;

    function __construct($conexao){
      $this->pdo = $conexao;
    }

    #Funções de adicionar ao banco de dados, feitas separadamente pois cada uma é em uma tabela
    function AddGame($nome,$descricao,$dataLancamento){
      try{
        $sqlGame = "INSERT INTO jogo ($nome,$descricao,$dataLancamento) values (?,?,?)";
        $stmt = $this->pdo->prepare($sqlGame);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $descricao);
        $stmt->bindValue(3, $dataLancamento);
        $stmt->execute();
        /*try{

        }*/
      }
      catch(PDOException $err){
        echo "Erro na linha: ". $err->getLine();
      }
    }

    function AddTag($tag,$precoAluguel){
      try{
        $sqlTag = "INSERT INTO tag_jogo (nome_tag, preco_aluguel) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sqlTag);
        $stmt->bindValue(1, $tag);
        $stmt->bindValue(2, $precoAluguel);
        $stmt->execute();
      }
      catch(PDOException $err){
        echo "Erro na linha: ". $err->getLine();
      }
    }

    function addFE($faixaEtaria){
      try{
        $sqlFaixaEtaria = "INSERT INTO faixa_etaria (faixa_etaria) VALUES (?)";
        $stmt= $this->pdo->prepare($sqlFaixaEtaria);
        $stmt->bindValue(1, $faixaEtaria);
        $stmt->execute();
      }
      catch(PDOException $err){
        echo "Erro na linha: " . $err->getLine();
      }
    }

    function addCategoria($categoria){
      try{
        $sqlCategoria = "INSERT INTO categoria (nome_categoria) VALUES (?)";
        $stmt = $this->pdo->prepare($sqlCategoria);
        $stmt->bindValue(1, $categoria);
        $stmt->execute();
      }
      catch(PDOException $err){
        echo "Erro na linha: ". $err->getLine();
      }
    }

    #Criando método para chamar informações de um jogo
    function selectJogo($codigo){
      try {
        
      }
      catch (PDOException $err) {
        echo "Erro na linha: ". $err->getLine();
      }

    }

  }
 ?>
