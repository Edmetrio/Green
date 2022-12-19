<div>
    @foreach($agentes as $p)
    <section class="profile__agents">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title__head-v2">
                        <h2 class="text-capitalize">{{$p->nome}}</h2>
                        <p class="text-capitalize">Encontre staff pertencente a Green Propriety Mozambique.</p>
                    </div>
                </div>
            </div>
            <div class="recent__property-carousel owl-carousel owl-theme">
                @foreach ($p->agentes as $a)
                <div class="wrap-agent">
                    <div class="team-member">
                        <div class="team-img">
                            <img alt="team member" class="img-fluid w-100" src="{{ asset('storage') }}/{{ $a->icon }}">
                        </div>
                        <div class="team-hover">
                            <div class="desk">
                                <h5>
                                    Olá !
                                </h5>
                                <p>
                                    Eu sou {{$p->nome}}
                                </p>
                                <a class="btn btn-primary" href="{{ Route('agenteitem', $a->id) }}">
                                    Perfil do {{$p->nome}}
                                </a>
                            </div>
                        </div>
                        <div class="team-title">
                            <h6>
                                {{$a->nome}}
                            </h6>
                            <span>
                                {{$p->nome}}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
</div>
