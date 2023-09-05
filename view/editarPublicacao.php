<?php
session_start();
echo '<title>Editar publicação</title>';
include_once 'header.php';
include_once '../controller/KissengoController.php';

if (!isset($_SESSION['logado'])) {
    header('location: ../index.php');
}
$controlador = new KissengoController();
$id = filter_input(INPUT_GET, 'id');
$pub = $controlador->selecionarPublicacaoPeloId($id);
$controlador->editarPublicacao($id);
?>
<div class="card">
    <div class="card-body">

    </div>
    <div class="container" style="margin-bottom: 40px;">
        <form class="bg-light border rounded-0 justify-content-center align-content-center" method="post" enctype="multipart/form-data" style="margin-bottom: 36px;">
            <div class="form-group">
                <h1 class="text-center">
                    Editar publicação
                </h1>
            </div>
            <div class="form-group">
                <input class="form-control" name="titulo" type="text" value="<?php echo $pub->getTitulo(); ?>">
            </div>
            <textarea class="form-control" name="descricao"><?php echo $pub->getDescricao(); ?></textarea>
            <span style="margin-top: 7px;">
                Escolha a imagem para a notícia
            </span>
            <div class="form-group">
                <input class="form-control-file" name="imagem" type="file" accept="image/*" style="margin-top: 7px;">
            </div>
            <div class="form-group justify-content-center align-items-center align-content-center" style="text-align: center;">
                <button class="btn btn-primary btn-lg text-center border rounded-pill" type="submit">
                    Editar
                </button>
            </div>
        </form>
    </div>
</div>
<?php include_once 'footer.php'; ?>