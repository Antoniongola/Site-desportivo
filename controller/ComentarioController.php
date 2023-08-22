<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComentarioController
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/kissengonews/model/comentarioservice.php';

class ComentarioController {
    //put your code here
    
    private $comentarioS = NULL;
    function __construct() {
        $this->comentarioS = new ComentarioService();
    }
    
    public function fazerComentario($fk_publicacao){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $comentario = filter_input(INPUT_POST, 'comentario');
            $name = filter_input(INPUT_POST, 'nome');
            $this->comentarioS->comentar($fk_publicacao, $comentario, $name);
            echo "<script> alert('Comentário feito com sucesso'); </script>";
        }
    }
    
    public function verTodosComentariosDaPublicacao($id){
        return $this->comentarioS->selecionarTodosComentariosDeUmaPublicacao($id);
    }
    
    public function quantidadeDeComentarios($id){
        return count($this->verTodosComentariosDaPublicacao($id));
    }
}
