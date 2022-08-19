@extends('layout')
     
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12 col-custom widget-mt">
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
                        <a class="btn btn-success" href="{{ route('propriedade.create')}}"> Adicionar </a>
                    </div>
                </div>
            </div>

            {{-- @if($updateMode)
            @include('livewire.users.update')
            @else
            @include('livewire.users.create')
            @endif --}}

            <table class="table table-bordered" >
                <tr>
                    <th>Nr.</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th class="text-center" width="200px">Acções</th>
                </tr>
                @foreach ($propriedade as $p)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="{{asset('assets/images/propriedade/'.$p->icon)}}" width="100px"></td>
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->preco }}</td>
                    <td>
                        <form action="{{ route('propriedade.destroy',$p->id) }}" method="POST">
             
              
                            <a class="btn btn-primary" href="{{ route('propriedade.edit',$p->id) }}">Alterar</a>
             
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger">Apagar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            
            {!! $propriedade->links() !!}
        </div>
    </div>
</section>

@endsection