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
                                <strong>Distrito:</strong>
                                <select class="form-control" wire:model="distrito_id">
                                    <option>Seleccione o Distrito</option>
                                    @foreach ($distritos as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-10">
                            <div class="form-group">
                                <strong>Cargo:</strong>
                                <select class="form-control" wire:model="cargo_id">
                                    <option>Seleccione o Cargo</option>
                                    @foreach ($cargo as $r)
                                        <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 mt-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAgenteModal">
                                Adição
                            </button>
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
                                <strong>Endereço:</strong>
                                <input type="text" name="nome" class="form-control" placeholder="Endereço" wire:model="endereco">
                                @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>E-mail:</strong>
                                <input type="email" name="nome" class="form-control" placeholder="E-mail" wire:model="email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Palavra-passe:</strong>
                                <input type="password" name="password" class="form-control" placeholder="Palavra-passe" wire:model="password">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Contacto:</strong>
                                <input type="text" name="nome" class="form-control" placeholder="Contacto" wire:model="contacto">
                                @error('contacto') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Imagem:</strong>
                                <input type="file" name="icon" class="form-control" placeholder="icon" wire:model="icon">
                                @if($icon)
                                    <img src="{{$icon->temporaryUrl()}}" style="width: 200px; height: 200px;" />
                                @endif
                                @error('icon') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                            <button wire:click.prevent="store()" class="btn btn-primary">Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>