<?php if(isset($objetoCategoria)): ?>

    <h1><?=$objetoCategoria->nombre;?></h1>

    <?php if($productos->num_rows == 0): ?>
        <p>No hay productos para mostrar.</p>
    <?php else: ?>

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
        <a href="#" class="button">Comprar</a>
</div>

<?php endwhile; ?>

    <?php endif; ?>

<?php else: ?>
    <h1>La Categoría no existe.</h1>
<?php endif; ?>