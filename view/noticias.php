<?php 
include_once '../controller/kissengocontroller.php';
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
                <div class="col-sm-6 col-lg-4 item card" style=" margin: 2px">
                    <a href="materiaDefinida.php?id=<?php echo $publicacao->getId(); ?>" role="button" <?php $_SESSION['idDaMateriaEscolhida'] = $publicacao->getId(); ?>>
                    <img class="img-fluid" src="../ficheiros/imagens/<?php echo $publicacao->getImagem(); ?>" style="width: 350px; height: 250px">
                        <h3 class="name">
                            <span>
                                <?php echo $publicacao->getTitulo(); ?>
                                <br>
                            </span>
                        </h3>
                    </a> 
                    <?php if(isset($_SESSION['logado'])){ ?>
                    <a href="editarPublicacao.php?id=<?php echo $publicacao->getId(); ?>" >
                        <button class="btn btn-success" onclick="<?php header('location: editarPublicacao.php'); ?>" type="submit" style="padding: 5px;border-radius: 15px;border-width: 5px;height: 44px;margin-right: 5px;margin-left: 3px;">
                            Editar publicação
                        </button>
                    </a>
                    <a href="apagarPub.php?id=<?php echo $publicacao->getId(); ?>" >
                        <button class="btn btn-danger" type="button" style="padding: 5px;border-radius: 15px;border-width: 5px;height: 44px;margin-right: 5px;margin-left: 3px;">
                            Apagar publicação
                        </button>
                    </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>