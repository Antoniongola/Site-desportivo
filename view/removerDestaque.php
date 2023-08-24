<?php
session_start();
include_once '../controller/kissengocontroller.php';
$id = filter_input(INPUT_GET, 'id');
$controlador = new KissengoController();
$controlador->apagarDestaque($id);
header('location: ../index.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

