<div>
    <section class="profile__agents">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- FORM FILTER -->
                    <div class="products__filter mb-30">
                        <div class="products__filter__group">
                            <div class="products__filter__header">

                                <h5 class="text-center text-capitalize">Encontrar Agente</h5>
                            </div>
                            <div class="products__filter__body">
                                <div class="form-group">
                                    <label>Pesquisar por nome do Agente</label>
                                    <input wire:model="search" type="text" class="form-control" placeholder="Digite o nome do agente">

                                </div>
                            </div>
                        </div>

                    </div>

                    <aside class=" wrapper__list__category">

                        <div class="widget widget__archive">
                            <div class="widget__title">
                                <h5 class="text-dark mb-0 text-center">Categorias de Propriedades</h5>
                            </div>
                            <ul class="list-unstyled">
                                @foreach($tipo as $t)
                                <li>
                                    <a href="{{ Route('item', $t->id)}}" class="text-capitalize">
                                        {{$t->nome}}
                                        {{-- <span class="badge badge-primary">{{$t->count()}}</span> --}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($agente as $a)
                        <div class="col-lg-6">
                            <div class="cards">
                                <div class="profile__agents-header">
                                    <a href="#" class="profile__agents-avatar">
                                        <img src="{{ asset('storage') }}/{{ $a->icon }}" alt="" class="img-fluid">
                                        <div class="total__property-agent">{{$a->propriedades->count()}} Propriedades</div>
                                    </a>
                                </div>
                                <div class="profile__agents-body">
                                    <div class="profile__agents-info">
                                        <h5 class="text-capitalize mb-0">
                                            <a href="#" target="_blank">{{$a->nome}}</a>
                                        </h5>
                                        <ul class="list-unstyled mt-2">
                                            <li><a href="#" class="text-capitalize"><span><i class="fa fa-building"></i>
                                                </span> {{$a->endereco}}</a>
                                            </li>
                                            <li><a href="#" class="text-capitalize"><span><i class="fa fa-phone"></i>
                                                        Contacto :</span> {{$a->contacto}}</a></li>
                                            <li><a href="#" class="text-capitalize"><span><i class="fa fa-envelope"></i>
                                                        email :</span>
                                                    {{$a->email}}</a></li>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
