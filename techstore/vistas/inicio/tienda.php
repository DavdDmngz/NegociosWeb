<div class="main-content-inner">
    <div class="card-area">
        <div class="row">
        <?php foreach ($this->modeloProducto->Listar() as $r): ?>
        <?php $imagenRuta = $r->imagen?>
            <div class="col-lg-4 col-md-6 mt-5">
                <div class="card card-bordered">
                    <img class="card-img-top img-fluid" src="<?=$imagenRuta?>" alt="<?=$imagenRuta?>">
                    <div class="card-body">
                        <h5 class="title"><?=$r->nombre?></h5>
                        <p class="card-text"><?=$r->descripcion?></p>
                        <p class="card-price">$<?=$r->precio?></p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>