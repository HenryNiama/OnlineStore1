<h1>Gestión de Productos</h1>

<a class="button button-small" href="<?=base_url?>Archivos/?controller=Producto&action=crear">
    Crear Producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'completed'): ?>
<strong class="alert_green">El Producto se ha creado correctamente.</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'completed' && $_SESSION['actualizado'] != 'completed'): ?>
<strong class="alert_red">El Producto NO se ha creado correctamente.</strong>
<?php endif; ?>
<!--Ahora borramos la sesión: -->
<?php Utils::deleteSession('producto');?>


<?php if(isset($_SESSION['actualizado']) && $_SESSION['actualizado'] == 'completed'): ?>
<strong class="alert_green">El Producto se ha actualizado correctamente.</strong>
<?php elseif(isset($_SESSION['actualizado']) && $_SESSION['actualizado'] != 'completed' && $_SESSION['producto'] != 'completed'): ?>
<strong class="alert_red">El Producto NO se ha actualizado correctamente.</strong>
<?php endif; ?>
<!--Ahora borramos la sesión: -->
<?php Utils::deleteSession('actualizado');?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'completed'): ?>
<strong class="alert_green">El Producto se ha borrado correctamente.</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'completed'): ?>
<strong class="alert_red">El Producto NO se ha borrado correctamente.</strong>
<?php endif; ?>
<!--Ahora borramos la sesión: -->
<?php Utils::deleteSession('delete');?>


<?php if(isset($_SESSION['actualizado']) && $_SESSION['actualizado'] == 'completed'): ?>
<strong class="alert_green">El Producto se ha actualizado correctamente.</strong>
<?php elseif(isset($_SESSION['actualizado']) && $_SESSION['actualizado'] != 'completed'): ?>
<strong class="alert_red">El Producto NO se ha actualizado correctamente.</strong>
<?php endif; ?>
<!--Ahora borramos la sesión: -->
<?php Utils::deleteSession('actualizado');?>

<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>STOCK</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
        <tbody>
            <?php while($prod = $productos->fetch_object()): ?>
            <tr>
                <td><?= $prod->id; ?></td>
                <td><?= $prod->nombre; ?></td>
                <td><?= $prod->precio; ?></td>
                <td><?= $prod->stock; ?></td>
                <td>
                    <a href="<?=base_url?>Archivos/?controller=Producto&action=editar&id=<?=$prod->id?>" class="button button-gestion azul">Editar</a>
                    <a href="<?=base_url?>Archivos/?controller=Producto&action=eliminar&id=<?=$prod->id?>" class="button button-gestion button-red">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
</table>




