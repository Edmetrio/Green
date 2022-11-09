<div>
    <section class="profile__agents">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row no-gutters">
                        <div class="col-lg-12 cards mt-0">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <a href="#" class="profile__agents-avatar">
                                        <img src="{{ asset('storage') }}/{{ $agente->icon }}" alt=""
                                            class="img-fluid ">
                                        <div class="total__property-agent">{{$agente->propriedades->count()}} Propriedades</div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-lg-6 my-auto">
                                    <div class="profile__agents-info">
                                        <h5 class="text-capitalize">
                                            <a href="#" target="_blank">{{ $agente->nome }}</a>
                                        </h5>
                                        <p class="text-capitalize mb-1">{{ $agente->distritos->nome }} -
                                            {{ $agente->distritos->provincias->nome }}</p>
                                        <ul class="list-unstyled mt-2">
                                            <li><a href="#" class="text-capitalize"><span><i
                                                            class="fa fa-building"></i>
                                                        office :</span> {{ $agente->endereco }}</a>
                                            </li>
                                            <li><a href="#" class="text-capitalize"><span><i
                                                            class="fa fa-phone"></i>
                                                        mobile :</span>{{ $agente->contacto }}</a></li>
                                            <li><a href="#" class="text-capitalize"><span><i
                                                            class="fa fa-fax"></i> fax
                                                        : </span>{{ $agente->email }}</a></li>
                                        </ul>
                                        <p class="mb-0 mt-3">
                                            <button class="btn btn-social btn-social-o facebook mr-1">
                                                <i class="fa fa-facebook-f"></i>
                                            </button>
                                            <button class="btn btn-social btn-social-o instagram mr-1">
                                                <i class="fa fa-instagram"></i>
                                            </button>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- LOCATION -->
                    <div class="single__detail-features tabs__custom">
                        <h5 class="text-capitalize detail-heading">Propriedades</h5>
                        <!-- FILTER VERTICAL -->
                        <ul class="nav nav-pills myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active pills-tab-one" data-toggle="pill" href="#pills-tab-one"
                                    role="tab" aria-controls="pills-tab-one" aria-selected="true">
                                    Descrição
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pills-tab-two" data-toggle="pill" href="#pills-tab-two"
                                    role="tab" aria-controls="pills-tab-two" aria-selected="false">
                                    Listagem</a>
                            </li>


                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pills-tab-one" role="tabpanel"
                                aria-labelledby="pills-tab-one">
                                <div class="single__detail-desc">
                                    <h5 class="text-capitalize detail-heading">Descrição, {{ $agente->nome }}</h5>
                                    <div class="show__more">
                                        <ul>
                                            <li><strong>Endereço: </strong> {{ $agente->endereco }}</li>
                                            <li><strong>E-mail: </strong> {{ $agente->email }}</li>
                                            <li><strong>Contacto: </strong> {{ $agente->contacto }}</li>
                                            <li><strong>Distrito: </strong> {{ $agente->distritos->nome }}</li>
                                            <li><strong>Província: </strong> {{ $agente->distritos->provincias->nome }}
                                            </li>
                                        </ul>
                                        <a href="javascript:void(0)" class="show__more-button ">Ler Mais</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="tab-pane fade" id="pills-tab-two" role="tabpanel"
                                aria-labelledby="pills-tab-two">
                                @foreach ($agente->propriedades as $p)
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card__image card__box-v1">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4 col-lg-3 col-xl-4">
                                                        <div class="card__image__header h-250">
                                                            <a href="#">
                                                                @if ($p->estados->nome === 'Disponível')
                                                                    <div class="ribbon text-uppercase">
                                                                        {{ $p->estados->nome }}</div>
                                                                @else
                                                                    <div class="ribbon text-uppercase"
                                                                        style="background-color: red">
                                                                        {{ $p->estados->nome }}></div>
                                                                @endif
                                                                <img src="{{ asset('storage') }}/{{ $p->icon }}"
                                                                    alt=""
                                                                    class="img-fluid w100 img-transition">
                                                                <div class="info"> </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-6 col-xl-5 my-auto">
                                                        <div class="card__image__body">

                                                            <span
                                                                class="badge badge-primary text-capitalize mb-2">{{ $p->tipos->nome }}</span>
                                                            <h6>
                                                                <a href="#">{{ $p->nome }}</a>
                                                            </h6>
                                                            <div class="card__image__body-desc">
                                                                <p class="text-capitalize">
                                                                    <i class="fa fa-map-marker"></i>
                                                                    {{ $p->endereco }}, {{ $p->distritos->nome }} -
                                                                    {{ $p->distritos->provincias->nome }}
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-4 col-lg-3 col-xl-3 my-auto card__image__footer-first">
                                                        <div class="card__image__footer">
                                                            <figure>
                                                                <img src="{{ asset('storage') }}/{{ $agente->icon }}"
                                                                    alt="" class="img-fluid rounded-circle">
                                                            </figure>
                                                            <ul class="list-inline my-auto">
                                                                <li class="list-inline-item name">
                                                                    <a href="{{ Route('agenteitem', $agente->id) }}">
                                                                        {{ $agente->nome }}
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="list-inline my-auto ml-auto price">
                                                                <li class="list-inline-item ">

                                                                    <h6>{{ $p->preco }},00MZN</h6>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                                <div class="clearfix"></div>

                            </div>

                            <div class="tab-pane fade" id="pills-tab-four" role="tabpanel"
                                aria-labelledby="pills-tab-four">

                                <!-- RATE US  WRITE -->
                                <div class="single__detail-features-review ">
                                    <div class="media mt-4">
                                        <img src="images/profile-blog.jpg" alt=""
                                            class="img-fluid rounded-circle mr-3">
                                        <div class="media-body">
                                            <h6 class="mt-0">Jhon doe</h6>
                                            <span class="mb-3">Mei 13, 2020</span>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">3/5</li>
                                            </ul>
                                            <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus
                                                viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                                Donec
                                                lacinia congue felis in faucibus.</p>

                                            <div class="media mt-4">
                                                <a class="pr-3" href="#">
                                                    <img src="images/logo.jpg" alt=""
                                                        class="img-fluid rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="mt-0">Mark </h6>
                                                    <span class="mb-3">Mei 13, 2020</span>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star selected"></i>
                                                            <i class="fa fa-star selected"></i>
                                                            <i class="fa fa-star selected"></i>
                                                            <i class="fa fa-star selected"></i>
                                                            <i class="fa fa-star selected"></i>
                                                        </li>
                                                        <li class="list-inline-item">5/5</li>
                                                    </ul>
                                                    <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                                                        scelerisque ante sollicitudin. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="media mt-4">
                                        <img src="images/profile-blog.jpg" alt=""
                                            class="img-fluid rounded-circle mr-3">
                                        <div class="media-body">
                                            <h6 class="mt-0">Jhon Doe</h6>
                                            <span class="mb-3">Mei 13, 2020</span>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                </li>
                                                <li class="list-inline-item">5/5</li>
                                            </ul>
                                            <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus
                                                viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                                Donec
                                                lacinia congue felis in faucibus.</p>


                                        </div>
                                    </div>
                                    <!-- COMMENT -->
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="mb-2">Your rating for this listing:</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star selected"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">3/5</li>
                                            </ul>
                                            <div class="form-group">
                                                <label>Your Name</label>
                                                <input type="text" class="form-control" required="required">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>What's your Email?</label>
                                                <input type="email" class="form-control" required="required">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" required="required">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Your message</label>
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary float-right "> Submit review <i
                                            class="fa fa-paper-plane ml-2"></i></button>
                                    <!-- END COMMENT -->
                                </div>

                                <!-- END RATE US  WRITE -->
                                <div class="clearfix"></div>
                            </div>


                        </div>
                        <!-- END FILTER VERTICAL -->
                    </div>
                    <!-- END LOCATION -->
                </div>
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <!-- FORM FILTER -->
                        <div class="products__filter mb-30">
                            <form>
                                <div class="products__filter__group">
                                    <div class="products__filter__header">
                                        <h5 class="text-center text-capitalize">Contacte {{ $agente->nome }}</h5>
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
                                    </div>
                                    <div class="products__filter__body">
                                        <div class="form-group">
                                            <input wire:model="email2" type="text" class="form-control" hidden>
                                            <label>Nome Completo</label>
                                            <input wire:model="nome" type="text" class="form-control">
                                            <span class="text-danger">
                                                @error('nome')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input wire:model="email" type="email" class="form-control">
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Contacto</label>
                                            <input wire:model="contacto" type="text" class="form-control">
                                            <span class="text-danger">
                                                @error('contacto')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label>Sua Mensagem</label>
                                            <textarea wire:model="mensagem" class="form-control" rows="3"></textarea>
                                            <span class="text-danger">
                                                @error('mensagem')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                    </div>
                                    <div class="products__filter__footer">
                                        <div class="form-group mb-0">
                                            <button wire:click.prevent="store()"
                                                class="btn btn-primary text-capitalize btn-block"> Enviar <i
                                                    class="fa fa-paper-plane ml-1"></i></button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END FORM FILTER -->
                        <!-- ARCHIVE CATEGORY -->
                        <aside class=" wrapper__list__category">
                            <!-- CATEGORY -->
                            <div class="widget widget__archive">
                                <div class="widget__title">
                                    <h5 class="text-dark mb-0 text-center">Mais Agentes</h5>
                                </div>
                                <ul class="list-unstyled">
                                    @foreach ($agentes as $a)
                                        <li>
                                            <a href="{{ Route('agenteitem', $a->id) }}" class="text-capitalize">
                                                {{ $a->nome }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
