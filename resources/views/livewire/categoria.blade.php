<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs__custom-v2 ">
                                <!-- FILTER VERTICAL -->
                                <ul class="nav nav-pills myTab" role="tablist">
                                    <li class="list-inline-item mr-auto col-12 col-md-8">
                                        <div class="col-12 col-md-8">
                                            <select wire:model="selectedTipo" class="form-control"
                                                id="exampleFormControlSelect1">
                                                <option data-display="All Categories">Todos Tipos</option>
                                                @foreach ($tipos as $t)
                                                    <option value="{{ $t->id }}">{{ $t->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#pills-tab-one" role="tab"
                                            aria-controls="pills-tab-one" aria-selected="true">
                                            <span class="fa fa-th-list"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#pills-tab-two"
                                            role="tab" aria-controls="pills-tab-two" aria-selected="false">
                                            <span class="fa fa-th-large"></span></a>
                                    </li> --}}
                                </ul>


                                <div class="container">
                                    <div class="row">
                                        @if ($Mode === false)
                                            @foreach ($propriedade as $p)
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="card__image card__box-v1">
                                                        <div class="card__image-header h-250">
                                                            @if ($p->estados->nome === 'Disponível')
                                                                <div class="ribbon text-uppercase">
                                                                    {{ $p->estados->nome }}
                                                                </div>
                                                            @else
                                                                <div class="ribbon text-uppercase">
                                                                    {{ $p->estados->nome }}></div>
                                                            @endif
                                                            <a href="{{ Route('detalhe', $p->id)}}">
                                                            <img src="{{ asset('storage') }}/{{ $p->icon }}"
                                                                alt="" class="img-fluid w100 img-transition">
                                                            </a>
                                                            <div class="info">{{ $p->tipos->nome }}</div>
                                                        
                                                        </div>
                                                        <div class="card__image-body">
                                                            <span class="badge badge-primary text-capitalize mb-2">
                                                                {{ $p->categorias->nome }}</span>
                                                            <h6 class="text-capitalize">
                                                                {{ $p->nome }}
                                                            </h6>

                                                            <p style="max-width: 50ch;
                                                            overflow: hidden;
                                                            text-overflow: ellipsis;
                                                            white-space: nowrap;" class="text-capitalize">
                                                                <i class="fa fa-map-marker"></i>
                                                                {{$p->endereco}}, {{ $p->distritos->nome }}
                                                            </p>
                                                        </div>
                                                        <div class="card__image-footer">
                                                            <figure>
                                                                <img src="{{ asset('storage') }}/{{ $p->icon }}"
                                                                    alt="" class="img-fluid rounded-circle">
                                                            </figure>
                                                            <ul class="list-inline my-auto">
                                                                <li class="list-inline-item ">
                                                                    <a href="{{ Route('agenteitem', $p->agentes->id)}}">
                                                                        {{ $p->agentes->nome }}
                                                                    </a>

                                                                </li>
                                                            </ul>
                                                            <ul class="list-inline my-auto ml-auto">
                                                                <li class="list-inline-item">
                                                                    <h6>{{ number_format($p->preco, 2, ',','.')}} MZN</h6>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach ($propriedades as $p)
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="card__image card__box-v1">
                                                        <div class="card__image-header h-250">
                                                            @if ($p->estados->nome === 'Disponível')
                                                                <div class="ribbon text-uppercase">
                                                                    {{ $p->estados->nome }}
                                                                </div>
                                                            @else
                                                                <div class="ribbon text-uppercase">
                                                                    {{ $p->estados->nome }}></div>
                                                            @endif
                                                            <a href="{{ Route('detalhe', $p->id)}}">
                                                            <img src="{{ asset('storage') }}/{{ $p->icon }}"
                                                                alt="" class="img-fluid w100 img-transition">
                                                            </a>
                                                            <div class="info">{{ $p->tipos->nome }}</div>
                                                        </div>
                                                        <div class="card__image-body">
                                                            <span class="badge badge-primary text-capitalize mb-2">
                                                                {{ $p->categorias->nome }}</span>
                                                            <h6 style="max-width: 50ch;
                                                            overflow: hidden;
                                                            text-overflow: ellipsis;
                                                            white-space: nowrap;" class="text-capitalize">
                                                                {{ $p->nome }}
                                                            </h6>

                                                            <p class="text-capitalize">
                                                                <i class="fa fa-map-marker"></i>
                                                                {{$p->endereco}}, {{ $p->distritos->nome }}
                                                            </p>
                                                        </div>
                                                        <div class="card__image-footer">
                                                            <figure>
                                                                <img src="{{ asset('storage') }}/{{ $p->icon }}"
                                                                    alt="" class="img-fluid rounded-circle">
                                                            </figure>
                                                            <ul class="list-inline my-auto">
                                                                <li class="list-inline-item ">
                                                                    <a href="{{ Route('agenteitem', $p->agentes->id)}}">
                                                                        {{ $p->agentes->nome }}
                                                                    </a>

                                                                </li>
                                                            </ul>
                                                            <ul class="list-inline my-auto ml-auto">
                                                                <li class="list-inline-item">
                                                                    <h6>{{ number_format($p->preco, 2, ',','.')}} MZN</h6>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
</div>
