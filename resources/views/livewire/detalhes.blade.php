<div>
    <div class="single__detail-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-8">
                    <div class="single__detail-area-title">
                        <h3 class="text-capitalize">{{ $propriedade->nome }}</h3>
                        <p> {{ $propriedade->endereco }}, {{ $propriedade->distritos->nome }} -
                            {{ $propriedade->distritos->provincias->nome }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-4">
                    <div class="single__detail-area-price">
                        <h4 class="text-capitalize text-gray">{{ $propriedade->preco }},00MZN</h4>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="badge badge-primary p-2 rounded"><i
                                        class="fa fa-exchange"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="badge badge-primary p-2 rounded"><i
                                        class="fa fa-heart"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="badge badge-primary p-2 rounded"><i
                                        class="fa fa-print"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SLIDER IMAGE DETAIL -->
    <!-- RECENT PROPERTY -->
    <div class="slider__property bg-light">

        <div class="slider__property-carousel-opacity owl-carousel owl-theme">
            @foreach($propriedade->fotos as $p)
            <div class="item">
                <a href="#">
                    <img src="{{ asset('storage') }}/{{ $p->icon }}" alt="" class="img-fluid">
                </a>
            </div>
            @endforeach
            {{-- <div class="item">
                <a href="#">
                    <img src="{{ asset('storage') }}/{{ $propriedade->icon }}" alt="" class="img-fluid">
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="{{ asset('storage') }}/{{ $propriedade->icon }}" alt="" class="img-fluid">
                </a>
            </div> --}}


        </div>

    </div>
    <!-- END RECENT PROPERTY -->

    <!-- SINGLE DETAIL -->
    <section class="single__Detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- DESCRIPTION -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single__detail-desc">
                                <h5 class="text-capitalize detail-heading mt-0">Descrição</h5>
                                <div class="show__more">
                                    <p>{{$propriedade->descricao}}.</p>
                                    @foreach($propriedade->textos as $t)
                                    <p>
                                        {{$t->texto}}
                                    </p>
                                    @endforeach
                                    <a href="javascript:void(0)" class="show__more-button ">Ler Mais</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <!-- PROPERTY DETAILS SPEC -->
                            <div class="single__detail-features">
                                <h5 class="text-capitalize detail-heading">property details</h5>
                                <!-- INFO PROPERTY DETAIL -->
                                <div class="property__detail-info">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><b>Property ID:</b> RV151</li>
                                                <li><b>Price:</b> $484,400</li>
                                                <li><b>Property Size:</b> 1466 Sq Ft</li>
                                                <li><b>Bedrooms:</b> 4</li>
                                                <li><b>Bathrooms:</b> 2</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><b>Garage:</b> 1</li>
                                                <li><b>Garage Size:</b> 458 SqFt</li>
                                                <li><b>Year Built:</b> 2019-01-09</li>
                                                <li><b>Property Type:</b> Full Family Home</li>
                                                <li><b>Property Status:</b> For rent</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="text-primary">Additional details</h6>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><b>Property ID:</b> RV151</li>
                                                <li><b>Price:</b> $484,400</li>
                                                <li><b>Property Size:</b> 1466 Sq Ft</li>
                                                <li><b>Bedrooms:</b> 4</li>
                                                <li><b>Bathrooms:</b> 2</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><b>Garage:</b> 1</li>
                                                <li><b>Garage Size:</b> 458 SqFt</li>
                                                <li><b>Year Built:</b> 2019-01-09</li>
                                                <li><b>Property Type:</b> Full Family Home</li>
                                                <li><b>Property Status:</b> For rent</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <!-- END INFO PROPERTY DETAIL -->
                            </div>
                            <!-- END PROPERTY DETAILS SPEC -->
                            <div class="clearfix"></div>


                            <!-- FEATURES -->
                            <div class="single__detail-features">
                                <h5 class="text-capitalize detail-heading">Características</h5>
                                <ul class="list-unstyled icon-checkbox">
                                    <li>air conditioning</li>
                                    <li>swiming pool</li>
                                    <li>Central Heating</li>
                                    <li>spa & massage</li>
                                    <li>pets allow</li>

                                    <li>air conditioning</li>
                                    <li>gym</li>
                                    <li>alarm</li>

                                    <li>window Covering</li>
                                    <li>free wiFi</li>
                                    <li>car parking </li>
                                </ul>
                            </div>
                            <!-- END FEATURES -->

                        </div>
                    </div>
                    <!-- END DESCRIPTION -->
                </div>
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <!-- PROFILE AGENT -->
                        <div class="profile__agent mb-30">
                            <div class="profile__agent__group">

                                <div class="profile__agent__header">
                                    <div class="profile__agent__header-avatar">
                                        <figure>
                                            <img src="{{ asset('storage') }}/{{ $propriedade->agentes->icon }}"
                                                alt="" class="img-fluid">
                                        </figure>

                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <h5 class="text-capitalize">{{ $propriedade->agentes->nome }}</h5>
                                            </li>
                                            <li><a href="tel:{{ $propriedade->agentes->contacto }}"><i
                                                        class="fa fa-phone-square mr-1"></i>(+258)
                                                    {{ $propriedade->agentes->contacto }}</a></li>
                                            <li><a href="mailto:{{ $propriedade->agentes->email }}"><i
                                                        class=" fa fa-building mr-1"></i>
                                                    {{ $propriedade->agentes->email }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="profile__agent__body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Seu Nome">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Contacto">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="E-mail">
                                    </div>
                                    <div class="form-group mb-0">
                                        <textarea class="form-control required" rows="5" required="required" placeholder="Estou Interessado..."></textarea>
                                    </div>
                                </div>
                                <div class="profile__agent__footer">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary text-capitalize btn-block"> Enviar Mensagem <i
                                                class="fa fa-paper-plane ml-1"></i></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SIMILIAR PROPERTY -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="similiar__item">
                        <h5 class="text-capitalize detail-heading">
                            Propriedades Similares
                        </h5>
                        <div class="similiar__property-carousel owl-carousel owl-theme">
                            @foreach($propriedades as $p)
                            <div class="item">
                                <!-- ONE -->
                                <div class="card__image">
                                    <div class="card__image-header h-250">
                                        <div class="ribbon text-uppercase"> </div>
                                        <img src="{{ asset('storage') }}/{{ $p->icon }}" alt=""
                                            class="img-fluid w100 img-transition">
                                        <div class="info">{{$p->categorias->nome}}</div>
                                    </div>
                                    <div class="card__image-body">
                                        <span class="badge badge-primary text-capitalize mb-2">{{$p->estados->nome}}</span>
                                        <h6 class="text-capitalize">
                                            <a href="#">{{$p->nome}}</a>
                                        </h6>

                                        <p class="text-capitalize">
                                            <i class="fa fa-map-marker"></i>
                                            {{$p->endereco}}, {{$p->distritos->nome}}
                                        </p>
                                    </div>
                                    <div class="card__image-footer">
                                        <figure>
                                            <img src="{{ asset('storage') }}/{{ $p->agentes->  icon }}" alt=""
                                                class="img-fluid rounded-circle">
                                        </figure>
                                        <ul class="list-inline">
                                            <li class="list-inline-item pt-2">
                                                <a href="#">
                                                    {{$p->agentes->nome}} <br>
                                                </a>
                                            </li>

                                        </ul>
                                        <ul class="list-inline ml-auto">
                                            <li class="list-inline-item pt-1">
                                                <h6 class="text-primary">{{$p->preco}},00MZN</h6>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SIMILIAR PROPERTY -->

        </div>
    </section>
</div>
