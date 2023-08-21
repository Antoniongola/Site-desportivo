<?php 
include_once '../controller/kissengocontroller.php';

?>
<div class="card">
    <div class="card-body" style="text-align: center;">
        <h4 class="text-center card-title">
            Destaques
        </h4>
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <!-- parte onde metemos as imagens -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100 d-block" src="../assets/img/building.jpg" alt="Slide Image">
                </div>
                <div class="carousel-item">
                    <img class="w-100 d-block" src="../assets/img/desk.jpg" alt="Slide Image">
                </div>
                <div class="carousel-item">
                    <img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image">
                </div>
            </div>
            <div>
                <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon">
                        
                    </span>
                    <span class="sr-only">
                        Previous
                    </span>
                </a>
                <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon">
                        
                    </span>
                    <span class="sr-only">
                        Next
                    </span>
                </a>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active">
                    
                </li> 
                <li data-target="#carousel-1" data-slide-to="1">
                    
                </li>
                <li data-target="#carousel-1" data-slide-to="2">
                    
                </li>
            </ol>
        </div>
        <?php if(isset($_SESSION['logado'])){ ?>
            <button class="btn btn-primary text-center" type="submit">
                Trocar Destaque
            </button>
            <button class="btn btn-danger" type="button" style="margin: 10px;padding: 6px 12px;">
                Remover Destaque
            </button>
        <?php } ?>
    </div>
</div>
<div>
    
</div>