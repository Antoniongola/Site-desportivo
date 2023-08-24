<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComentarioRepository
 *
 * @author Ngola
 */
require_once 'dbconnection.php';
require_once 'comentario.php';
class ComentarioRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function insert($fk_publicacao, $comentario, $autor) {
        try {
            $stmt = $this->db->prepare("INSERT INTO comentario (fk_publicacao, comentario, autor) VALUES(:fk_publicacao, :comentario, :autor)");
            $stmt->bindparam(":fk_publicacao", $fk_publicacao);
            $stmt->bindparam(":comentario", $comentario);
            $stmt->bindparam(":autor", $autor);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectAllCommentsOfAPub($id) {
        $comentarios = Array();
        $stmt = $this->db->prepare("SELECT * FROM comentario where fk_publicacao = :id");
        $stmt->bindparam(":id", $id);
        //$stmt->execute(['id' => $id]);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $comentario) {
            $comentarios[] = new Comentario($comentario['id'] ,$comentario['fk_publicacao'], $comentario['comentario'], $comentario['autor']);
        }
        
        return $comentarios;
    }
}