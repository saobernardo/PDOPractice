
<!DOCTYPE html>
<html>

    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/normalize.css">


        <title>Classy Scrub™ Renting</title>


    </head>

    <body>
        <div class="div_container">
            <div class="div_topo">
                <?php require_once 'menu.php'?>
            </div>     
            
                <div class="div_titulo">
                    Usuário cadastrado com sucesso!
                </div>
            </div>
        <?php 
            $dormir = 5; 
            sleep($dormir);
            header('location: listarCadastros.php');
        ?>

    </body>

</html>
