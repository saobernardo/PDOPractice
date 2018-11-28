
<!DOCTYPE html>
<html>

    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/estilo.css">

        <title>Classy Scrub™ Renting - Cadastro de usuário</title>


    </head>

    <body>

        <div class="div_container">
               <?php
                    #Faendo require de arquivos necessários
                    require_once 'scripts_php/Conexao.php';
                    require_once 'scripts_php/clienteCRUD.class.php';
                    require_once 'menu.php';

                    #Criando uma variável que receberá o valor transportado por _GET
                    $cod = $_GET['code'];
                    #Criando objeto de CRUD
                    $crud = new ClienteCRUD(Conexao::getInstance());
                    #Chamando o método de crud e armazenando seu retorno em uma variável
                    $cliente = $crud->SpecificSelection($cod);


                ?>


                <div class="div_titulo">Alteração de cadastro</div>

                <div class="div_form"> <!--carrega o formulario-->
                    <?php foreach ($cliente as $dados){ ?>
                    <form action="scripts_php/alteracaoCliente.process.php" method="POST">

                    <input type="hidden" name="cad_code" value="<?php echo $dados->id_cliente ?>">

                    <label class = "ti"> Nome: </label>
                    <input class = "quad" type="text" name="cad_nome" required autofocus maxlenght="100" value="<?php echo $dados->nome_cliente ?>">

                    <br><br>

                    <label class = "ti">Data de Nascimento: </label>
                    <input class = "quad2" type="date" name="cad_datanascimento" value="<?php echo $dados->data_nascimento ?>" required>

                    <br><br>
                    <label class = "ti">Genero: </label>
                    <select name="cad_genero" required>
                      <option value="M">Masculino</option>
                      <option value="F">Feminino</option>
                    </select>
                    <br><br>

                    <label class = "ti">E-mail: </label>
                    <input class = "quad" type="email" name="cad_email" maxlenght="100" required value="<?php echo $dados->email ?>">

                    <br><br>

                    <label class = "ti">Celular: </label>
                    <input type="number" name="cad_celular" maxlenght="13" value="<?php echo $dados->celular ?>">

                    <br><br>

                    <label class = "ti">Senha: </label>
                    <input class = "quad" type="password" name="cad_senha" maxlenght="50" required>

                    <br><br>

                    <label class = "ti">Lembrete senha: </label>
                    <input type="text" name="cad_lembretesenha" maxlenght="70">

                    <br><br>

                    <label class = "ti"> Pais: </label>
                    <input class = "quad" type="text" name="cad_pais" maxlenght="50" value="<?php echo $dados->pais ?>" required>

                    <br><br>

                    <label class = "ti"> UF: </label>
                    <input type="text" name="cad_estado" maxlenght="50" value="<?php echo $dados->estado ?>" required>

                    <br><br>

                    <label class = "ti">Cidade: </label>
                    <input type="text" name="cad_cidade" maxlenght="50" value="<?php echo $dados->cidade ?>" required>

                    <br><br>

                    <input class = "cadastrar" type="submit" value="CADASTRAR">

              </form>
            <?php }?>
            </div>
        </div>

    </body>

</html>
