<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Destaques
 *
 * @author Ngola
 */
include_once 'Publicacao.php';
class Destaques extends publicacao{
    private $idDestaque;
    //private $fk_publicacao;
    
    function __construct($id, $fk_publicacao,$titulo, $descricao, $imagem) {
        parent::__construct($fk_publicacao, $titulo, $descricao, $imagem);
        $this->idDestaque = $id;
        //$this->fk_publicacao = $fk_publicacao;
    }

    function getIdDestaques() {
        return $this->idDestaque;
    }

    function setIdDestaques($id): void {
        $this->id = $id;
    }
}
