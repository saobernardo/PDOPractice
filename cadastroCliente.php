<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <title>Bem-vindo à Classy Scrub™ Renting</title>
  </head>
  <body>
      <div class="container">

        <?php require_once 'menu_topo.php' ?>
        <?php require_once 'menu_lateral.php'?>

        <div class="content">
            <form action="scripts_php/cadastroCliente.process.php" method="POST">
            <label>Nome: </label><br>
            <input type="text" name="cad_nome" maxlenght="100" required placeholder="Nome completo" autofocus>
            <br><br>
            <label>Data de Nascimento:</label><br>
            <input type="date" name="cad_datanascimento" value="DOMString" required>
            <br><br>
            <label>Gênero: </label><br>
            <select name="cad_genero" required>
              <option value="M">Masculino</option>
              <option value="F">Feminino</option>
            </select>
            <br><br>
            <label>E-mail: </label><br>
            <input type="email" name="cad_email" maxlenght="100"    required placeholder="@hotmail, @gmail...">
            <br><br>
            <label>Celular: </label><br>
            <input type="number" name="cad_celular" maxlenght="13"  placeholder="5511987654321">
            <br><br>
            <label>Senha: </label><br>
            <input type="password" name="cad_senha" maxlenght="50"  required>
            <br><br>
            <!--<label>Confirme sua senha: </label>
            <input type="password" name="confirmaSenha" maxlenght"50"   required>
            <br><br> -->
            <label>Lembrete de sua senha: </label><br>
            <input type="text" name="cad_lembretesenha" maxlenght="70"  required>
            <br><br>
            <hr width="80%" align="center">
            <label>País:</label><br>
            <input type="text" name="cad_pais" maxlenght="50" required  placeholder="Brasil">
            <br><br>
            <label>Estado:</label><br>
            <input type="text" name="cad_estado" maxlength="50"     required>
            <br><br>
            <label>Cidade:</label><br>
            <input type="text" name="cad_cidade" maxlenght="50"     required>
            <br><br>
            <input type="submit" value="Cadastrar">
            </form>
        </div>
      </div>
  </body>
</html>
