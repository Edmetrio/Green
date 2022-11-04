<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3"></h3>
                    <ul>
                        <li><a href="">Início</a></li>
                        <li>Tipo</li>
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
                            <h2>Adicionar Tipo</h2>
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
                                <strong>Nome:</strong>
                                <input type="text" name="nome" class="form-control" placeholder="Nome" wire:model="nome">
                                @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
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
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descrição:</label>
                                <textarea class="form-control" wire:model="descricao" id="exampleFormControlTextarea1" rows="6"></textarea>
                                @error('descricao')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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