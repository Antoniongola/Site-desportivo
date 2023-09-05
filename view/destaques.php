<?php
include_once '../controller/KissengoController.php';
include_once '../model/Destaques.php';
$controlador = new KissengoController();
$contador = 0;
?>
<div class="card">
    <div class="card-body" style="text-align: center;">
        <h4 class="text-center card-title">
            Destaques
        </h4>
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <!-- parte onde metemos as imagens -->
            <div class="carousel-inner">
                <?php foreach ($controlador->todosDestaques() as $destaques) { ?>
                    <?php if($contador === 0){ ?> 
                        <div class="carousel-item active">
                    <?php } ?>
                    <?php if($contador !== 0){ ?>
                        <div class="carousel-item">
                    <?php } ?>
                        <a role="button" href="materiaDefinida.php?id=<?php echo $destaques->getId(); ?>">
                            <img class="w-100 d-block fit"  src="../ficheiros/imagens/<?php echo $destaques->getImagem(); ?>" alt="Slide Image">
                            <h3><?php echo $destaques->getTitulo(); ?></h3>
                        </a>
                        <br>
                        <?php if(isset($_SESSION['logado'])){ ?>
                            <div>
                                <a href="removerDestaque.php?id=<?php echo $destaques->getIdDestaques(); ?>">
                                    <button class="btn btn-primary text-center" type="submit">
                                        Remover destaque
                                    </button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php $contador++; } ?>
                
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
                <?php for($contador = 1; $contador < count($controlador->todosDestaques()); $contador++){?>
                    <li data-target="#carousel-1" data-slide-to="<?php echo $contador; ?>">
                    </li>
                <?php } ?>
            </ol>
        </div>
    </div>
</div>
<div>

</div>