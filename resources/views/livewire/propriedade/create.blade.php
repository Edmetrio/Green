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
                                <select class="form-control" wire:model="selectedTipo">
                                    <option>Seleccione a Tipo</option>
                                    @foreach ($tipo as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if (!is_null($selectedTipo))
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tipo de Item:</strong>
                                <select class="form-control" wire:model="tipoitem_id">
                                    <option>Seleccione o Tipo de Item</option>
                                    @foreach ($tipoitem as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
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
                        @if($user->users->roles->nome === 'Dev')
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
                        @endif
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
                                <input type="file" name="icon" class="form-control" placeholder="icon" wire:model="icon">
                                @if($icon)
                                    <img src="{{$icon->temporaryUrl()}}" style="width: 200px; height: 200px;" />
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Texto:</strong>
                                <textarea class="form-control" style="height:150px" name="descricao" placeholder="Descrição" wire:model="texto.0"></textarea>
                                @error('texto.0') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Adicionar</button>
                        </div>
                        @foreach($inputs as $key => $value)
                        <div class="col-xs-10 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Texto:</strong>
                                <textarea class="form-control" style="height:150px" name="descricao" placeholder="Descrição" wire:model="texto.{{ $value }}"></textarea>
                                @error('texto.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Deletar</button>
                        </div>
                        @endforeach
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 2%">
                            <button wire:click.prevent="store()" class="btn btn-primary">Adicionar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>