<div class="col-md-4 col-lg-4">
    <div class="card__image card__box-v1">
        <div class="card__image-header h-250">
            @if ($p->estados->nome === 'Disponível')
                <div class="ribbon text-uppercase">{{ $p->estados->nome }}</div>
            @else
                <div class="ribbon text-uppercase" style="background-color: red">
                    {{ $p->estados->nome }}></div>
            @endif
            <a href="{{ Route('detalhe', $p->id) }}">
                <img src="{{ asset('storage') }}/{{ $p->icon }}" alt="" class="img-fluid w100 img-transition">
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
                white-space: nowrap;"
                class="text-capitalize">
                <i class="fa fa-map-marker"></i>
                {{ $p->endereco }}, {{ $p->distritos->nome }}
            </p>
        </div>
        <div class="card__image-footer">
            <figure>
                <img src="{{ asset('storage') }}/{{ $p->icon }}" alt="" class="img-fluid rounded-circle">
            </figure>
            <ul class="list-inline my-auto">
                <li class="list-inline-item ">
                    <a href="{{ Route('detalhe', $p->id) }}">
                        {{ $p->agentes->nome }}
                    </a>

                </li>
            </ul>
            <ul class="list-inline my-auto ml-auto">
                <li class="list-inline-item">
                    <h6>{{ $p->preco }},00MT</h6>
                </li>

            </ul>
        </div>
    </div>
</div>
