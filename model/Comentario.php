<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comentario
 *
 * @author Ngola
 */
class Comentario {
    private $fk_publicacao;
    private $comentario;
    private $autor;
    
    function __construct($fk_publicacao, $comentario, $autor) {
        $this->fk_publicacao = $fk_publicacao;
        $this->comentario = $comentario;
        $this->autor = $autor;
    }
    
    function getAutor() {
        return $this->autor;
    }

    function setAutor($autor): void {
        $this->autor = $autor;
    }

        
    function getFk_publicacao() {
        return $this->fk_publicacao;
    }

    function getComentario() {
        return $this->comentario;
    }

    function setFk_publicacao($fk_publicacao): void {
        $this->fk_publicacao = $fk_publicacao;
    }

    function setComentario($comentario): void {
        $this->comentario = $comentario;
    }


}
