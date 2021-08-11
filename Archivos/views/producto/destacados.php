
<h1>Algunos de nuestros Productos.</h1>

<?php while($product = $productos->fetch_object()): ?>

<div class="product">
    <a href="<?=base_url?>Archivos/?controller=producto&action=ver&id=<?=$product->id?>">
        <?php if($product->imagen != null): ?>
            <img src="/uploads/images/<?=$product->imagen?>" alt="Producto IMG"/>
        <?php else: ?>
            <img src="<?=base_url?>assets/img/camiseta.png" alt="Producto IMG"/>
        <?php endif; ?>
        <h2><?=$product->nombre?></h2>
    </a>
        <p><?=$product->precio?></p>
        <a href="<?=base_url?>Archivos/?controller=carrito&action=add&id=<?=$product->id?>" class="button">Comprar</a>
</div>

<?php endwhile; ?>



