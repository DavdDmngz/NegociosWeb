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
                        <!-- Formulario para añadir al carrito -->
                        <form action="?c=carrito&a=agregar" method="POST">
                            <input type="hidden" name="id" value="<?=$r->id?>">
                            <input type="hidden" name="nombre" value="<?=$r->nombre?>">
                            <input type="hidden" name="precio" value="<?=$r->precio?>">
                            <input type="hidden" name="imagen" value="<?=$imagenRuta?>">
                            <input type="number" name="cantidad" value="1" min="1" max="99">
                            <button type="submit" class="btn btn-primary">Comprar</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
