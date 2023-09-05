<?php
session_start();
include_once '../controller/KissengoController.php';
include_once '../controller/ComentarioController.php';
$controlador = new KissengoController();
$comentarioController = new ComentarioController();
$id = filter_input(INPUT_GET, 'id');
include_once 'header.php';
echo '<meta property="og:image" content="https://lfsportlda.000webhostapp.com/ficheiros/imagens/' . $controlador->selecionarPublicacaoPeloId($id)->getImagem() . '" />';
echo '<title>' . $controlador->tituloDaPaginaDinamica($id) . '</title>';
$comentarioController->fazerComentario($id);
?>
<section>
    <div class="container " style="margin: 0px;padding: 25px;">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid text-center"  src="../ficheiros/imagens/<?php echo $controlador->selecionarPublicacaoPeloId($id)->getImagem(); ?>">
                        <div class="row text-center">
                            <div class="col">
                                <h1>
                                    <h1>
                                        <?php echo $controlador->selecionarPublicacaoPeloId($id)->getTitulo(); ?>
                                    </h1>
                                </h1>
                            </div>
                        </div>
                        <p class="description">
                            <?php echo $controlador->selecionarPublicacaoPeloId($id)->getDescricao(); ?>
                        </p>
                    </div>
                </div>
                
                <div class="fb-share-button" data-href="https://lfsportlda.000webhostapp.com/view/materiaDefinida.php?id=<?php echo $id; ?>" data-layout="" data-size=""><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Flfsportlda.000webhostapp.com%2Fview%2FmateriaDefinida.php%3Fid%3D<?php echo $id; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partilhar no Facebook</a>
                </div>
                
                <br>
                <br>
                
                <div class="row text-center" style="border-radius: 5%">
                    <div class="col">
                        <div class="bg-light">
                            <h1>
                                Comentários (<?php echo($comentarioController->quantidadeDeComentarios($id)); ?>)
                                <br>
                                <br>
                            </h1>
                            <?php foreach ($comentarioController->verTodosComentariosDaPublicacao($id) as $comentario) { ?>
                                <div>
                                    <img src="../ficheiros/imagens/userprofile.png" style="border-radius: 50%; width: 125px; height: 125px;">
                                    <div>
                                        <h3> <?php echo $comentario->getAutor(); ?> </h3>
                                    </div>
                                    <div>
                                        <?php echo $comentario->getComentario(); ?>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <form class="bg-light" method="post" style="border-radius: 5%">
                            <h2 class="text-center">
                                Adicionar Comentário
                            </h2>
                            <div class="form-group">
                                <input class="form-control" type="text" name="nome" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-sm" name="comentario" placeholder="O seu comentário" rows="14">
                                    
                                </textarea>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit" style="margin-bottom: 15px">
                                    Enviar comentário
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-lg-4 item">
                <h1 class="text-center">
                    Outras notícias
                </h1>
                <?php foreach ($controlador->selecionarTodasPublicacoes() as $publicacao){ ?>
                    <?php if ($publicacao->getId() !== $id){ ?>
                        <div class="row">
                            <div class="col bg-light card item card">
                                <div class="card-img">
                                    <img class="img-fluid" src="../ficheiros/imagens/<?php echo $publicacao->getImagem(); ?>" style="margin-top: 12px;">
                                </div>
                                <div class="card-title text-center">
                                    <h3 class="name">
                                        <a href="materiaDefinida.php?id=<?php echo $publicacao->getId(); ?>"><?php echo $publicacao->getTitulo(); ?></a>
                                    </h3>
                                </div>
                                <div class="text-center">
                                    <?php if (isset($_SESSION['logado'])){ ?>
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
                                        <br>
                                        <br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>