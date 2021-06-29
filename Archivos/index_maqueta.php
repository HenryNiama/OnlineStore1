
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="container">
        <!--Cabecera-->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="camiseta logo" />
                <a href="index.html">
                    Tienda de camisetas
                </a>
            </div>
        </header>
        <!--Menu-->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Categoría 1</a>
                </li>
                <li>
                    <a href="#">Categoría 2</a>
                </li>
                <li>
                    <a href="#">Categoría 3</a>
                </li>
                <li>
                    <a href="#">Categoría 4</a>
                </li>
                <li>
                    <a href="#">Categoría 5</a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <!--Barra Lateral-->
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Entrar a la Web</h3>
                    <form action="#" method="post">
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email">

                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password">

                        <input type="submit" value="Enviar">
                    </form>

                    <ul>
                        <li>
                            <a href="#">Mis Pedidos</a>
                        </li>
                        <li>
                            <a href="#">Mis Gestionar Pedidos</a>
                        </li>
                        <li>
                            <a href="#">Gestionar Cateogorías</a>
                        </li>
                    </ul>
                    
                    
                    
                </div>
            </aside>

            <!--Contenido Central-->
            <div id="central">

                <h1>Productos Destacados</h1>

                <div class="product">
                    <img src="assets/img/camiseta.png" alt="" />
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png" alt="" />
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png" alt="" />
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>

            </div>

        </div>

        <!--Pie de pagina-->
        <footer id="footer">
            <p>Desarrollo por Henry Niama &copy;
                <?=date('Y')?> </p>
    </footer>
</div>
</body>
</html>

