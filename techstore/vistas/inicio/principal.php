<div class="main-content-inner">
    <div class="card-area">
        <div class="row">
        <?php foreach ($this->modeloProducto->Listar() as $r): ?>
        <?php $imagenRuta = 'public/' .  $r->imagen?>
            <div class="col-lg-4 col-md-6 mt-5">
                <div class="card card-bordered">
                    <img class="card-img-top img-fluid" src="<?=$imagenRuta?>" alt="<?=$imagenRuta?>">
                    <div class="card-body">
                        <h5 class="title"><?=$r->nombre?></h5>
                        <p class="card-text"><?=$r->descripcion?></p>
                        <p class="card-price">$<?=$r->precio?></p>
                        <a href="#" class="btn btn-primary" 
                            data-id="<?=$r->id?>" 
                            data-nombre="<?=$r->nombre?>" 
                            data-descripcion="<?=$r->descripcion?>" 
                            data-precio="<?=$r->precio?>" 
                            data-categoria="<?=$r->id_categoria?>" 
                            data-imagen="<?=$r->imagen?>" 
                            data-cantidad="1" 
                            onclick="agregarAlCarrito(event)">Comprar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
        
</script>
