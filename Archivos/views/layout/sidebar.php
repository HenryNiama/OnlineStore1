
            <!--Barra Lateral-->
            <aside id="lateral">
                <div id="login" class="block_aside">
                  
                    <?php if(!isset($_SESSION['identify'])): ?>

                    <h3>Entrar a la Web</h3>

                        <?php if(isset($_SESSION['error_login'])): ?>
                            <h1 class="alert-red">¡Datos Incorrectos!</h1>
                            <?php unset($_SESSION['error_login']); ?>
                        <?php endif; ?>  

                    <form action="<?=base_url?>Archivos/?controller=usuario&action=login" method="post">
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email">

                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password">

                        <input type="submit" value="Enviar">
                    </form>
                    

                    <?php else:  ?>  
                        <h3><?= $_SESSION['identify']->nombre?></h3>
                    <?php endif; ?>    



                    <ul>
                        <?php if(isset($_SESSION['admin'])): ?>
                            <li><a href="<?=base_url?>Archivos/?controller=Categoria&action=index">Gestionar Cateogorías</a></li>
                            <li><a href="<?=base_url?>Archivos/?controller=Producto&action=gestion"">Gestionar Productos</a></li>
                            <li><a href="#">Gestionar Pedidos</a></li>                 
                        <?php endif; ?>    

                        <?php if(isset($_SESSION['identify'])): ?>
                            <li><a href="#">Mis Pedidos</a></li>
                            <li><a href="<?=base_url?>Archivos/?controller=usuario&action=logout">Cerrar sesión</a></li>
                        <?php else: ?> 
                            <li><a href="<?=base_url?>Archivos/?controller=usuario&action=registro">Registrate Aquí</a></li>
                        <?php endif; ?>  
                    </ul>
                    
                    
                    
                </div>
            </aside>

            <!--Contenido Central-->
            <div id="central">