<title>Nova publicação</title>
<?php 
include_once 'header.php';
session_start();
    if(!isset($_SESSION['logado'])) {
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
                    Nova publicação
                </h1>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Insira o título da noticia" required="">
            </div>
            <textarea class="form-control" placeholder="Insira a descrição da mesma notícia" required="">
                
            </textarea>
            <span style="margin-top: 7px;">
                Escolha a imagem para a notícia
            </span>
            <div class="form-group">
                <input class="form-control-file" type="file" required="" accept="image/*" style="margin-top: 7px;">
            </div>
            <div class="form-group justify-content-center align-items-center align-content-center" style="text-align: center;">
                <button class="btn btn-primary btn-lg text-center border rounded-pill" type="submit">Publicar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once 'footer.php'; ?>