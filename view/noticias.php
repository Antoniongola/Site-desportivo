<?php 
include_once '../controller/KissengoController.php';
$controlador = new KissengoController();
?>
<section class="projects-clean">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">
                Notícias
            </h2>
        </div>
        <div class="row projects">
            <?php foreach ($controlador->selecionarTodasPublicacoes() as $publicacao) { ?>
                <div class="col-sm-6 col-lg-4 item card">
                    <a href="materiaDefinida.php?id=<?php echo $publicacao->getId(); ?>" role="button" <?php $_SESSION['idDaMateriaEscolhida'] = $publicacao->getId(); ?>>
                        <div class="card-img">
                            <img class="img-fluid" src="../ficheiros/imagens/<?php echo $publicacao->getImagem(); ?>" style="height: 200px">
                        </div>
                        
                        <div class="card-title">
                            <h3 class="name">
                                <span>
                                    <?php echo $publicacao->getTitulo(); ?>
                                    <br>
                                </span>
                            </h3>
                        </div>
                    </a>
                    <?php if(isset($_SESSION['logado'])){ ?>
                    <a href="editarPublicacao.php?id=<?php echo $publicacao->getId(); ?>" >
                        <button class="btn btn-success" type="submit" style="padding: 5px;border-radius: 15px;border-width: 5px;height: 44px;margin-right: 5px;margin-left: 3px;">
                            Editar publicação
                        </button>
                    </a>
                    <a href="apagarPub.php?id=<?php echo $publicacao->getId(); ?>" >
                        <button class="btn btn-danger" type="button" style="padding: 5px;border-radius: 15px;border-width: 5px;height: 44px;margin-right: 5px;margin-left: 3px;">
                            Apagar publicação
                        </button>
                    </a>
                    <div style="margin: 5px"></div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>