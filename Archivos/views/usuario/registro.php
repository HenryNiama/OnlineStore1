
<h1>Registrarse</h1>


<?php if ( isset($_SESSION['register']) && $_SESSION['register'] == 'completo' )  :?>   
        <strong class= "alert-green">Registro Completado</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'fallido') :?>     
        <strong class="alert-red">Registro Fallido, introduce bien los datos.</strong>
<?php endif; ?>

<?php Utils::deleteSession('register'); ?>


<form action="<?=base_url?>Archivos/?controller=usuario&action=save" method="POST">

    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="apellido">Apellido: </label>
    <input type="text" name="apellido" id="apellido" required>

    <label for="email">Email: </label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password: </label>
    <input type="password" name="password" required>
    
    <input type="submit" value="Registrarse">
</form>