<?php
    session_start();
    include_once '../controller/kissengocontroller.php';
    $controlador = new KissengoController();
    echo '<title>'.$controlador->tituloDaPaginaDinamica($_SESSION['idDaMateriaEscolhida']).'</title>';
?>
<?php
include_once 'header.php'; 
?>
<section>
    <div class="container text-center" style="margin: 0px;padding: 25px;text-align: center;">
        <div class="row">
            <div class="col">
                <div class="row text-center">
                    <div class="col">
                        <img class="img-fluid" src="../ficheiros/imagens/<?php echo $controlador->selecionarPublicacaoPeloId($_SESSION['idDaMateriaEscolhida'])->getImagem(); ?>">
                        <div class="row text-center">
                            <div class="col">
                                <h1>
                                    <h1>
                                        <?php echo $controlador->selecionarPublicacaoPeloId($_SESSION['idDaMateriaEscolhida'])->getTitulo(); ?>
                                    </h1>
                                </h1>
                            </div>
                        </div>
                        <p class="description">
                        </p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <h1>
                            Comentários (0)
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form class="bg-light" method="post">
                            <h2 class="text-center">
                                Adicionar Comentário
                            </h2>
                            <div class="form-group">
                                <input class="form-control" type="text" name="nome" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-sm" name="comentario" placeholder="Mensagem" rows="14">
                                    
                                </textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                                    Enviar
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
                    <?php if($publicacao->getId() !== $_SESSION['idDaMateriaEscolhida']){?>
                        <div class="row">
                            <div class="col">
                                <img class="img-fluid" src="../ficheiros/imagens/<?php echo $publicacao->getImagem(); ?>" style="margin-top: 12px;">
                                <h3 class="name">
                                    <?php echo $publicacao->getTitulo(); ?>
                                </h3>
                                <?php if(isset($_SESSION['logado'])){ ?>
                                    <button class="btn btn-success" type="submit" style="margin-bottom: 12px;margin-right: 12px;">
                                        Editar
                                    </button>
                                    <button class="btn btn-danger" type="button" style="margin-bottom: 12px;">
                                        Apagar
                                    </button>
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