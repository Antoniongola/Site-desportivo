<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DestaquesRepository
 *
 * @author Ngola
 */
require_once '/xampp/htdocs/kissengonews/model/dbconnection.php';
require_once '/xampp/htdocs/kissengonews/model/destaques.php';
class DestaquesRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function insert($fk_publicacao) {
        try {
            $stmt = $this->db->prepare("INSERT INTO destaques (fk_publicacao) VALUES(:fk_publicacao)");
            $stmt->bindparam(":fk_publicacao", $fk_publicacao);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function apagarPeloId($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM destaques WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
