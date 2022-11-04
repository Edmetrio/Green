<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 col-custom widget-mt">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="row" style="margin: 2%">
                        <div class="col-lg-12">
                            <div class="pull-left">
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-success" href=""> Adicionar </a>
                            </div>
                        </div>
                    </div>

                    @if ($updateMode)
                        @include('livewire.noticia.update')
                    @else
                        @include('livewire.noticia.create')
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th class="text-center" width="200px">Acções</th>
                        </tr>
                        @forelse ($noticia as $p)
                            <tr>
                                <td><img src="{{ asset('storage') }}/{{ $p->icon }}" width="100px"></td>
                                <td>{{ $p->nome }}</td>
                                <td>{{ $p->categorias->nome }}</td>
                                <td>
                                    <button wire:click.prevent="edit('{{ $p->id }}')"
                                        class="btn btn-primary btn-sm">Alterar</button>
                                    <button wire:click.prevent="delete('{{ $p->id }}')"
                                        class="btn btn-danger btn-sm">Apagar</button>
                                </td>
                            </tr>
                        @empty
                            <h3>Sem dados</h3>
                        @endforelse
                    </table>

                    {{-- {!! $propriedade->links() !!} --}}
                </div>
            </div>
    </section>
</div>
