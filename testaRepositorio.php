<?php
include_once '/xampp/htdocs/kissengonews/model/publicacaorepository.php';
include_once '/xampp/htdocs/kissengonews/controller/kissengocontroller.php';

$title = "New Page Title";
$content = "This is the content of the new page.";
$controller = new KissengoController();
// Step 2: Generate HTML
$html = "<!DOCTYPE html>
<html>
<head>
    <title>$title</title>
</head>
<body>
    <h1>$title</h1>
    <p>$content</p>
</body>
</html>";
$controller->contacte("20200446@isptec.co.ao", "ngola jr", "testando os serviços do website de notícias");
//Essa cena tá criar bem o ficheiro
//$controller->criarFicheiro("Manchester United perde pro Tottenham Hotspurs", $html);
