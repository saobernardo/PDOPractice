<?php
  class ClienteCRUD{

    #Cariável que receberá a configuração e conexao PDO
    private $pdo = null;

    #Definindo configurações sobre método construtor. Toda vez que ela for chamada, ela deve receber como parâmetro uma conexão do PDO.
    #Em seguida, ele irá salvar n atributo acima, PDO
    public function __construct($conexao){
      $this->pdo = $conexao;
    }

    #Método de inserção no banco de dados
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

        #Direcionar para uma segunda página asism que tudo acima for executado
        header('location:../CadastroRealizado.php');
      }

      catch(PDOException $err){
        echo "Erro na linha: " . $err->getLine();
      }
    }

    #Método de listar os atributos de todos os clientes e adicionar em uma variável de retorndo de dados, para poder ser usada depis
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

    #Método que pega os atributos de um registro específico do bnco de dados, também com retorno
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

    #Método de update no banco de dados
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


    #Método para deletar determinado registro do banco de dados
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
