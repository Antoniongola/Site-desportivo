<!DOCTYPE html>
<html lang="en">
    <head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <!-- <title>KissengoNews</title> -->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="../assets/css/styles.min.css">
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md fixed-top bg-secondary navigation-clean-button">
            <div class="container">
                <a class="navbar-brand" href="homepage.php">Lucas Cláudio</a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-2">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link text-white" href="homepage.php">Inicio</a></li>
                        <?php if(isset($_SESSION['logado'])){ ?>
                            <li class="nav-item"><a class="nav-link text-white" href="criarPublicacao.php">Criar Publicação</a></li>
                            <li class="nav-item"><a class="nav-link text-white" href="editarPublicacao.php">Editar destaques</a></li>
                        <?php } ?>
                    </ul><i class="fa fa-search flex-grow-0" style="width: 22.8594px;height: 14px;margin: 0px;"></i>
                    <input type="search">
                    <button class="btn btn-primary" type="submit">Pesquisar</button>
                    <?php if(!isset($_SESSION['logado'])){ ?>
                        <span class="navbar-text actions">
                            <a class="btn btn-light action-button" role="button" href="login.php">Login</a>
                        </span>
                    <?php } ?>
                </div>
            </div>
        </nav>
                <!--<script src="../assets/js/jquery.min.js"></script>
                <script src="../assets/bootstrap/js/bootstrap.min.js"></script>-->