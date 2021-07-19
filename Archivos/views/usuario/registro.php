
<h1>Registrarse</h1>

<form action="<?=base_url?>usuario/save" method="POST">

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