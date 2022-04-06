<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>@yield ('titulo', 'home')</title>
</head>

<body>

    <header>
        <div class="container">

            <a href="/">
                <h1 class="logo">StayScans</h1>
            </a>

            <nav class="site-nav">
                <ul>
                    <li>
                        <a href="/">Inicio</a>
                    </li>
                    <li>
                        <a href="/catalogo">Catalogo</a>
                    </li>
                    <li>
                        <a href="">Contactanos</a>
                    </li>
                </ul>
            </nav>

            <div class="menu-toggle">
                <div class="hamburger"></div>
            </div>

        </div>

    </header>

    @yield ('contenido')

    <footer class="footer-distributed">

        <div
            style="margin: auto; max-width: 1200px; display: flex; justify-content: space-between; align-items: center;">

            <div class="footer-left">

                <p class="footer-links">Todos los derechos reservados a StayHigh | @Copyright</p>

            </div>

            <div class="footer-right">

                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>

            </div>
        </div>

    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>