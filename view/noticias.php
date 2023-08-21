<?php 
include_once '../controller/kissengocontroller.php';

?>
<section class="projects-clean">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">
                Notícias
            </h2>
        </div>
        <div class="row projects">
            <div class="col-sm-6 col-lg-4 item" style="padding: 5px;">
                <img class="img-fluid" src="../assets/img/desk.jpg" style="width: 350px;">
                <h3 class="name">
                    Project Name
                </h3>
                <?php if(isset($_SESSION['logado'])){ ?>
                    <button class="btn btn-success" type="submit" style="padding: 5px;border-radius: 15px;border-width: 5px;height: 44px;margin-right: 5px;margin-left: 3px;">
                        Editar publicação
                    </button>
                    <button class="btn btn-danger" type="button" style="padding: 5px;border-radius: 15px;border-width: 5px;height: 44px;margin-right: 5px;margin-left: 3px;">
                        Apagar publicação
                    </button>
                <?php } ?>
            </div>
            <!-- <div class="col-sm-6 col-lg-4 item">
                <img class="img-fluid" src="../assets/img/building.jpg">
                <h3 class="name">
                    Project Name
                </h3>
            </div>
            <div class="col-sm-6 col-lg-4 item">
                <img class="img-fluid" src="../assets/img/loft.jpg">
                <h3 class="name">
                    Project Name
                </h3>
            </div>
            <div class="col-sm-6 col-lg-4 item">
                <img class="img-fluid" src="../assets/img/minibus.jpeg">
                <h3 class="name">
                    Project Name
                </h3>
            </div> -->
        </div>
    </div>
</section>