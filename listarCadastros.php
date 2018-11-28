
<!DOCTYPE html>
<html>

    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/normalize.css">


        <title>Classy Scrub™ Renting - Lista de Cadastros</title>


    </head>

    <body>
        <div class="div_container">

            <div class="div_topo">
                <?php
                #Requisições de arquivos
                require_once 'scripts_php/Conexao.php';
                require_once 'scripts_php/clienteCRUD.class.php';
                require_once 'menu.php';

                #Criando objeto de clienteCrud para usar o banco de dados e métodos
                $cliente = new ClienteCRUD(Conexao::getInstance());
                ?>
            </div>

            <div class="div_titulo">
                Lista de Clientes
            </div>

            <div class="div_form2">
                <?php
                  #Criando uma variável que receberá todos os valores que o método requisitado retornar
                    $dados = $cliente->selectAll();
                  #ara cada dado, ele fará o que foi programado abaixo
                    foreach ($dados as $registro){
                ?>
                <table class="lista-dados" border="2">
                    <tr>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>Gênero</th>
                        <th>Celular</th>
                        <th>País</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                    </tr>
                    <tr>
                      <!-- Recebendo dados do banco de dados e colocando-os nos campos da tabela -->
                        <td><?php echo $registro->nome_cliente ?></td>
                        <td><?php echo $registro->data_nascimento ?></td>
                        <td><?php echo $registro->genero ?></td>
                        <td><?php echo $registro->celular ?></td>
                        <td><?php echo $registro->pais ?></td>
                        <td><?php echo $registro->estado ?></td>
                        <td><?php echo $registro->cidade ?></td>
                    </tr>
                </table>
                <!-- Abaixo estão os botões de alterar e excluir, que vão enviar valor de id_cliente do banco de dados via _GET para o
              rquivo php especificado. -->
                <div class="links_UD">
                    <a href="alteracaoCliente.php?code=<?php echo $registro->id_cliente ?>" class="link_lista">ALTERAR</a>
                    |
                    <a href="scripts_php/exclusaoCliente.class.php?code=<?php echo $registro->id_cliente ?>" class="link_lista">EXCLUIR</a>
                </div>
                <br><br><br>
                <!-- Fim do loop -->
                <?php }?>
            </div>
        </div>
    </body>

</html>
