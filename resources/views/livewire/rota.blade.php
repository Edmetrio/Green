<div>
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
                                    <a href="{{ Route('propriedade') }}" class="text-capitalize">
                                        Propriedade
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('detalhes') }}" class="text-capitalize">
                                        Detalhes
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('foto') }}" class="text-capitalize">
                                        Gerir Fotos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('agentes') }}" class="text-capitalize">
                                        Alterar Perfil
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END CATEGORY -->
                    </div>
                </div>
                <div class="col-lg-8 col-12 col-custom widget-mt">

                    @if ($updateMode)
                        @include('livewire.rota.update')
                    @else
                        @include('livewire.rota.create')
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>Nome</th>
                            <th class="text-center" width="200px">Acções</th>
                        </tr>
                        @foreach ($rota as $p)
                            <tr>
                                <td>{{ $p->nome }}</td>
                                <td>
                                    <button wire:click.prevent="edit('{{ $p->id }}')"
                                        class="btn btn-primary btn-sm">Alterar</button>
                                    <button wire:click.prevent="delete('{{ $p->id }}')"
                                        class="btn btn-danger btn-sm">Apagar</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $rota->links() }}
                </div>
            </div>
    </section>
</div>
