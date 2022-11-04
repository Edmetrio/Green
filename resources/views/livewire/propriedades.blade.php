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
                            <a class="btn btn-success" href="{{-- {{ route('propriedade.create')}} --}}"> Adicionar </a>
                        </div>
                    </div>
                </div>
    
                @if($updateMode)
                @include('livewire.propriedade.update')
                @else
                @include('livewire.propriedade.create')
                @endif
    
                <table class="table table-bordered" >
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th class="text-center" width="200px">Acções</th>
                    </tr>
                    @foreach ($propriedade as $p)
                    <tr>
                        {{-- <td>{{ ++$i }}</td> --}}
                        <td><img src="{{ asset('storage') }}/{{ $p->icon }}" width="100px"></td>
                        <td>{{ $p->nome }}</td>
                        <td>{{ $p->preco }}</td>
                        <td>
                            <button wire:click.prevent="edit('{{ $p->id }}')"
                                class="btn btn-primary btn-sm">Alterar</button>
                            <button wire:click.prevent="delete('{{ $p->id }}')"
                                class="btn btn-danger btn-sm">Apagar</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
                
               {{--  {!! $propriedade->links() !!} --}}
            </div>
        </div>
    </section>
</div>
