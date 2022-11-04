<!DOCTYPE html>
<html lang="pt">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rethouse - Real Estate HTML Template">
    <meta name="keywords" content="Real Estate, Property, Directory Listing, Marketing, Agency" />
    <meta name="author" content="mardianto - retenvi.com">
    <title>Green Property Mozambique</title>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link rel="manifest" href="site.webmanifest">
    <!-- favicon.ico in the root directory -->
    <link href="{{ asset('assets/css/stylesbd04.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script> --}}
    @livewireStyles

</head>

<body>

    <header class="header__style-one">
        <!-- NAVBAR -->
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft navbar-transparent">
            <div class="container">
                <a class="navbar-brand" href="homepage-v1.html">
                    <img src="images/logo-blue.png" alt="">
                    <img src="images/logo-blue-stiky.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav99">
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-item"><a class="nav-link" href="{{ Route('/')}}"> Início </a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Categoria </a>
                            <ul class="dropdown-menu animate fade-up">
                                @foreach($categoria as $c)
                                <li><a class="dropdown-item" href="{{ Route('categoria',$c->id) }}">{{$c->nome}}</a>
                                @endforeach
                            </ul>
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown">
                                Tipo
                            </a>
                            <ul class="dropdown-menu dropdown-menu-left animate fade-up">
                                @foreach($tipo as $t)
                                <li><a class="dropdown-item" href="{{ Route('item', $t->id) }}"> {{$t->nome}} </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown"> Staff
                            </a>
                            <ul class="dropdown-menu dropdown-menu-left animate fade-up">
                                <li><a class="dropdown-item" href="{{ Route('agente')}}"> Lista </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{ Route('contacto')}}"> Contacto </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ Route('sobre')}}"> Sobre nós </a></li>
                    </ul>

                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group ">
                                <form action="#">

                                    <div class="row no-gutters mt-3">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0"
                                                type="search" value="" placeholder="Search "
                                                id="example-search-input4">
                                        </div>
                                        <div class="col-auto">
                                            <a class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                                href="search-result.html">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search content bar.// -->
                </div> <!-- navbar-collapse.// -->
            </div>
        </nav>
        <!-- END NAVBAR -->
    </header>
    <!-- END HEADER -->
    <!-- CAROUSEL -->

    <!-- CAROUSEL -->
    <div class="slider-container">
        <div class="container-slider-image-full  ">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators d-none">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active banner-max-height">
                        <img class="d-block w-100" src="{{ asset('assets/images/bg19.jpg') }}" alt="First slide">
                        <div class="carousel-caption banner__slide-overlay d-flex h-100">
                            <div class="carousel__content">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 col-md-12 col-sm-12 text-center">
                                            <div class="slider__content-title ">
                                                <h2 data-animation="fadeInDown" data-delay=".2s"
                                                    data-duration="1000ms" class="text-white animated fadeInDown">
                                                    O lugar nº 1 para propriedades comerciais</h2>
                                                <p data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms"
                                                    class="text-white animated fadeInUp">

                                                    This is real estate website template based on Bootstrap 4 framework.
                                                </p>
                                                <a href="#" data-animation="fadeInUp" data-delay=".6s"
                                                    data-duration="1000ms"
                                                    class="btn btn-primary text-uppercase animated fadeInUp">
                                                    Contacte-nos
                                                    <i class="fa fa-angle-right arrow-btn "></i></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="{{ asset('assets/images/bg.jpg') }}" alt="Second slide">
                        <div class="carousel-caption banner__slide-overlay d-flex h-100">
                            <div class="carousel__content">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 col-md-12 col-sm-12 text-center">
                                            <div class="slider__content-title ">
                                                <h2 data-animation="animated fadeInDown"
                                                    class="text-white animated fadeInDown">
                                                    O lugar nº 1 para propriedades comerciais</h2>
                                                <p data-animation="animated fadeInUp"
                                                    class="text-white animated fadeInUp ">

                                                    This is real estate website template based on Bootstrap 4 framework.
                                                </p>
                                                <a href="#"
                                                    class="btn btn-primary text-uppercase animated fadeInUp">
                                                    Contacte-nos
                                                    <i class="fa fa-angle-right arrow-btn "></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="{{ asset('assets/images/bg15.jpg') }}" alt="Third slide">
                        <div class="carousel-caption banner__slide-overlay d-flex h-100">
                            <div class="carousel__content">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 col-md-12 col-sm-12 text-center">
                                            <div class="slider__content-title ">
                                                <h2 data-animation="animated fadeInDown"
                                                    class="text-white animated fadeInDown">
                                                    The #1 place for commercial
                                                    property</h2>
                                                <p data-animation="animated fadeInUp"
                                                    class="text-white animated fadeInUp ">

                                                    This is real estate website template based on Bootstrap 4 framework.
                                                </p>
                                                <a href="#"
                                                    class="btn btn-primary text-uppercase animated fadeInUp">
                                                    contact us
                                                    <i class="fa fa-angle-right arrow-btn "></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span> -->
                <span class="carousel-control-nav-prev">
                    <i class="fa fa-2x fa-angle-left"></i>
                </span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span> -->
                <span class="carousel-control-nav-next">
                    <i class="fa fa-2x fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>

    <div class="clearfix"></div>
    <!-- END CAROUSEL -->
    <!-- END CAROSUEL -->
    <div class="clearfix"></div>



    {{ $slot }}


    <footer>
        <div class="wrapper__footer bg-theme-footer">
            <div class="container">
                <div class="row">
                    <!-- ADDRESS -->
                    <div class="col-md-4">
                        <div class="widget__footer">
                            <figure>
                                <img src="{{ asset('assets/images/logo.png') }}" alt="" class="logo-footer">
                            </figure>
                            <p>
                                A Green Property Mozambique já é uma marca
                                reconhecida do mercado nacional pela sua
                                integridade, domínio do mercado o que resume
                                na satisfação dos seus clientes
                            </p>

                            <ul class="list-unstyled mb-0 mt-3">
                                <li> <b> <i class="fa fa-map-marker"></i></b><span>Rua da Frelimo, nº. 206 - Bairro
                                        Sommerschield</span> </li>
                                <li> <b><i class="fa fa-phone-square"></i></b><span>(+258) 86 650 0009</span> </li>
                                <li> <b><i class="fa fa-phone-square"></i></b><span>(+258) 86 650 0009</span> </li>
                                {{--                                 <li> <b><i class="fa fa-headphones"></i></b><span>support@realvilla.demo</span> </li>
                                <li> <b><i class="fa fa-clock-o"></i></b><span>Mon - Sun / 9:00AM - 8:00PM</span> </li> --}}
                            </ul>
                        </div>

                    </div>
                    <!-- END ADDRESS -->

                    <!-- QUICK LINKS -->
                    <div class="col-md-4">
                        <div class="widget__footer">
                            <h4 class="footer-title">Links Rápidos</h4>
                            <div class="link__category-two-column">
                                <ul class="list-unstyled ">
                                    <li class="list-inline-item">
                                        <a href="#">Categoria</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ Route('agente')}}">Staff</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ Route('contacto')}}">Contacto</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ Route('sobre')}}">Sobre nós</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="widget__footer">
                            <h4 class="footer-title">Siga-nos </h4>
                            <p class="mb-2">
                                Siga-nos e fique em contacto para receber as últimas
                                notícias
                            </p>
                            <p>
                                <button class="btn btn-social btn-social-o facebook mr-1">
                                    <i class="fa fa-facebook-f"></i>
                                </button>
                                <button class="btn btn-social btn-social-o instagram mr-1">
                                    <i class="fa fa-instagram"></i>
                                </button>
                            </p>
                            <br>
                            <h4 class="footer-title">Boletim de Notícias</h4>
                            <!-- Form Newsletter -->
                            <div class="widget__form-newsletter ">
                                <p>Não deixe de se inscrever em nossos feeds de notícias,
                                    por favor preencha o formulário abaixo</p>
                                <div class="mt-3">
                                    <input type="text" class="form-control mb-2" placeholder="Digite o seu e-mail">
                                    <button class="btn btn-primary btn-block text-capitalize" type="button">subscribe
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg__footer-bottom-v1">
            <div class="container">
                <div class="row flex-column-reverse flex-md-row">
                    <div class="col-md-6">
                        <span>
                            © 2022 First Tech Solution, Produzido por:
                            <a href="https://firsteducation.edu.mz/">FirstTech</a>
                        </span>
                    </div>
               
                </div>
            </div>
        </div>
        <!-- End Footer  -->
    </footer>

    <!-- SCROLL TO TOP -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TO TOP -->
    <script src="{{ asset('assets/js/index.bundlebd04.js?8918068d71def746395d') }}"></script>
    @livewireScripts

</body>


<!-- Mirrored from wallsproperty.netlify.app/homepage-v5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Aug 2022 11:58:17 GMT -->

</html>
