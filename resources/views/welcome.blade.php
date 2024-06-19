<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PQR</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#62e769] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2"></div>

                        @if (Route::has('login'))
                        <nav class="navbar container-fluid">
                            <div class="logo-container">
                                <img src="https://infimanizales.com/wp-content/uploads/2021/12/Infi-Manizales-Logo-color.png" alt="Logo de infimanizales" class="logo">
                            </div>
                            <div class="nav-links">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="nav-link">Menu Principal</a>
                                @else
                                    <div class="dropdown">
                                        <button id="dropdownButton" class="nav-link dropdown-toggle">☰ Menú</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownButton">
                                                <a href="{{ route('login') }}" class="dropdown-item">Iniciar Sesión</a>
                                        </div>
                                    </div>
                                @endauth
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                        </nav>
                    @endif
                    </header>
                    <section id="home" name="home">
                        <div id="headerwrap">
                            <div class="container">
                                <div class="row centered">
                                    <div class="col-lg-6">
                                        {{-- <img src="{{ asset('/img/infi.jpg') }}" alt=""> --}}
                                        <br>
                                        <br>
                                    </div>
                                    <div class="contenedor-main">
                                        <div class="parrafo col-lg-6">
                                            <h2><b>SISTEMA DE PETICIONES, QUEJAS Y <BR>RECLAMOS (PQR)</b></h2>

                                            <hr>
                                            <p><b>INFI-MANIZALES</b> ofrece a los ciudadanos un sistema de peticiones, quejas y reclamos, por medio del cual podrá realizar solicitudes y tener un control sobre la misma, permitiendo saber si se encuentra en trámite o si fue solucionada y las observaciones respectivas.</p>
                                        </div>
                                        <div class="Botones col-lg-6">
                                            <h3><b>CONSULTAR SOLICITUD</b></h3>
                                            <form action="{{ url('/consultapqrciudadano') }}" method="GET" style="margin: 20px;">
                                                <button type="submit" class="consultarPqr btn btn-lg btn-success">CONSULTAR PQR</button>
                                            </form>

                                            <h3><b>NUEVA SOLICITUD</b></h3>
                                            <form action="{{ url('/nuevapqr') }}" method="GET" >
                                                <button type="submit" class="nuevaPqr btn btn-lg btn-success">NUEVO PQR</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <BR>
                                <BR>
                                <BR>
                            </div>
                            <!--/ .container -->
                        </div>
                        <!--/ #headerwrap -->
                    </section>
                    <footer class="footer-diseño py-16 text-center text-sm text-black dark:text-white/70">
                        <img src="https://www.peoplecontact.com.co/images/peoplecontact-1.png" alt="Logo de peopleContact" class="logo-pequeno">
                            <p>
                                <strong>Desarrollado por <a id="enlaceSoftG" target="blank" href="https://www.peoplecontact.com.co/" style="text-decoration: none; color: black;">PeopleContact</a></strong>
                            </p>
                    </footer>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
<div class="custom-shape-divider-bottom-1712869018">
                        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"      preserveAspectRatio="none">
                            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                        </svg>
                    </div>


{{-- MARK:ESTILOS --}}


