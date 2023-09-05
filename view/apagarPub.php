<?php
session_start();
include_once '../controller/KissengoController.php';
$id = filter_input(INPUT_GET, 'id');
$controlador = new KissengoController();
$controlador->apagarPublicacao($id);
if(!headers_sent()){
    header("location: homepage.php");
}else{
    echo '<script type="text/javascript"> window.location.href="homepage.php"; </script>';
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>