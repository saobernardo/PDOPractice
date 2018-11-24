<?php
  class jogoCRUD{

    private $pdo = null;
    private $lastID = 0;

    function __construct($conexao){
      $this->pdo = $conexao;
    }

    #Funções de adicionar ao banco de dados, feitas separadamente pois cada uma é em uma tabela
    function AddGame($nome,$descricao,$dataLancamento,$idMedia,$idTag){
      try{
        $sqlGame = "INSERT INTO jogo (nome_jogo,descricao_jogo,data_lancamento,id_media,id_tag) values (?,?,?,?,?) /* RETURNING id_jogo*/";
        $stmt = $this->pdo->prepare($sqlGame);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $descricao);
        $stmt->bindValue(3, $dataLancamento);
        $stmt->bindValue(5, $idTag)
        $stmt->execute();
        #Salvando o último id inserido e salvando em um atributo global chamando $lastID
        $this->$lastID = PDO::lastInsertID();
        #$this->lastID = PDO::fetchAll(PDO::FETCH_ASSOC);
      }
      catch(PDOException $err){
        echo "Erro na linha: ". $err->getLine();
      }
    }

    /*function AddTag($tag,$precoAluguel){
      try{
        $sqlTag = "INSERT INTO tag_jogo (id_tag, nome_tag, preco_aluguel) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sqlTag);
        $stmt->bindValue(1, $this->lastID);
        $stmt->bindValue(2, $tag);
        $stmt->bindValue(3, $precoAluguel);
        $stmt->execute();
      }
      catch(PDOException $err){
        echo "Erro na linha: ". $err->getLine();
      }
    }*/

    function addFE($faixaEtaria){
      try{
        $sqlFaixaEtaria = "INSERT INTO jogo_has_faixaetaria (id_jogo, id_faixaetaria) VALUES (?,?)";
        $stmt= $this->pdo->prepare($sqlFaixaEtaria);
        $stmt->bindValue(1, $this->lastID);
        $stmt->bindValue(2, $faixaEtaria);
        $stmt->execute();
      }
      catch(PDOException $err){
        echo "Erro na linha: " . $err->getLine();
      }
    }*/

    function addCategoria($categoria){
      try{
        $sqlCategoria = "INSERT INTO categoria (id_categoria, nome_categoria) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sqlCategoria);
        $stmt->bindValue(1, $this->lastID);
        $stmt->bindValue(2, $categoria);
        $stmt->execute();
      }
      catch(PDOException $err){
        echo "Erro na linha: ". $err->getLine();
      }
    }*/

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
