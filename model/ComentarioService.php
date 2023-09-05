<?php
require_once 'ComentarioRepository.php';
require_once 'ComentarioServiceI.php';
class ComentarioService implements ComentarioServiceI {
    private $repository = NULL;
    
    public function __construct() {
        $this->repository = new ComentarioRepository();
    }
    
    public function comentar($fk_publicacao, $comentario, $autor) {
        try {
            $res = $this->repository->insert($fk_publicacao, $comentario, $autor);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function selecionarTodosComentariosDeUmaPublicacao($id){
        try {
            $res = $this->repository->selectAllCommentsOfAPub($id);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apagarComentariosDaPublicacao($id){
        try{
            return $res = $this->repository->deleteAllCommentsOfAPub($id);
        } catch (PDOException $e){
        }
    }
}
