<h1>Crear nueva Categoría</h1>

<form action="<?=base_url?>Archivos/?controller=Categoria&action=save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required> 

    <input type="submit" value="Guardar"/>
</form>