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
    <title>Green Propriety Mozambique</title>

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
    <link rel="apple-touch-icon" href="icon.png">
    <meta name="theme-color" content="#3454d1">
    <link href="{{ asset('assets/css/stylesbd04.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @livewireStyles
</head>

<body>
    <!-- HEADER -->
    <header class="bg-theme-overlay">
        <!-- <div class="bg-overlay-one"></div> -->
        <!-- NAVBAR -->
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft navbar-transparent">
            <div class="container">
                <a class="navbar-brand" href="{{ Route('/') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav99">
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-item"><a class="nav-link" href="{{ Route('/') }}"> Início </a></li>

                        @if($role->id === Auth::user()->role_id)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Funcionalidades </a>
                            <ul class="dropdown-menu animate fade-up">
                                <li><a class="dropdown-item" href="{{ Route('propriedade') }}"> Propriedade </a></li>
                                <li><a class="dropdown-item" href="{{ Route('detalhes')}}"> Detalhes de Propriedade </a></li>
                                <li><a class="dropdown-item" href="{{ Route('foto') }}"> Foto </a></li>
                                <li><a class="dropdown-item" href="{{ Route('tipo') }}"> Categoria </a></li>
                                <li><a class="dropdown-item" href="{{ Route('noticia') }}"> Notícia </a></li>
                                <li><a class="dropdown-item" href="{{ Route('provincia')}}"> Provincia </a></li>
                                <li><a class="dropdown-item" href="{{ Route('distrito')}}"> Distrito </a></li>
                                <li><a class="dropdown-item" href="{{ Route('agentes')}}"> Agentes </a></li>
                                <li><a class="dropdown-item" href="{{ Route('rota')}}"> Rota </a></li>
                                <li><a class="dropdown-item" href="{{ Route('role')}}"> Role </a></li>
                                <li><a class="dropdown-item" href="{{ Route('permissao')}}"> Permissão </a></li>
                            </ul>
                        </li>
                        @else
                        
                        @endif
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
        <!-- BREADCRUMB -->
        <section class="section__breadcrumb ">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 text-center">
                        <h2 class="text-capitalize text-white ">Green Propriety</h2>
                        <ul class="list-inline ">
                            <li class="list-inline-item">
                                <a href="#" class="text-white">
                                    home
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white">
                                    Propriety
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-white">
                                    Green Propriety
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- END BREADCRUMB -->
    </header>
    <div class="clearfix"></div>

    <!-- LISTING LIST -->
    {{ $slot }}



    <footer>
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
    <script src="{{ asset('assets/js/index.bundlebd04.js') }}"></script>
    @livewireScripts
    <script>
        window.livewire.on('agenteAdded',()=>{
            $('#addAgenteModal').modal('hide');
        })
    </script>
</body>



</html>
