<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3"></h3>
                    <ul>
                        <li><a href="">Início</a></li>
                        <li>Noticia</li>
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

                <div class="row">
                    <div class="col-lg-12 margin-tb" style="margin: 2%">
                        <div class="pull-left">
                            <h2>Adicionar Notícia</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('/') }}"> Voltar</a>
                        </div>
                    </div>
                </div>

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
                                    <option>Seleccione a Categoria</option>
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
                                    <option>Seleccione o Tipo</option>
                                    @foreach ($tipo as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Destaque:</strong>
                                <select class="form-control" wire:model="destaque_id">
                                    <option>Seleccione o Destaque</option>
                                    @foreach ($destaque as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nome:</strong>
                                <input type="text" name="nome" class="form-control" placeholder="Nome" wire:model="nome">
                                @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Descrição:</strong>
                                <input type="text" name="nome" class="form-control" placeholder="descricao" wire:model="descricao">
                                @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Imagem:</strong>
                                <input type="file" name="new_icon" class="form-control" placeholder="icon" wire:model="new_icon">
                                @if($new_icon)
                                <img src="{{$new_icon->temporaryUrl()}}" style="width: 200px; height: 200px;" />
                                @else
                                <img src="{{ asset('storage')}}/{{$old_icon}}" style="width: 200px; height: 200px;" />
                                @endif
                                
                                @error('icon') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Texto:</label>
                                <textarea class="form-control" wire:model="texto" id="exampleFormControlTextarea1" rows="6"></textarea>
                                @error('texto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Texto1:</label>
                                <textarea class="form-control" wire:model="texto1" id="exampleFormControlTextarea1" rows="6"></textarea>
                                @error('texto1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Texto2:</label>
                                <textarea class="form-control" wire:model="texto2" id="exampleFormControlTextarea1" rows="6"></textarea>
                                @error('texto2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                            <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
                            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>