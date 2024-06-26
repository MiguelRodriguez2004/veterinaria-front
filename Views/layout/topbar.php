<!doctype html>
<html lang="es">

    <head lang="es">
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <title>Historial Clinico</title>

        <link href="../public/app/publico/css/lib/font-awesome/font-awesome.min.css" rel="stylesheet">
        <link href="../public/bootstrap5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- font awesome -->
        <link rel="stylesheet" href="../public/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../public/fontawesome/css/fontawesome.min.css">

        <!-- datatables -->
        <link rel="stylesheet" href="../public/app/publico/css/lib/datatables-net/datatables.min.css">
        <link rel="stylesheet" href="../public/app/publico/css/separate/vendor/datatables-net.min.css">

        <link href="../public/app/publico/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="../public/app/publico/css/main.css" rel="stylesheet">

        <!-- form -->
        <link rel="stylesheet" type="text/css" href="../public/app/publico/css/lib/jquery-flex-label/jquery.flex.label.css"> <!-- Original -->

        <!-- google fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

        <style>
            .marca {
                width: 100%;
                background: rgb(13, 39, 48);
                position: fixed;
                bottom: 0;
                z-index: 999;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 10px;
            }

            .marca__parrafo {
                margin: 0 !important;
                color: white;
            }

            .marca__texto {
                color: rgb(0, 162, 255);
                text-decoration: underline;
            }

            .marca__parrafo span {
                color: red;
            }

            .page-content {
                margin-top: 70px;
            }

            @media screen and (max-width:1056px) {
                .page-content {
                    padding: 15px !important;
                }
            }
        </style>
    </head>

<body class="with-side-menu">
    <div id="app">

        <header class="site-header">
            <div class="container-fluid" style="padding-left: 40px;">

                <a href="#" class="site-logo">

                </a>

                <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                    <span>toggle menu</span>
                </button>

                <button class="hamburger hamburger--htla">
                    <span>toggle menu</span>
                </button>
                <div class="site-header-content">
                    <div class="site-header-content-in">
                        <div class="site-header-shown">
                            <div class="dropdown user-menu">
                                <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../public/app/publico/img/user.svg" alt="">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right pt-0" aria-labelledby="dd-user-menu">

                                    <h5 class="p-2 text-center bg-primary">Administrador</h5>

                                    <a class="dropdown-item" href="../Controllers/logoutController.php">
                                        <span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesión
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--.site-header-shown-->

                        <div class="mobile-menu-right-overlay"></div>
                        <div class="site-header-collapsed">

                        </div>
                        <!--.site-header-collapsed-->
                    </div>
                    <!--site-header-content-in-->
                </div>
                <!--.site-header-content-->
            </div>
            <!--.container-fluid-->
        </header>

        <div class="mobile-menu-left-overlay">
        </div>