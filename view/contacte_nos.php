<?php
session_start();
include_once 'header.php';
echo '<title>Contacte-nos</title>';
include_once '../controller/KissengoController.php';
$controller = new KissengoController();
$controller->contacte();
?>
<section class="bg-white contact-clean">
    <form class="bg-light" method="post">
        <h2 class="text-center">Contacte-nos</h2>
        <div class="form-group">
            <input class="form-control" type="text" name="nome" placeholder="Seu nome">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="Seu email para que o respondamos" inputmode="email">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="message" placeholder="A sua mensagem para a nossa equipa" rows="14"></textarea>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-primary" type="submit">
                Enviar
            </button>
        </div>
    </form>
</section>
<?php include_once 'footer.php'; ?>