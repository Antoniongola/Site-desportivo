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
require_once '/xampp/htdocs/kissengonews/model/destaquesrepository.php';
require_once '/xampp/htdocs/kissengonews/model/destaquesservicei.php';
class DestaquesService implements DestaquesServiceI{
    private $repository = NULL;
    
    public function __construct() {
        $this->repository = new DestaquesService();
    }
    
    public function apagarDestaque($id) {
        try {
            $res = $this->repository->apagarDestaque($id);
            return $res;
        } catch (PDOException $e) {
        }
    }

    public function inserirDestaque($fk_publicacao) {
        try {
            $res = $this->repository->inserirDestaque($fk_publicacao);
            return $res;
        } catch (PDOException $e) {
        }
    }

    public function trocarDestaque($idDaNovaPublicacao) {
        
    }

}
