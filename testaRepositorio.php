<?php
include_once '/xampp/htdocs/kissengonews/model/publicacaorepository.php';
include_once '/xampp/htdocs/kissengonews/controller/kissengocontroller.php';
include_once '/xampp/htdocs/kissengonews/controller/comentariocontroller.php';

$controller = new KissengoController();
//$comentario = new ComentarioController();
//$comentario->fazerComentario(1, "Essa equipa já não tem soluçao", "Ngola jr");

var_dump($controller->todosDestaques());