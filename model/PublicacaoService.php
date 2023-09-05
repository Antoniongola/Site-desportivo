<?php
include_once 'PublicacaoRepository.php';
include_once 'PublicacaoServiceI.php';
class PublicacaoService implements PublicacaoServiceI{
    private $repository = NULL;
    
    public function __construct() {
        $this->repository = new PublicacaoRepository();
    }
    
    public function criarPublicacao($titulo, $descricao, $imagem) {
        try {
            $res = $this->repository->insert($titulo, $descricao, $imagem);
            return $res;
        } catch (PDOException $e) {
        }
    }

    public function editarPublicacao($id, $titulo, $descricao, $imagem) {
        try {
            $res = $this->repository->updateByID($id, $titulo, $descricao, $imagem);
            return $res;
        } catch (PDOException $e) {
        }
    }

    public function apagarPublicacao($id) {
        try {
            $res = $this->repository->apagarPeloId($id);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function selecionarPublicacaoPeloId($id){
        try {
            $res = $this->repository->selectById($id);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function selecionarTodasPublicacoes(){
        try {
            $res = $this->repository->selectAll();
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function buscarPublicacoes($titulo) {
        try {
            $res = $this->repository->buscarPublicacoes($titulo);
            return $res;
        } catch (PDOException $e) {
        }
    }
}
