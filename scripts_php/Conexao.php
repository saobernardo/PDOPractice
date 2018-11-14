<?php

   define('HOST', '127.0.0.1');
   define('DBNAME', 'classyrenting');
   define('CHARSET', 'utf8');
   define('USER', 'root');
   define('PASSWORD', '');

   class Conexao {

    /*Declara um atributo estático que vai armazenar o objeto da PDO do PHP.*/
    private static $pdo;

    #Método estática para criação da instancia de conexão.
    public static function getInstance() {

      /*Verifica se já existe uma conexão com a base de dados se não houver cria.*/
     if (!isset(self::$pdo)) {

      /*try - Tenta configurar e abrir uma conexão.*/
      try {
        /*Cria um array com valores de configuração para a conexão
          PDO::MYSQL_ATTR_INIT_COMMAND => Essa constante é sempre lida quando uma conexão é aberta
          SET NAMES UTF8 - Configura o PDO para trabalhar com utf8

          ATTR_PERSISTENT - Configiura o modo de persisitencia de dados como verdadeiro.

        */
       $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);

       /*Cria um objeto da classe PDO os parametros são:
       1º - DSN é o local onde a base de dados esta, .nome do banco de dados e charset
       2º - Usuário do banco de dados.
       3º - Senha do usuário do banco de dados.
       4º - Opções (esse é opicional).
       */
       self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);

       /*Configura certos atributos do banco de dados, nesse caso:
          ATTR_ERRMODE - Reporta erros vindos da base de dados.
          ERRMODE_EXCEPTION - Lança exceções de erro da base de dados
       */
       self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      /*try - Captura e trata um erro.*/
      }
      catch (PDOException $e) {

       print "Erro: " . $e->getMessage();

      }

     }
     return self::$pdo;

    }

 }
