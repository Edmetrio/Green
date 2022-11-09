<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single__blog-detail">
                        <h1>
                            {{$noticia->nome}}
                        </h1>

                        <div class="single__blog-detail-info">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <figure class="image-profile">
                                        <img src="{{ asset('storage') }}/{{ $noticia->icon }}" class="img-fluid" alt="">
                                    </figure>
                                </li>
                                <li class="list-inline-item">

                                    <span>
                                        by
                                    </span>
                                    <a href="#">
                                        john doe,
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        descember 09, 2016
                                    </span>
                                </li>

                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        in
                                    </span>
                                    <a href="#">
                                        business
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <figure>
                            <img src="{{ asset('storage') }}/{{ $noticia->icon }}" class="img-fluid" alt="">
                        </figure>

                        <p class="drop-cap">
                            {{$noticia->descricao}}.
                        </p>


                        <p>
                            {{$noticia->texto}}.
                        </p>

                        <!-- BLOCKQUOTE -->
                        <blockquote class="block-quote">
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content
                                of a page when looking at
                                its layout.
                            </p>
                            <cite>
                                Tom Cruise
                            </cite>
                        </blockquote>
                        <!-- END BLOCKQUOTE -->

                        <p>
                            {{$noticia->texto1}}.
                        </p>

                    </div>
                </div>
                <!-- WIDGET BLOG -->
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <aside>
                            <div class="widget__sidebar mt-0">
                                <div class="widget__sidebar__header">
                                    <h6 class="text-capitalize">Procurar</h6>
                                </div>
                                <div class="widget__sidebar__body">
                                    <div class="input-group">
                                        <input type="text" name="search_term_string" class="form-control"
                                            placeholder="Procurar artigos . . .">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn-search btn"><i
                                                    class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </aside>
                        <aside>
                            <div class="widget__sidebar">
                                <div class="widget__sidebar__header">
                                    <h6 class="text-capitalize">Tipos</h6>
                                </div>
                                <div class="widget__sidebar__body">
                                    <ul class="list-unstyled">
                                        @foreach($tipo as $t)
                                        <li>
                                            <a href="{{ Route('item', $t->id)}}" class="text-capitalize">
                                                {{$t->nome}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </aside>
                        <aside>
                            <div class="widget__sidebar">
                                <div class="widget__sidebar__header">
                                    <h6 class="text-capitalize">Notícias Recentes</h6>
                                </div>
                                <div class="widget__sidebar__body">
                                    @foreach($noticias as $n)
                                    <div class="widget__sidebar__body-img">
                                        <img src="{{ asset('storage') }}/{{ $n->icon }}" alt="" class="img-fluid">
                                        <div class="widget__sidebar__body-heading">
                                            <h6 class="text-capitalize">
                                                {{$n->nome}}
                                            </h6>

                                        </div>
                                        <span class="badge badge-secondary p-1 text-capitalize mb-1">{{ $n->created_at->format('d-m-y') }}
                                        </span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </aside>
                        <aside>
                            <div class="widget__sidebar">
                                <div class="widget__sidebar__header">
                                    <h6 class="text-capitalize">tags</h6>
                                </div>
                                <div class="widget__sidebar__body">
                                    <div class="blog__tags p-0">
                                        <ul class="list-inline">
                                            @foreach($propriedade as $p)
                                            <li class="list-inline-item">
                                                <a href="{{ Route('detalhe', $p->id)}}">
                                                    #{{$p->nome}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <!-- END WIDGET BLOG -->
        </div>
    </section>
</div>
