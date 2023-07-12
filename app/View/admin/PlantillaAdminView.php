<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Catando Ando Coffee Shop</title>
  <link rel="stylesheet" href="app/View/style.css" />
</head>

<body>
  <header class="header">
    <h1>Catando Ando Coffee Shop</h1>
    <nav class="navbar">
      <ul>
        <li><a href="http://localhost/php3b">Inincio</a></li>
        <li><a href="http://localhost/php3b/?C=ProductsController&M=index">Productos</a></li>
        <li><a href="http://localhost/php3b/?C=VarietalsController&M=index">Variedades</a></li>
        <li><a href="http://localhost/php3b/?C=UserController&M=index">Usiarios</a></li>
        <li><a href="http://localhost/php3b/?C=PresentsController&M=index">Presentacion</a></li>
        <li><a href="http://localhost/php3b/?C=UserController&M=CallFormLogin">Login</a></li>
      </ul>
    </nav>
  </header>
  <section class="content">
    <!--en esta parte es lo que va a cambiar de nuestra plantilla -->
    <?php include_once($vista) ?>
  </section>
  <footer class="footer">
    <h3>derechos reservados</h3>
  </footer>
</body>

</html>