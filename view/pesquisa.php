<?php
include_once 'header.php';
include_once '../controller/kissengocontroller.php';
$controlador = new KissengoController();
$titulo = filter_input(INPUT_GET, 'pesquisa');
echo '<title>Busca: ' . $_SESSION['pesquisa'] . ' </title>';
?>
<section class="projects-clean">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">
                Notícias
            </h2>
        </div>
        <div class="row projects">
            <?php foreach ($controlador->buscarPublicacoes($_SESSION['pesquisa']) as $publicacao) { ?>
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
                    <?php if (isset($_SESSION['logado'])) { ?>
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
            <?php }if(count($controlador->buscarPublicacoes($titulo))==0){ ?>
                <div class="intro">
                    <h2 class="text-center">
                        INFELIZMENTE NÃO EXISTE NENHUMA MATÉRIA RELACIONADA A SUA PESQUISA, TENTE NOVAMENTE 
                    </h2>
                    <div class="text-center">
                        <a href="../index.php">
                            <button class="btn btn-primary">Voltar pra página inicial</button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php
include_once 'footer.php';
?>