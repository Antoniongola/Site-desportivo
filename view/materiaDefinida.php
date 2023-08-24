<?php
session_start();
include_once '../controller/kissengocontroller.php';
include_once '../controller/comentariocontroller.php';
$controlador = new KissengoController();
$comentarioController = new ComentarioController();
$id = filter_input(INPUT_GET, 'id');
echo '<title>' . $controlador->tituloDaPaginaDinamica($id) . '</title>';
$comentarioController->fazerComentario($_SESSION['idDaMateriaEscolhida']);
?>
<?php
include_once 'header.php';
?>
<section>
    <div class="container text-center" style="margin: 0px;padding: 25px;text-align: center;">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid" src="../ficheiros/imagens/<?php echo $controlador->selecionarPublicacaoPeloId($id)->getImagem(); ?>">
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
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" style="margin-bottom: 15px">
                                    Enviar comentário
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-lg-4 item">
                <h1>
                    Outras notícias
                </h1>
                <?php foreach ($controlador->selecionarTodasPublicacoes() as $publicacao) { ?>
                    <?php if ($publicacao->getId() !== $id) { ?>
                        <div class="row">
                            <div class="col card">
                                <img class="img-fluid" src="../ficheiros/imagens/<?php echo $publicacao->getImagem(); ?>" style="margin-top: 12px;">
                                <h3 class="name">
                                    <a href="materiaDefinida.php?id=<?php echo $publicacao->getId(); ?>"><?php echo $publicacao->getTitulo(); ?></a>
                                </h3>
                                <?php if (isset($_SESSION['logado'])) { ?>
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
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>