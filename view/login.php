<title>Login</title>
<?php include_once 'header.php'; ?>
    <section class="bg-white login-clean">
        <form class="bg-light" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"></div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
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