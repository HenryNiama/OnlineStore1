<h1>Carrito de la compra</h1>

<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>IMAGEN</th>
            <th>NOMBRE</th>
            <th>PRODUCTO</th>
            <th>UNIDADES</th>
        </tr>

    </thead>
        <tbody>
        <?php 
            foreach($carrito as $indice => $elemento):
                $producto = $elemento['producto'];    
        ?>
        <tr>
            <td>
                <?php if($producto->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="Producto IMG"
                    class="img_carrito"/>
                <?php else: ?>
                    <img src="<?=base_url?>assets/img/camiseta.png" alt="Producto IMG"
                    class="img_carrito"/>
                <?php endif; ?>    
            </td>
            <td>
                <a href="<?=base_url?>Archivos/?controller=producto&action=ver&id=<?=$producto->id?>"><?= $producto->nombre?></a>
            </td>
            <td>
                <?= $producto->precio?>
            </td>
            <td>
                <?= $elemento['unidades']?>
            </td>
        </tr>

        <?php endforeach; ?>   

        </tbody>
</table>

<br>


<div class="total-carrito">
    <?php $stats = Utils::statsCarrito();?>
    <h3>Precio total: $<?= $stats['total']?></h3>

    <a href="#" class="button button-pedido">Hacer pedido</a>
</div>




