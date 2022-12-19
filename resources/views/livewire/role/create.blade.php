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
                                <strong>Nome:</strong>
                                <input type="text" name="nome" class="form-control" placeholder="Nome" wire:model="nome">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 2%">
                            <button wire:click.prevent="store()" class="btn btn-primary">Adicionar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>