<div class="col-md-6 col-lg-6">
    <div class="card__image card__box-v1">
        <div class="card__image-header h-250">
            <div class="ribbon text-capitalize">{{$p->estados->nome}}</div>
            <img src="{{ asset('storage') }}/{{ $p->icon }}" alt=""
                class="img-fluid w100 img-transition">
            <div class="info"> {{$p->categorias->nome}}</div>
        </div>
        <div class="card__image-body">
            <span
                class="badge badge-primary text-capitalize mb-2">{{$p->tipos->nome}}</span>
            <h6 class="text-capitalize">
                {{$p->nome}}
            </h6>
            <p class="text-capitalize">
                <i class="fa fa-map-marker"></i>
                {{$p->distritos->nome}}, las vegas
            </p>
        </div>
        <div class="card__image-footer">
            <figure>
                <img src="{{ asset('storage') }}/{{ $p->agentes->icon }}" alt=""
                    class="img-fluid rounded-circle">
            </figure>
            <ul class="list-inline my-auto">
                <li class="list-inline-item ">
                    <a href="#">
                        {{$p->agentes->nome}}
                    </a>
                </li>
            </ul>
            <ul class="list-inline my-auto ml-auto">
                <li class="list-inline-item">
                    <h6>{{$p->preco}},00MZN</h6>
                </li>
            </ul>
        </div>
    </div>
</div>