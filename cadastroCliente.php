
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
                    require_once 'menu.php';
                ?>

            
                <div class="div_titulo">CADASTRO DE CLIENTES</div>
            
                <div class="div_form"> <!--carrega o formulario-->
                    <form action="scripts_php/cadastroCliente.process.php" method="POST">
                    <label class = "ti"> Nome: </label>
                    <input class = "quad" type="text" name="cad_nome" required placeholder="Nome Completo" autofocus maxlenght="100">

                    <br><br>

                    <label class = "ti">Data de Nascimento: </label>
                    <input class = "quad2" type="date" name="cad_datanascimento" value="DOMString" required>

                    <br><br>
                    <label class = "ti">Genero: </label>
                    <select name="cad_genero" required>
                      <option value="M">Masculino</option>
                      <option value="F">Feminino</option>
                    </select>
                    <br><br>

                    <label class = "ti">E-mail: </label>
                    <input class = "quad" type="email" name="cad_email" maxlenght="100" required placeholder="...@email.com">

                    <br><br>

                    <label class = "ti">Celular: </label>
                    <input type="number" name="cad_celular" maxlenght="13" placeholder="55 11 ...">

                    <br><br>

                    <label class = "ti">Senha: </label>
                    <input class = "quad" type="password" name="cad_senha" maxlenght="50" required>

                    <br><br>

                    <label class = "ti">Lembrete senha: </label>
                    <input  type="text" name="cad_lembretesenha" maxlenght="70">

                    <br><br>

                    <label class = "ti"> Pais: </label>
                    <input class = "quad" type="text" name="cad_pais" maxlenght="50" required>

                    <br><br>

                    <label class = "ti"> UF: </label>
                    <input type="text" name="cad_estado" maxlenght="50" required>

                    <br><br>

                    <label class = "ti">Cidade: </label>
                    <input type="text" name="cad_cidade" maxlenght="50" required>

                    <br><br>s

                    <input class = "cadastrar" type="submit" value="CADASTRAR">

              </form>
            </div>
        </div>

    </body>

</html>
