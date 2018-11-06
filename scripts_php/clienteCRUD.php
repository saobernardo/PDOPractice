<?php
  class ClienteCRUD{

    private $pdo = null;
    public function __construct($conexao){
      $this->pdo = $conexao;
    }

    public function CreateUser($nome,$dataNascimento,$sexo,$email,$celular,$senha,$lembreteSenha){
      try{
        $sql = "INSERT into cliente (nome_cliente,data_nascimento,sexo,email,celular,senha,lembrete_senha) values (?,?,?,?,?,?,?)";

        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(1,$nome);
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

    public Change($nome,$dataNascimento,$genero,$email,$celular,$senha,$lembreteSenha,$code){
      $sql = "update cliente set nome_cliente=?,data_nascimento=?,genero=?,email=?,celular=?,senha=?,lembreteSenha,? where id_aluno=?";
      try{
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(1, $nome);
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
