<?php
  class ClienteCRUD{

    private $pdo = null;
    public function __construct($conexao){
      $this->pdo = $conexao;
    }

    #Criando objeto da classe cliente
    $client = new Cliente();

    /*public function CreateUser($nome,$dataNascimento,$sexo,$email,$celular,$senha,$lembreteSenha){
      try{
        $sql = "INSERT into cliente (nome_cliente,data_nascimento,sexo,email,celular,senha,lembrete_senha) values (?,?,?,?,?,?,?)";

        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(1, $client$nome);
        $stm->bindValue(2,$dataNascimento);
        $stm->bindValue(3,$sexo);
        $stm->bindValue(4,$email);
        $stm->bindValue(5,$celular);
        $stm->bindValue(6,$senha);
        $stm->bindValue(7,$lembreteSenha);
        $stm->execute();
      }

      catch(PDOException $erro){
        echo "Erro na linha: " . $erro->getLine();
      }
    }*/

    public function CreateUser($client){
      try{
        $sql = "INSERT INTO cliente (nome_cliente,data_nascimento,sexo,email,celular,senha,lembrete_senha) VALUES (?,?,?,?,?,?,?)";

        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(1, $client->getNome());
        $stm->bindValue(2, $client->getDataNascimento());
        $stm->bindValue(3, $client->getGenero());
        $stm->bindValue(4, $client->getEmail());
        $stm->bindValue(5, $client->getCelular());
        $stm->bindValue(6, $client->getSenha());
        $stm->bindValue(7, $client->getLembreteSenha());
        $stm->execute();
      }

      catch(PDOException $err){
        echo "Erro na linha: " . $err->getLine();
      }
    }

    public function SelectAll(){

      try{
        $sql = "Select * from cliente";

        $stm = $this->pdo->prepare($sql);

        $stm->execute();

        $dados = $stm->fetchAll(PDO::FETCH_OBJ);
        return $dados;
      }

      catch(PDOException $err){
        echo "Erro na linha: " . $err->getLine();
      }
    }

    public function SpecificSelection($codigo){

      try{
        $sql = "Select * from cliente WHERE id_cliente=?";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(1, $codigo);

        $stmt->execute();

        $dados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $dados;
      }
      catch(PDOException $err){
        echo "Erro na linha: " .$err->getLine();
      }
    }

    /*public Change($nome,$dataNascimento,$genero,$email,$celular,$senha,$lembreteSenha,$code){
      $sql = "update cliente set nome_cliente=?,data_nascimento=?,genero=?,email=?,celular=?,senha=?,lembreteSenha,? where id_aluno=?";
      try{
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(1, $client->getNome());
        $stmt->bindValue(2, $dataNascimento);
        $stmt->bindValue(3, $genero);
        $stmt->bindValue(4, $email);
        $stmt->bindValue(5, $celular);
        $stmt->bindValue(6, $senha);
        $stmt->bindValue(7, $lembreteSenha);
        $stmt->bindValue(8, $code);

        $stmt->execute();
      }

      catch(PDOException $err){
        echo "Erro na linha ".$err->getLine();
      }
    }*/

    public Change($client,$code){
      $sql = "update cliente set nome_cliente=?,data_nascimento=?,genero=?,email=?,celular=?,senha=?,lembreteSenha,? where id_aluno=?";
      try{
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(1, $client->getNome());
        $stmt->bindValue(2, $client->getDataNascimento());
        $stmt->bindValue(3, $client->getGenero());
        $stmt->bindValue(4, $client->getEmail());
        $stmt->bindValue(5, $client->getCelular());
        $stmt->bindValue(6, $client->getSenha());
        $stmt->bindValue(7, $client->getLembreteSenha());
        $stmt->bindValue(8, $code);

        $stmt->execute();
      }

      catch(PDOException $err){
        echo "Erro na linha ".$err->getLine();
      }
    }

    public function Delete($code){
      $sql = "delete from cliente where id_cliente=?";

      try{
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $code);
        $stmt->execute();
      }
      catch(PDOException $err){
        echo "Erro na linha". $err->getLine();
      }

    }

  }
 ?>
