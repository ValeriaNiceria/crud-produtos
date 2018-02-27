<?php

class Conecta {

    private static $DB_SERVIDOR;
    private static $DB_USUARIO;
    private static $DB_SENHA;
    private static $DB_BANCO;
    /* CONEXÃO UNICA */
    private static $SINGLETON;

    function __construct() {
        self::$DB_SERVIDOR = DB_SERVIDOR;
        self::$DB_USUARIO = DB_USUARIO;
        self::$DB_SENHA = DB_SENHA;
        self::$DB_BANCO = DB_BANCO;
    }

    public static function conn() {
        if (!isset(self::$SINGLETON)):
            $dsn = "mysql:host=" . self::$DB_SERVIDOR . ";dbname=" . self::$DB_BANCO . ";";
            self::$SINGLETON = new PDO($dsn, self::$DB_USUARIO, self::$DB_SENHA);

            self::$SINGLETON->exec("SET NAMES 'utf8'");
        endif;
        return self::$SINGLETON;
    }

}