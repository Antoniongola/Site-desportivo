<?php
session_start();
include_once 'header.php';
echo '<title>Adicionar destaque</title>';
include_once '../controller/KissengoController.php';
$controlador = new KissengoController();
$controlador->novoDestaque();

if (!isset($_SESSION['logado'])) {
    header('location: ../index.php');
}

?>
<div class="card">
    <div class="card-body">

    </div>
    <div class="container" style="margin-bottom: 40px;">
        <form class="bg-light border rounded-0 justify-content-center align-content-center" method="post" style="margin-bottom: 36px;">
            <div class="form-group">
                <h1 class="text-center">
                    Adicionar destaque
                </h1>
            </div>
            <div class="form-group">
                <label>Escolha uma notícia para destaque: </label>
                <br>
                <select name="destaque">
                    <?php foreach ($controlador->selecionarTodasPublicacoes() as $publicacao) { ?>
                        <option value="<?php echo $publicacao->getId(); ?>"> <?php echo $publicacao->getTitulo(); ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group justify-content-center align-items-center align-content-center" style="text-align: center;">
                <button class="btn btn-primary btn-lg text-center border rounded-pill" type="submit">
                    Adicionar destaque
                </button>
            </div>
        </form>
    </div>
</div>
<?php include_once 'footer.php'; ?>