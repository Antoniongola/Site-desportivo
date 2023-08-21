<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PublicacaoServiceI
 *
 * @author Ngola
 */
interface PublicacaoServiceI {
    function criarPublicacao($titulo, $descricao, $imagem);
    function apagarPublicacao($id);
    function editarPublicacao($id, $titulo, $descricao, $imagem);
}
