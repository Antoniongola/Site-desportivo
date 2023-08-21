<?php
require_once 'comentariorepository.php';
require_once 'comentarioservicei.php';
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
}
