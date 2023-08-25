<?php 
echo '<title>Login</title>';
include_once 'header.php'; 
include_once '../controller/kissengocontroller.php';
$controlador = new KissengoController();
$controlador->login();
?>
    <section class="bg-white login-clean">
        <form class="bg-light" method="post">
            <h2 class="text-center">Login</h2>
            <div class="illustration"></div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Senha">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Log In
                </button>
            </div>
            <!-- <a class="forgot" href="#">Esqueceu a senha?</a> -->
        </form>
    </section>
<?php include_once 'footer.php' ?>