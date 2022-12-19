<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3"></h3>
                    <ul>
                        <li><a href="">Início</a></li>
                        <li>Produto</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop-main-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-12 col-12 col-custom widget-mt">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Categoria:</strong>
                                <select class="form-control" wire:model="categoria_id">
                                    <option>Seleccione a categoria</option>
                                    @foreach ($categoria as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tipo:</strong>
                                <select class="form-control" wire:model="tipo_id">
                                    <option>Seleccione o tipo</option>
                                    @foreach ($tipo as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Área:</strong>
                                <select class="form-control" wire:model="area_id">
                                    <option>Seleccione a Área</option>
                                    @foreach ($area as $r)
                                        <option value="{{ $r->id }}">{{ $r->tamanho }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Distrito:</strong>
                                <select class="form-control" wire:model="distrito_id">
                                    <option>Seleccione o Distrito</option>
                                    @foreach ($distrito as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Estado:</strong>
                                <select class="form-control" wire:model="estado_id">
                                    <option>Seleccione o Estado</option>
                                    @foreach ($estado as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Agente:</strong>
                                <select class="form-control" wire:model="agente_id">
                                    <option>Seleccione o Agente</option>
                                    @foreach ($agente as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nome:</strong>
                                <input type="text" name="nome" class="form-control" placeholder="Nome" wire:model="nome">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Endereço:</strong>
                                <input type="text" name="endereco" class="form-control" placeholder="Endereço" wire:model="endereco">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-10">
                            <div class="form-group">
                                <strong>Preço:</strong>
                                <input type="text" name="preco" class="form-control" placeholder="Preço" wire:model="preco">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2">
                            <div class="form-group">
                                <strong>Moeda:</strong>
                                <select class="form-control" wire:model="moeda_id">
                                    <option>Seleccione a Moeda</option>
                                    @foreach ($moeda as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Descrição:</strong>
                                <textarea class="form-control" style="height:150px" name="descricao" placeholder="Descrição" wire:model="descricao"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Imagem:</strong>
                                <input type="file" name="icon" class="form-control" placeholder="icon" wire:model="new_icon">
                                @if($new_icon)
                                <img src="{{$new_icon->temporaryUrl()}}" style="width: 200px; height: 200px;" />
                                @else
                                <img src="{{ asset('storage')}}/{{$old_icon}}" style="width: 200px; height: 200px;" />
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 2%">
                            <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
                            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>