<style>
    .nav-links {
        display: flex;
        align-items: center;
        gap: 20px;
        }

        .nav-link {
        font-size: 18px;
        text-decoration: none;
        color: #333;
        }

        /* Styles for the drop-down menu */
        .dropdown {
        position: relative;
        }

        .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 5px;
        right: 0; /* Align the drop-down to the right */
        top: 100%;
        }

        .dropdown-item {
        padding: 10px 20px;
        text-decoration: none;
        display: block;
        color: #333;
        }

        .dropdown-item:hover {
        background-color: #f5f5f5;
        }

        .dropdown.open .dropdown-menu {
        display: block;
        }

        /* Responsive styles for smaller screens */
        @media (max-width: 768px) {
            .dropdown {
                display: block; /* Show the button on small screens */
            }

            .dropdown-menu {
                position:static;
                width: 100%; /* Ocupa todo el ancho disponible */
                max-width: 100vw; /* Evita desbordamiento horizontal */
                top: 50px; /* Ajusta la distancia desde la parte superior */
                left: 0;
                right: 0;
                border-radius: 5px; /* Quita el borde redondeado */
                z-index: 1;
            }

            .footer-diseño {
                align-content: center;
            }

        }

        .logo-pequeno {
        position: relative;
        max-width: 500px;
        max-height: 100px;
        bottom: 20px;
        filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.5));
    }
    .logo {
        max-width: 100px; /* Ajusta el tamaño máximo del logo según sea necesario */
        height: auto; /* Mantiene la proporción de la imagen */
        filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.5));
    }

    .nuevaPqr ,.consultarPqr {
        font-weight: 700;
        background-color: #39bb36;
        color: #fff; /* White text color */
        border: none; /* Remove default border */
        padding: 15px 30px; /* Adjust padding */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Indicate clickable area */
        font-size: 18px; /* Adjust font size */
        text-transform: uppercase; /* Make text uppercase */
        transition: background-color 0.3s ease; /* Smooth hover effect */
        }

    .nuevaPqr:hover {
        background-color: #33D7A7; /* Darker blue on hover */
        }
    .consultarPqr:hover {
        background-color: #33D7A7; /* Darker blue on hover */
        }

    .contenedor-main {
        display: flex;
        justify-content: space-between;
    }

    .parrafo {
        padding: 15px;
        width: 45%; /* Ajusta el ancho según sea necesario */
        float: right; /* Para ubicar a la derecha */
        margin:0 auto;
        border-radius:20px;
    }

    .Botones {
        padding: 15px;
        width: 45%; /* Ajusta el ancho según sea necesario */
        float: left; /* Para ubicar a la izquierda */
        text-align: center; /* Centra el texto */
        margin:0 auto;
        border-radius:20px;
    }
                /* /DECORACIÓN FOOTER/ */
    .custom-shape-divider-bottom-1712869018 {
        margin:0;
        padding: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: -1; /* Para que esté detrás del contenido */
        overflow: hidden;
        transform: rotate(180deg);
    }

    .custom-shape-divider-bottom-1712869018 svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 154px;
    }

    .custom-shape-divider-bottom-1712869018 .shape-fill {
        fill: #265073;
    }

    /* /#D369C1 COLOR POR DEFECTO DE LA DECORACIÓN DE ABAJO/ */

    /* For mobile devices */
    @media (max-width: 767px) {
        .custom-shape-divider-bottom-1712869018 svg {
            width: calc(100% + 1.3px);
            height: 80px;
        }

        .logo-pequeno {
            bottom: 10px;
        }

        * {
            overflow-x: hidden;
        }

        .navbar {
            flex-direction: column;
            align-items: flex-start;
            background-color: #f3f3f3;
        }

        .nav-links {
            margin-top: 10px; /* Espacio entre el logo y los enlaces */
        }

        .nav-link {
            margin-left: 0; /* Elimina el margen izquierdo en pantallas pequeñas */
            margin-top: 10px; /* Espacio entre los enlaces */
        }

        .contenedor-main {

            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            gap: 20px;
        }

        .Botones {
            width: 85%;
        }

        .Botones h3 {
            overflow: hidden;
        }

        .parrafo {
            width: 85%;
        }

        .parrafo h2 {
            overflow: hidden;
        }
    }

    .footer-diseño {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        align-content: flex-end;
        flex-direction: column;
        align-items: center;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: stretch;
        padding: 10px 20px; /* Ajusta el espaciado según sea necesario */
        background-color: #f3f3f3; /* Color de fondo de la navbar */
        box-shadow: 0 4px 5px rgba(0, 0, 0, 0.3); /* Sombra suave */
        flex-wrap: wrap;
        flex-direction: row;
    }

    .nav-link {
        margin-left: 20px; /* Espaciado entre los enlaces */
        padding: 10px 15px; /* Espaciado interno de los enlaces */
        border-radius: 5px; /* Bordes redondeados */
        text-decoration: none; /* Sin subrayado */
        color: #333; /* Color del texto */
        transition: cubic-bezier(0.3s ease) ; /* Transición suave */
        font-weight: bold;
    }

    .logo-container {
        flex-shrink: 0; /* Evita que el logo se encoja */
    }

    .nav-link:hover {
        background-color: #e9ecef; /* Color de fondo al pasar el mouse */
    }

</style>


{{-- MARK:SCRIPTS --}}


<script>
    // JavaScript para activar el botón desplegable en pantallas pequeñas
    $(document).ready(function() {
        $('#dropdownButton').on('click', function() {
            $('.dropdown-menu').toggle();
        });
    });
</script>
