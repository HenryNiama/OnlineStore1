<?php if(isset($edit) && isset($prod) && is_object($prod)): ?>
    <h1>Editar producto "<?=$prod->nombre?>"</h1>
    <?php $url_action = base_url."Archivos/?controller=producto&action=save&id=".$prod->id; ?>
<?php else: ?>
    <h1>Crear nuevos productos.</h1>
    <?php $url_action = base_url."Archivos/?controller=producto&action=save";?>
<?php endif; ?>

<div class="form_container">

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= isset($prod) && is_object($prod) ? $prod->nombre : ''?>"/>

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" id="" cols="30" rows="10">
        <?= isset($prod) && is_object($prod) ? $prod->descripcion : ''?>
    </textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" value="<?= isset($prod) && is_object($prod) ? $prod->precio : ''?>"/>

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?= isset($prod) && is_object($prod) ? $prod->stock : ''?>"/>

    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria" id="">
        <?php while($cat = $categorias->fetch_object()): ?>
            <option value="<?=$cat->id?>" <?= isset($prod) && is_object($prod) && $cat->id == $prod->categoria_id ? 'selected' : ''; ?> >
                <a href="#"><?=$cat->nombre?></a>
            </option>
        <?php endwhile; ?>   
    </select>

    <label for="imagen">Imagen</label>
        <?php if(isset($prod) && is_object($prod) && !empty($prod->imagen)) : ?>
            <img src="/uploads/images/<?=$prod->imagen?>" alt="Imagen de la prenda."
            class="thumb">
        <?php endif; ?>    
    <input type="file" name="imagen">

    <input type="submit" value="Guardar">
</form>

</div>