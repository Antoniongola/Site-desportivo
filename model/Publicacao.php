<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Publicacao
 *
 * @author Ngola
 */
class Publicacao {
    private $id;
    private $titulo;
    private $descricao;
    private $imagem;
    
    function __construct($id, $titulo, $descricao, $imagem) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }
    
    function getTitulo() {
        return $this->titulo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    function setImagem($imagem): void {
        $this->imagem = $imagem;
    }
}