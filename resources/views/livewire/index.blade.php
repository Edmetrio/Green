<div class="col-md-6 col-lg-6">
    <div class="card__image card__box-v1">
        <div class="card__image-header h-250">
            <div class="ribbon text-capitalize">{{$p->estados->nome}}</div>
            <img src="{{asset('assets/images/propriedade/'.$p->icon)}}" alt=""
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
            <ul class="list-inline card__content">
                <li class="list-inline-item">

                    <span>
                        baths <br>
                        <i class="fa fa-bath"></i> 2
                    </span>
                </li>
                <li class="list-inline-item">
                    <span>
                        beds <br>
                        <i class="fa fa-bed"></i> 3
                    </span>
                </li>
                <li class="list-inline-item">
                    <span>
                        rooms <br>
                        <i class="fa fa-inbox"></i> 3
                    </span>
                </li>
                <li class="list-inline-item">
                    <span>
                        area <br>
                        <i class="fa fa-map"></i> 4300 sq ft
                    </span>
                </li>
            </ul>
        </div>
        <div class="card__image-footer">
            <figure>
                <img src="{{asset('assets/images/logo.jpg')}}" alt=""
                    class="img-fluid rounded-circle">
            </figure>
            <ul class="list-inline my-auto">
                <li class="list-inline-item ">
                    <a href="#">
                        tom wilson
                    </a>

                </li>

            </ul>
            <ul class="list-inline my-auto ml-auto">
                <li class="list-inline-item">

                    <h6>${{$p->preco}}</h6>
                </li>

            </ul>
        </div>
    </div>
</div>