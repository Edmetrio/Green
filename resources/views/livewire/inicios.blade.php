<div>
    <div class="search__area search__area-1" id="search__area-1">
        <div class="container">
            <div class="search__area-inner">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-3">
                        <div class="form-group">
                            <select wire:model="selectedCategorias" class="form-control">
                                <option data-display="Categoria">Categoria</option>
                                @forelse ($categoria as $c)
                                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                                @empty
                                    <div class="col-md-8 col-lg-6 mx-auto" style="margin-top: 6%">
                                        <div class="title__head">
                                            <h2 class="text-center text-capitalize">
                                                Sem Resultados
                                            </h2>
                                        </div>
                                    </div>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <div class="form-group">
                            <select wire:model="selectedTipos" class="form-control">
                                <option data-display="Tipo">Tipo</option>
                                @foreach ($tipoitem as $t)
                                    <option value="{{ $t->id }}">{{ $t->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <select wire:model="selectedProvincia" class="form-control" id="exampleFormControlSelect1">
                            <option data-display="Tipo">Seleccione a Província</option>
                            @foreach ($provincias as $p)
                                <option value="{{ $p->id }}">{{ $p->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (!is_null($selectedProvincia))
                        <div class="col-6 col-lg-3 col-md-3">
                            <select wire:model="selectedDistritos" class="form-control">
                                <option data-display="Distritos">Seleccione o Distrito</option>
                                @foreach ($distritos as $d)
                                    <option value="{{ $d->id }}">{{ $d->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($ModeGlobal === false)
        <section class="featured__property space-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="title__head">
                            <h2 class="text-center text-capitalize">
                                CATEGORIAS
                            </h2>
                            <p class="text-center text-capitalize">Encontre todas as Categorias.</p>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="featured__property-carousel owl-carousel owl-theme">
                            @forelse ($tipo as $p)
                                <a href="{{ Route('item', $p->id) }}">
                                    <div class="card__image-hover-style-v3">
                                        <div class="card__image-hover-style-v3-thumb h-230">
                                            <img src="{{ asset('storage') }}/{{ $p->icon }}" alt=""
                                                class="img-fluid w-100">
                                        </div>
                                        <div class="overlay">
                                            <div class="desc">
                                                <h6 class="text-capitalize">{{ $p->nome }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="col-md-8 col-lg-6 mx-auto" style="margin-top: 6%">
                                    <div class="title__head">
                                        <h2 class="text-center text-capitalize">
                                            Sem Resultados
                                        </h2>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="featured__property bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="title__head">
                            <h2 class="text-center text-capitalize">
                                Propriedades Em Destaque
                            </h2>
                            <p class="text-center text-capitalize">Propriedades Exclusivas Escolhidas a Dedo Por Nossa
                                Equipe.</p>

                        </div>
                    </div>
                </div>
                <div class="featured__property-carousel owl-carousel owl-theme">
                    @forelse ($propriedade as $p)
                        <div class="item">
                            <!-- ONE -->
                            <div class="card__image card__box">
                                <div class="card__image-header h-250">
                                    @if ($p->estados->nome === 'Disponível')
                                        <div class="ribbon text-uppercase">{{ $p->estados->nome }}</div>
                                    @elseif($p->estados->nome === 'Indisponível')
                                        <div class="ribbon text-uppercase" style="background-color: red">
                                            {{ $p->estados->nome }}></div>
                                    @elseif($p->estados->nome === 'Reservado')
                                        <div class="ribbon text-uppercase" style="background-color: orange">
                                            {{ $p->estados->nome }}></div>
                                    @endif
                                    <a href="{{ Route('detalhe', $p->id) }}">
                                        <img src="{{ asset('storage') }}/{{ $p->icon }}" alt=""
                                            class="img-fluid w100 img-transition">
                                    </a>
                                    <div class="info"> {{ $p->categorias->nome }}</div>
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary text-capitalize mb-2">{{ $p->tipoitems->tipos->nome }}</span>
                                    <h6 style="max-width: 45ch;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;"
                                        class="text-capitalize">
                                        <a href="{{ Route('detalhe', $p->id) }}">
                                            {{ $p->nome }}
                                        </a>
                                    </h6>

                                    <p style="max-width: 45ch;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;"
                                        class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        Av. Salvador Allende, nº. 42, {{ $p->distritos->nome }}
                                    </p>
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="{{ asset('storage') }}/{{ $p->agentes->icon }}" alt=""
                                            class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item pt-2">
                                            <a href="{{ Route('agenteitem', $p->agentes->id) }}">
                                                {{ $p->agentes->nome }}
                                            </a>

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item ">

                                            <h6>{{ number_format($p->preco, 2, ',', '.') }} {{ $p->moedas->nome }}
                                            </h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-8 col-lg-6 mx-auto" style="margin-top: 6%">
                            <div class="title__head">
                                <h2 class="text-center text-capitalize">
                                    Sem Resultados
                                </h2>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="title__head">
                            <h2 class="text-center text-capitalize">
                                todas publicações
                            </h2>
                            <p class="text-center text-capitalize">Encontre todas as publicações disponíveis na
                                plataforma.
                            </p>

                        </div>
                    </div>
                </div>

                <div class="card__image-filter">
                    <div class="filterizr-control">
                        <ul class="list-inline filterizr-filter">
                            @foreach ($tipo as $p)
                                <li class="list-inline-item btn-filter" {{-- data-filter="1" --}}><a
                                        wire:click.prevent="edit('{{ $p->id }}')">{{ $p->nome }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="container">
                        <div class="row">
                            @if ($Mode === false)
                                @forelse ($propriedade as $p)
                                    <div class="col-md-4 col-lg-4">
                                        <div class="card__image card__box-v1">
                                            <div class="card__image-header h-250">
                                                @if ($p->estados->nome === 'Disponível')
                                                    <div class="ribbon text-uppercase">{{ $p->estados->nome }}</div>
                                                @elseif($p->estados->nome === 'Indisponível')
                                                    <div class="ribbon text-uppercase" style="background-color: red">
                                                        {{ $p->estados->nome }}></div>
                                                @elseif($p->estados->nome === 'Reservado')
                                                    <div class="ribbon text-uppercase"
                                                        style="background-color: orange">
                                                        {{ $p->estados->nome }}></div>
                                                @endif
                                                <a href="{{ Route('detalhe', $p->id) }}">
                                                    <img src="{{ asset('storage') }}/{{ $p->icon }}"
                                                        alt="" class="img-fluid w100 img-transition">
                                                </a>
                                                <div class="info"> {{ $p->categorias->nome }}</div>
                                            </div>
                                            <div class="card__image-body">
                                                <span
                                                    class="badge badge-primary text-capitalize mb-2">{{ $p->tipoitems->tipos->nome }}</span>
                                                <h6 style="max-width: 45ch;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;"
                                                    class="text-capitalize">
                                                    <a href="{{ Route('detalhe', $p->id) }}">
                                                        {{ $p->nome }}
                                                    </a>
                                                </h6>
                                                <p style="max-width: 45ch;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;"
                                                    class="text-capitalize">
                                                    <i class="fa fa-map-marker"></i>
                                                    {{ $p->endereco }}, {{ $p->distritos->nome }}
                                                </p>
                                            </div>
                                            <div class="card__image-footer">
                                                <figure>
                                                    <img src="{{ asset('storage') }}/{{ $p->agentes->icon }}"
                                                        alt="" class="img-fluid rounded-circle">
                                                </figure>
                                                <ul class="list-inline my-auto">
                                                    <li class="list-inline-item ">
                                                        <a href="{{ Route('agenteitem', $p->agentes->id) }}">
                                                            {{ $p->agentes->nome }}
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="list-inline my-auto ml-auto">
                                                    <li class="list-inline-item">
                                                        <h6>{{ number_format($p->preco, 2, ',', '.') }}
                                                            {{ $p->moedas->nome }}</h6>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-8 col-lg-6 mx-auto" style="margin-top: 6%">
                                        <div class="title__head">
                                            <h2 class="text-center text-capitalize">
                                                Sem Resultados
                                            </h2>
                                        </div>
                                    </div>
                                @endforelse
                            @else
                                @forelse ($propriedades as $r)
                                    @foreach($r->propriedades as $p)
                                    <div class="col-md-4 col-lg-4">
                                        <div class="card__image card__box-v1">
                                            <div class="card__image-header h-250">
                                                @if ($p->estados->nome === 'Disponível')
                                                    <div class="ribbon text-uppercase">{{ $p->estados->nome }}</div>
                                                @elseif($p->estados->nome === 'Indisponível')
                                                    <div class="ribbon text-uppercase" style="background-color: red">
                                                        {{ $p->estados->nome }}></div>
                                                @elseif($p->estados->nome === 'Reservado')
                                                    <div class="ribbon text-uppercase"
                                                        style="background-color: orange">
                                                        {{ $p->estados->nome }}></div>
                                                @endif
                                                <a href="{{ Route('detalhe', $p->id) }}">
                                                    <img src="{{ asset('storage') }}/{{ $p->icon }}"
                                                        alt="" class="img-fluid w100 img-transition">
                                                </a>
                                                <div class="info">{{ $p->tipoitems->nome }}</div>
                                            </div>
                                            <div class="card__image-body">
                                                <span class="badge badge-primary text-capitalize mb-2">
                                                    {{ $p->categorias->nome }}</span>
                                                <h6 class="text-capitalize">
                                                    {{ $p->nome }}
                                                </h6>

                                                <p style="max-width: 45ch;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;"
                                                    class="text-capitalize">
                                                    <i class="fa fa-map-marker"></i>
                                                    {{ $p->endereco }}, {{ $p->distritos->nome }}
                                                </p>

                                            </div>
                                            <div class="card__image-footer">
                                                <figure>
                                                    <a href="{{ Route('detalhe', $p->id) }}">
                                                        <img src="{{ asset('storage') }}/{{ $p->icon }}"
                                                            alt="" class="img-fluid rounded-circle">
                                                    </a>
                                                </figure>
                                                <ul class="list-inline my-auto">
                                                    <li class="list-inline-item ">
                                                        <a href="#">
                                                            {{ $p->agentes->nome }}
                                                        </a>

                                                    </li>

                                                </ul>
                                                <ul class="list-inline my-auto ml-auto">
                                                    <li class="list-inline-item">
                                                        <h6>{{ number_format($p->preco, 2, ',', '.') }}
                                                            {{ $p->moedas->nome }}</h6>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @empty
                                    <div class="col-md-8 col-lg-6 mx-auto" style="margin-top: 6%">
                                        <div class="title__head">
                                            <h2 class="text-center text-capitalize">
                                                Sem Resultados
                                            </h2>
                                        </div>
                                    </div>
                                @endforelse
                            @endif
                        </div>
                    </div>
                </div>
        </section>

        <section class="bg-theme-v1">
            <div class="cta">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-12 text-center">
                            <h2 class="text-uppercase text-white">QUER VENDER OU ALUGAR SEU IMÓVEL?</h2>
                            <p class="text-capitalize text-white">Ajudaremos Você A Crescer Sua Carreira E Crescimento,
                                Entre Em Contato Com A Equipe Imobiliária Da Parede E Obtenha Esta Oferta Promociona</p>
                            <a href="{{ Route('contacto') }}" class="btn btn-primary text-uppercase ">Contacte-nos
                                <i class="fa fa-angle-right ml-3 arrow-btn "></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog__home">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="title__head">
                            <h2 class="text-center text-capitalize">
                                Últimas Notícias
                            </h2>
                            <p class="text-center text-capitalize">Encontrar Da Empresa Imobiliária Mais Popular Em
                                Moçambique. </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    @foreach ($noticia as $n)
                        <div class="col-md-4">
                            <!-- BLOG  -->
                            <div class="card__image">
                                <div class="card__image-header h-250">
                                    <img src="{{ asset('storage') }}/{{ $n->icon }}" alt=""
                                        class="img-fluid w100 img-transition">
                                    <div class="info"> {{ $n->destaques->nome }}</div>
                                </div>
                                <div class="card__image-body">
                                    <!-- <span class="badge badge-secondary p-1 text-capitalize mb-3">May 08, 2019 </span> -->
                                    <h6 class="text-capitalize">
                                        <a href="blog-single.html">{{ $n->nome }} </a>
                                    </h6>
                                    <p class=" mb-0">
                                        {{ $n->descricao }}
                                    </p>
                                </div>
                                <div class="card__image-footer">
                                    <ul class="list-inline my-auto">
                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item ">
                                            <a href="{{ Route('noticiaitem', $n->id) }}"
                                                class="btn btn-sm btn-primary "><small class="text-white ">Ler Mais<i
                                                        class="fa fa-angle-right ml-1"></i></small></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- END BLOG -->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs__custom-v2 ">
                                    <div class="container">
                                        <div class="row">
                                            @if ($ModeCategorias === true)
                                                @forelse ($categorias as $p)
                                                    @include('livewire.inicio.filtro')
                                                @empty
                                                    <div class="col-md-8 col-lg-6 mx-auto" style="margin-top: 6%">
                                                        <div class="title__head">
                                                            <h2 class="text-center text-capitalize">
                                                                Sem Resultados
                                                            </h2>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            @elseif($ModeTipos === true)
                                                @forelse ($tipos as $p)
                                                    @include('livewire.inicio.filtro')
                                                    @empty
                                                    <div class="col-md-8 col-lg-6 mx-auto" style="margin-top: 6%">
                                                        <div class="title__head">
                                                            <h2 class="text-center text-capitalize">
                                                                Sem Resultados
                                                            </h2>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            @elseif($ModeDistritos === true)
                                                @forelse ($dt as $p)
                                                    @include('livewire.inicio.filtro')
                                                @empty
                                                    <div class="col-md-8 col-lg-6 mx-auto" style="margin-top: 6%">
                                                        <div class="title__head">
                                                            <h2 class="text-center text-capitalize">
                                                                Sem Resultados
                                                            </h2>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
