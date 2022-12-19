<!DOCTYPE html>
<html lang="pt">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="First Tech">
    <meta name="keywords" content="First Tech, First Education" />
    <meta name="author" content="Edmétrio - Samuel">
    <title>Green Propriety Mozambique</title>
    <link rel="icon" href="{{asset('assets/images/fav.png')}}">    


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

    <link rel="manifest" href="firsteducation.edu.mz">
    <!-- favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="icon.png">
    <meta name="theme-color" content="#3454d1">
    <link href="{{ asset('assets/css/stylesbd04.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- SweetAlert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @livewireStyles
</head>

<body>
    <!-- HEADER -->
    <header class="bg-theme-overlay">
        <!-- <div class="bg-overlay-one"></div> -->
        <!-- NAVBAR -->
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft navbar-transparent">
            <div class="container">
                <a class="navbar-brand" href="{{ Route('/')}}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav99">
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-item"><a class="nav-link" href="{{ Route('/') }}"> Início </a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Categoria </a>
                            <ul class="dropdown-menu animate fade-up">
                                @foreach ($categoria as $c)
                                    <li><a class="dropdown-item"
                                            href="{{ Route('categoria', $c->id) }}">{{ $c->nome }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown">
                                Tipo
                            </a>
                            <ul class="dropdown-menu dropdown-menu-left animate fade-up">
                                @foreach ($tipo as $t)
                                    <li><a class="dropdown-item" href="{{ Route('item', $t->id) }}"> {{ $t->nome }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown"> Staff
                            </a>
                            <ul class="dropdown-menu dropdown-menu-left animate fade-up">
                                <li><a class="dropdown-item" href="{{ Route('agente') }}"> Lista </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{ Route('contacto') }}"> Contacto </a></li>
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
                                    @foreach($tipo as $t)
                                    <li class="list-inline-item">
                                        <a href="{{ Route('item', $t->id)}}">{{$t->nome}}</a>
                                    </li>
                                    @endforeach
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
                                <button class="btn btn-social rounded text-white whatsapp">
                                    <i class="fa fa-whatsapp"></i>
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
    <script src="{{ asset('assets/js/index.bundlebd04.js') }}"></script>
    <script>
        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
            });
        });

        window.addEventListener('swal:confirm', event => {
            swal({
                    title: event.detail.message,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.livewire.emit('remove');
                    }
                });
        });
    </script>
    @livewireScripts
    <script>
        window.livewire.on('provinciaAdd', ()=>{
            $('#addProvinciaModal').modal('hide');
        })
    </script>
</body>


<!-- Mirrored from wallsproperty.netlify.app/listing-style-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Aug 2022 11:59:04 GMT -->

</html>
