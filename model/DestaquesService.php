<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DestaquesService
 *
 * @author Ngola
 */
require_once 'DestaquesRepository.php';
require_once 'DestaquesServiceI.php';
class DestaquesService implements DestaquesServiceI{
    private $repository = NULL;
    
    public function __construct() {
        $this->repository = new DestaquesRepository();
    }
    
    public function apagarDestaque($id) {
        try {
            $res = $this->repository->apagarPeloId($id);
            return $res;
        } catch (PDOException $e) {
        }
    }

    public function inserirDestaque($fk_publicacao) {
        try {
            $res = $this->repository->insert($fk_publicacao);
            return $res;
        } catch (PDOException $e) {
        }
    }

    public function trocarDestaque($idDaNovaPublicacao) {
        
    }
    
    public function selecionarTodosDestaques(){
        try{
            return $this->repository->selecionarTodos();
        } catch (PDOException $e) {
        }
    }

}
