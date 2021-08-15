<?php
require_once 'classes/Lista.php';

class ListaForm{

    private $html;
    private $titulo;

    public function __construct()
    {
        $this->html = file_get_contents('html/main.html');
        $this->titulo = null;
    }

    public function show()
    {
        $this->html = str_replace('{titulo}', $this->titulo, $this->html);
        print $this->html;
    }

    public function criar()
    {
        try
        {
            $lista = $_POST['titulo'];
            Lista::createList($lista);
        } 
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }
}