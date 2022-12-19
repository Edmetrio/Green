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
                        <h4 class="text-capitalize text-gray">{{ number_format($propriedade->preco, 2, ',', '.') }}
                            {{ $propriedade->moedas->nome }}</h4>
                        <ul class="property__detail-info-list list-unstyled">
                            <li><b>Situação:</b>
                                @if ($propriedade->estados->nome === 'Disponível')
                                    <strong style="color: hsl(120, 100%, 53%)"> {{ $propriedade->estados->nome }} </strong>
                                @elseif($propriedade->estados->nome === 'Indisponível')
                                    <strong style="color: red">{{ $propriedade->estados->nome }}</strong>
                                @elseif($propriedade->estados->nome === 'Reservado')
                                    <strong style="color: hsl(60, 100%, 50%)">{{ $propriedade->estados->nome }}</strong>
                                @endif
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
            @foreach ($propriedade->fotos as $p)
                <div class="item">
                    <a href="#">
                        <img src="{{ asset('storage') }}/{{ $p->icon }}" alt="" class="img-fluid">
                    </a>
                </div>
            @endforeach
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
                                    <p>{{ $propriedade->descricao }}.</p>
                                    @foreach ($propriedade->textos as $t)
                                        <p>
                                            {{ $t->texto }}
                                        </p>
                                    @endforeach
                                    <a href="javascript:void(0)" class="show__more-button ">Ler Mais</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <!-- PROPERTY DETAILS SPEC -->
                            <div class="single__detail-features">
                                <h5 class="text-capitalize detail-heading">Detalhes da Propriedade</h5>
                                <!-- INFO PROPERTY DETAIL -->
                                <div class="property__detail-info">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                @foreach ($propriedade->descricaos as $d)
                                                    <li><b>{{ $d->nome }}: </b> {{ $d->pivot->nome }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <!-- END INFO PROPERTY DETAIL -->
                            </div>
                            <!-- END PROPERTY DETAILS SPEC -->
                            <div class="clearfix"></div>

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
                                @if ($message = Session::get('status'))
                                    <div>
                                        <p class="alert alert-success"
                                            class="table p-field p-col-12 p-md-6 table-striped"
                                            style="text-align: center;">{{ $message }}</p>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Opss!</strong> Algum problema com seu formulário<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form>
                                    <div class="profile__agent__body">
                                        <div class="form-group">
                                            <input wire:model="nome" type="text" class="form-control" name="nome"
                                                placeholder="Nome">
                                            <span class="text-danger">
                                                @error('nome')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input wire:model="contacto" type="text" class="form-control"
                                                placeholder="Contacto">
                                            <span class="text-danger">
                                                @error('contacto')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input wire:model="email" type="text" class="form-control"
                                                placeholder="E-mail">
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group mb-0">
                                            <textarea wire:model="mensagem" class="form-control required" rows="5" placeholder="Estou Interessado..."></textarea>
                                            <span class="text-danger">
                                                @error('mensagem')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="profile__agent__footer">
                                        <div class="form-group mb-0">
                                            <button wire:click.prevent="store()"
                                                class="btn btn-primary text-capitalize btn-block"> Enviar Mensagem
                                                <i class="fa fa-paper-plane ml-1"></i></button>
                                        </div>
                                    </div>
                                </form>
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
                            @foreach ($propriedades as $p)
                                <div class="item">
                                    <!-- ONE -->
                                    <div class="card__image">
                                        <div class="card__image-header h-250">
                                            @if ($p->estados->nome === 'Disponível')
                                                <div class="ribbon text-uppercase">
                                                    {{ $p->estados->nome }}</div>
                                            @elseif($p->estados->nome === 'Indisponível')
                                                <div class="ribbon text-uppercase" style="background-color: red">
                                                    {{ $p->estados->nome }}></div>
                                            @elseif($p->estados->nome === 'Reservado')
                                                <div class="ribbon text-uppercase" style="background-color: yellow">
                                                    {{ $p->estados->nome }}></div>
                                            @endif
                                            <a href="{{ Route('detalhe', $p->id) }}">
                                                <img src="{{ asset('storage') }}/{{ $p->icon }}" alt=""
                                                    class="img-fluid w100 img-transition">
                                            </a>
                                            <div class="info">{{ $p->tipoitems->nome }}</div>
                                        </div>
                                        <div class="card__image-body">
                                            <span
                                                class="badge badge-primary text-capitalize mb-2">{{ $p->categorias->nome }}</span>
                                            <h6 class="text-capitalize">
                                                <a href="#">{{ $p->nome }}</a>
                                            </h6>

                                            <p class="text-capitalize">
                                                <i class="fa fa-map-marker"></i>
                                                {{ $p->endereco }}, {{ $p->distritos->nome }}
                                            </p>
                                        </div>
                                        <div class="card__image-footer">
                                            <figure>
                                                <img src="{{ asset('storage') }}/{{ $p->agentes->icon }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </figure>
                                            <ul class="list-inline">
                                                <li class="list-inline-item pt-2">
                                                    <a href="{{ Route('agenteitem', $p->agentes->id) }}">
                                                        {{ $p->agentes->nome }} <br>
                                                    </a>
                                                </li>

                                            </ul>
                                            <ul class="list-inline ml-auto">
                                                <li class="list-inline-item pt-1">
                                                    <h6 class="text-primary">
                                                        {{ number_format($p->preco, 2, ',', '.') }}
                                                        {{ $p->moedas->nome }}</h6>
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

        </div>
    </section>
</div>
