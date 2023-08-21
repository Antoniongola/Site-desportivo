<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DestaquesServicesI
 *
 * @author Ngola
 */
interface DestaquesServiceI {
    public function inserirDestaque($fk_publicacao);
    public function apagarDestaque($id);
    public function trocarDestaque($idDaNovaPublicacao);
    
}
