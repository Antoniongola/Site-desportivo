<title>Página Inicial</title>
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once 'header.php';
include_once 'destaques.php';
var_dump($_SESSION['logado']);
include_once 'noticias.php';
include_once 'footer.php';

