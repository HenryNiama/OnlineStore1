
<h1>Gestionar Categorías</h1>

<a class="button button-small" href="<?=base_url?>Archivos/?controller=Categoria&action=crear">
    Crear categoría
</a>


<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th></th>
        </tr>
    </thead>
        <tbody>
            <?php while($cat = $categorias->fetch_object()): ?>
            <tr>
                <td><?= $cat->id; ?></td>
                <td><?= $cat->nombre; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
</table>




