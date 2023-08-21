<?php
include_once '/xampp/htdocs/kissengonews/model/Dbconnection.php';
include_once '/xampp/htdocs/kissengonews/model/publicacao.php';
class PublicacaoRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function insert($titulo, $descricao, $imagem) {
        try {
            $stmt = $this->db->prepare("INSERT INTO publicacao (titulo, descricao, imagem) VALUES(:titulo, :descricao, :imagem)");
            $stmt->bindparam(":titulo", $titulo);
            $stmt->bindparam(":descricao", $descricao);
            $stmt->bindparam(":imagem", $imagem);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectAll() {
        $publicacoes = Array();
        $stmt = $this->db->prepare("SELECT * FROM publicacao");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $publicacao) {
            $publicacoes[] = new Publicacao($publicacao['id'], $publicacao['titulo'], $publicacao['descricao'], $publicacao['imagem']);
        }
        
        return $publicacoes;
    }
    
    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM publicacao WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $publicacao = $stmt->fetch();
        $res = new Publicacao($publicacao['id'], $publicacao['titulo'], $publicacao['descricao'], $publicacao['imagem']);
        return $res;
    }
    
    public function updateByID($id, $titulo, $descricao, $imagem) {
        try {
            $stmt = $this->db->prepare("UPDATE publicacao SET titulo=:titulo, descricao =:descricao, imagem=:imagem WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->bindparam(":titulo", $titulo);
            $stmt->bindparam(":descricao", $descricao);
            $stmt->bindparam(":imagem", $imagem);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function apagarPeloId($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM publicacao WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
