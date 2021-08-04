<?php if(isset($prod)): ?>

    <h1><?=$prod->nombre;?></h1>

    <div id="detail-product">
        <div class="image">
            <?php if($prod->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" alt="Producto IMG"/>
            <?php else: ?>
                <img src="<?=base_url?>assets/img/camiseta.png" alt="Producto IMG"/>
            <?php endif; ?>          
        </div>
        <div class="data">
            <p class="description"><?=$prod->descripcion?></p>
            <p class="price"><?=$prod->precio?></p>
            <a href="#" class="button">Comprar</a>
        </div>
    </div>
<?php else: ?>
    <h1>La Producto no existe.</h1>
<?php endif; ?>