<?php
  class ClienteCRUD{

    private $pdo = null;

    public function __construct($conexao){
      $this->pdo = $conexao;
    }

    public function CreateUser($nome, $dataNascimento, $genero, $email, $celular, $senha, $lembreteSenha, $pais, $estado, $cidade){
      try{
        $sql = "INSERT INTO cliente (nome_cliente, 
                                      data_nascimento,
                                      genero,
                                      email,
                                      celular,
                                      senha,
                                      lembrete_senha,
                                      pais,
                                      estado,
                                      cidade)
        VALUES (?,?,?,?,?,?,?,?,?,?);";

        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(1, $nome);
        $stm->bindValue(2, $dataNascimento);
        $stm->bindValue(3, $genero);
        $stm->bindValue(4, $email);
        $stm->bindValue(5, $celular);
        $stm->bindValue(6, $senha);
        $stm->bindValue(7, $lembreteSenha);
        $stm->bindValue(8, $pais);
        $stm->bindValue(9, $estado);
        $stm->bindValue(10, $cidade);
        $stm->execute();

        header('location:../CadastroRealizado.php');
      }

      catch(PDOException $err){
        echo "Erro na linha: " . $err->getLine();
      }
    }

    public function SelectAll(){

      try{
        $sql = "SELECT id_cliente, nome_cliente, data_nascimento, genero, celular, pais, estado, cidade FROM cliente";

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
        $sql = "SELECT * FROM cliente WHERE id_cliente=?";

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

    public function Change($nome, $dataNascimento, $genero, $email, $celular, $senha, $lembreteSenha, $pais, $estado, $cidade, $code){
      $sql = "UPDATE cliente SET nome_cliente=?, data_nascimento=?, genero=?, email=?, celular=?, senha=?, lembrete_senha=?, pais=?, estado=?, cidade=? WHERE id_cliente=?";
      try{
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $dataNascimento);
        $stmt->bindValue(3, $genero);
        $stmt->bindValue(4, $email);
        $stmt->bindValue(5, $celular);
        $stmt->bindValue(6, $senha);
        $stmt->bindValue(7, $lembreteSenha);
        $stmt->bindValue(8, $pais);
        $stmt->bindValue(9, $estado);
        $stmt->bindValue(10, $cidade);
        $stmt->bindValue(11, $code);
        $stmt->execute();

          echo '<script>alert("Exclusão feita com sucesso")</script>';
      }

      catch(PDOException $err){
        echo "Erro na linha " . $err->getLine();
      }
    }


    #Função de apagar do banco
    public function Delete($code){

      $sql = "DELETE FROM cliente WHERE id_cliente=?";

      try{
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $code);
        $stmt->execute();

        echo '<script>alert("Exclusão feita com sucesso")</script>';

        header('location:../listarCadastros.php');
      }

      catch(PDOException $err){
        echo "Erro na linha". $err->getLine();
      }

    }

  }
 ?>
