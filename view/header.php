<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <!-- <title>KissengoNews</title> -->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="../assets/css/styles.min.css">

    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md bg-secondary navigation-clean-button">
            <div class="container">
                <div class="col text-left">
                    <a class="navbar-brand" href="homepage.php"><img src="../ficheiros/imagens/logo1.png" alt="Logotipo" width="250px" height="100px"></a>
                </div>
                <div class="col">
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-2">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link text-white" href="homepage.php">Inicio</a></li>
                            <?php if (isset($_SESSION['logado'])) { ?>
                                <li class="nav-item"><a class="nav-link text-white" href="criarPublicacao.php">Criar Publicação</a></li>
                                <li class="nav-item"><a class="nav-link text-white" href="novoDestaque.php">Adicionar Destaque</a></li>
                            <?php } ?>
                        </ul><i class="fa fa-search flex-grow-0" style="width: 22.8594px;height: 14px;margin: 0px;"></i>
                        <form method="get">
                            <input type="search" name="pesquisa">
                            <a href="pesquisa.php"><button class="btn btn-primary" type="submit" style="margin-left: 12px;margin-right: 12px;">Pesquisar</button></a>
                        </form>
                        <?php if (!isset($_SESSION['logado'])) { ?>
                            <span class="navbar-text actions">
                                <a class="btn btn-light action-button" role="button" href="login.php">Login</a>
                            </span>
                        <?php } else { ?>
                            <span class="navbar-text actions">
                                <a class="btn btn-light action-button"  role="button" href="logout.php" >Sair</a>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
        <?php
        $pesquisa = filter_input(INPUT_GET, 'pesquisa');
        if (isset($pesquisa)) {
            $_SESSION['pesquisa'] = $pesquisa;
            header('location: pesquisa.php');
        }
        ?>