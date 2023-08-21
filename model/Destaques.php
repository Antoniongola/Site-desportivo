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
include_once '/xampp/htdocs/kissengonews/model/publicacao.php';
class Destaques extends publicacao{
    private $id;
    private $fk_publicacao;
    
    function __construct($id, $fk_publicacao,$titulo, $descricao, $imagem) {
        parent::__construct($fk_publicacao, $titulo, $descricao, $imagem);
        $this->id = $id;
        $this->fk_publicacao = $fk_publicacao;
    }

    function getIdDestaques() {
        return $this->id;
    }

    function setIdDestaques($id): void {
        $this->id = $id;
    }
}
