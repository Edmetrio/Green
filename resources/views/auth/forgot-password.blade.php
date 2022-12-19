{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="pt">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="First Tech">
    <meta name="keywords" content="First Tech, First Education" />
    <meta name="author" content="Edmétrio - Samuel">
    <title>Green Propriety Mozambique</title>
    <link rel="icon" href="{{ asset('assets/images/fav.png') }}">

    <meta name="theme-color" content="#3454d1">
    <link href="{{asset('assets/css/stylesbd04.css?8918068d71def746395d')}}" rel="stylesheet">
</head>

<body>
    <!-- HEADER -->
    <header>
 
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('assets/images/logo-blue-stiky.png')}}" alt="" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
 
    </header>
    <div class="clearfix"></div>

    <!-- LISTING LIST -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Login -->
                    <div class="card mx-auto" style="max-width: 380px;">
                        <div class="card-body">
                            <a href="{{ Route('/')}}">
                                <figure class="text-center">
                                    <img src="{{asset('assets/images/logo.png')}}" width="60%" alt="" class="img-fluid rounded-circle">
                                </figure>
                            </a>
                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('Esqueceu sua palavra-passe? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um e-mail com um link de redefinição de palavra-passe que permitirá que você escolha um novo..') }}
                            </div>
                    
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                    
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="E-mail">
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Reinicializar Palavra-passe </button>
                                </div> <!-- form-group// -->
                            </form>
                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->

                    {{-- <p class="text-center mt-4">Don't have account? <a href="#">Sign up</a></p> --}}
                </div>
            </div>
        </div>
    </section>

    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TO TOP -->
    <script src="js/index.bundlebd04.js?8918068d71def746395d"></script>
</body>

</html>
