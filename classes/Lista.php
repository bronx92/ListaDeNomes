<?php

class Lista{

    private $conn;

    public static function getConnection()
    {
        if(empty(self::$conn))
        {
            $conexao = parse_ini_file('config/lista.ini');
            $host = $conexao['host'];
            $name = $conexao['name'];
            $user = $conexao['user'];
            $pass = $conexao['pass'];

            self::$conn = new PDO("pgsql:dbname={$name};user={$user};password={$pass};host={$host}");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

    public static function sanitizeString($nome) 
    {
        $nome = preg_replace('/[áàãâä]/ui', 'a', $nome);
        $nome = preg_replace('/[éèêë]/ui', 'e', $nome);
        $nome = preg_replace('/[íìîï]/ui', 'i', $nome);
        $nome = preg_replace('/[óòõôö]/ui', 'o', $nome);
        $nome = preg_replace('/[úùûü]/ui', 'u', $nome);
        $nome = preg_replace('/[ç]/ui', 'c', $nome);
        // $nome = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $nome);
        $nome = preg_replace('/[^a-z0-9]/i', '_', $nome);
        $nome = preg_replace('/_+/', '_', $nome); // ideia do Bacco :)
        return $nome;
    }

    public static function createList($titulo)
    {
        //$conn = self::getConnection();
        $lista = self::sanitizeString($titulo);
        print $lista;
    }
}