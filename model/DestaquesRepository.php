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

    public function selecionarTodos() {
        $destaques = Array();
        $stmt = $this->db->prepare("SELECT destaques.*, publicacao.titulo, publicacao.descricao, publicacao.imagem FROM destaques JOIN publicacao ON destaques.fk_publicacao = publicacao.id");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $destaque) {
            $destaques[] = new Destaques($destaque['id'], $destaque['fk_publicacao'], $destaque['titulo'], $destaque['descricao'], $destaque['imagem']);
        }

        return $destaques;
    }

}
