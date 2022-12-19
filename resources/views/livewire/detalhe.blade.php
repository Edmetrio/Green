<div>
    @include('livewire.modal')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div class=" wrapper__list__category">
                        <!-- CATEGORY -->
                        <div class="widget widget__archive">
                            <div class="widget__title">
                                <h5 class="text-dark mb-0 text-center">Menú Rápido</h5>
                            </div>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ Route('propriedade')}}" class="text-capitalize">
                                        Propriedade
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('detalhes')}}" class="text-capitalize">
                                        Detalhes
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('foto')}}" class="text-capitalize">
                                        Gerir Fotos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('agentes')}}" class="text-capitalize">
                                        Alterar Perfil
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END CATEGORY -->
                    </div>
                </div>
                <div class="col-lg-8 col-12 col-custom widget-mt">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>io 
                    @endif

                    <div class="row" style="margin: 2%">
                        <div class="col-lg-12">
                            <div class="pull-left">
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-success" data-toggle="modal" data-target="#addProvinciaModal"> Adicionar Descrição </button>
                            </div>
                        </div>
                    </div>

                    @if ($updateMode)
                        @include('livewire.detalhe.update')
                    @else
                        @include('livewire.detalhe.create')
                    @endif

                    @if($propriedadees != null)
                    @if($propriedadees->users->roles->nome === 'Dev')
                    <table class="table table-bordered">
                        <tr>
                            <th>Propriedade</th>
                            <th class="text-center" width="200px">Acções</th>
                        </tr>
                        @foreach($devs as $p)
                            <tr>
                                <td> <strong> {{ $p->nome }} </strong></td>
                                @foreach($p->detalhes as $d)
                                <tr>
                                    <td><strong>{{$d->descricaos->nome}}:</strong> {{$d->nome}}</td>
                                    <td>
                                        <button wire:click.prevent="edit('{{ $d->id }}')"
                                            class="btn btn-primary btn-sm">Alterar</button>
                                        <button wire:click.prevent="delete('{{ $d->id }}')"
                                            class="btn btn-danger btn-sm">Apagar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <table class="table table-bordered">
                        <tr>
                            <th>Propriedade</th>
                            <th class="text-center" width="200px">Acções</th>
                        </tr>
                        @foreach($users as $p)
                        <tr>
                            <td> <strong> {{ $p->nome }} </strong></td>
                            @foreach($p->detalhes as $d)
                            <tr>
                                <td><strong>{{$d->descricaos->nome}}:</strong> {{$d->nome}}</td>
                                <td>
                                    <button wire:click.prevent="edit('{{ $d->id }}')"
                                        class="btn btn-primary btn-sm">Alterar</button>
                                    <button wire:click.prevent="delete('{{ $d->id }}')"
                                        class="btn btn-danger btn-sm">Apagar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tr>
                        @endforeach
                    </table>
                    @endif
                    @else
                    @endif
                </div>
            </div>
    </section>
</div>
