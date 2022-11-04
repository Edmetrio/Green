<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- FORM FILTER -->
                    <div class="products__filter mb-30">
                        <div class="products__filter__group">
                            <div class="products__filter__header">
                                <h5 class="text-center text-capitalize">Filtro de Propriedade</h5>
                            </div>
                            <div class="products__filter__body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <select wire:model="selectedState" class="form-control" name="distrito_id">
                                            <option>Seleccione a Categoria</option>
                                            @foreach($states as $r)
                                            <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if (!is_null($selectedState))
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <select wire:model="selectedTipo" class="form-control" name="distrito_id">
                                            <option>Seleccione o Tipo</option>
                                            @foreach($tipo as $r)
                                            <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if (!is_null($selectedTipo))
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <select wire:model="selectedProvincia" class="form-control" name="distrito_id">
                                            <option>Seleccione a Província</option>
                                            @foreach($provincias as $r)
                                            <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <select wire:model="" class="form-control" name="distrito_id">
                                            <option>Seleccione a Área</option>
                                            @foreach($area as $r)
                                            <option value="{{ $r->id }}">{{ $r->tamanho }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif

                                @if (!is_null($selectedProvincia))
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <select wire:model="selectedDistrito" class="form-control" name="distrito_id">
                                            <option>Seleccione o Distrito</option>
                                            @foreach($distritos as $r)
                                            <option value="{{ $r->id }}">{{ $r->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                
                                @if (!is_null($selectedDistrito))
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <select wire:model="selectedPreco" class="form-control" name="distrito_id">
                                            <option>Seleccione o Preço</option>
                                            @foreach($propriedade as $r)
                                            <option value="{{ $r->id }}">{{ $r->preco }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                @endif

                                <div class="form-group mb-0 mt-2">
                                    <a class="btn btn-outline-primary btn-block text-capitalize advanced-filter"
                                        data-toggle="collapse" href="#multiCollapseExample1"
                                        aria-controls="multiCollapseExample1"><i class="fa fa-plus-circle"></i> advanced
                                        filter
                                    </a>

                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="advancedfilter">
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2" class="label-brand text-capitalize">
                                                    Air Conditioning
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox3" type="checkbox">
                                                <label for="checkbox3" class="label-brand text-capitalize">
                                                    Swiming Pool
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox4" type="checkbox">
                                                <label for="checkbox4" class="label-brand text-capitalize">
                                                    Central Heating
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox5" type="checkbox">
                                                <label for="checkbox5" class="label-brand text-capitalize">
                                                    Spa & Massage
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox6" type="checkbox">
                                                <label for="checkbox6" class="label-brand text-capitalize">
                                                    Pets Allow
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox7" type="checkbox">
                                                <label for="checkbox7" class="label-brand text-capitalize">
                                                    Air Conditioning
                                                </label>

                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox8" type="checkbox">
                                                <label for="checkbox8" class="label-brand text-capitalize">
                                                    Gym
                                                </label>

                                            </div>

                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox9" type="checkbox">
                                                <label for="checkbox9" class="label-brand text-capitalize">
                                                    Alarm
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox10" type="checkbox">
                                                <label for="checkbox10" class="label-brand text-capitalize">
                                                    Window Covering
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox11" type="checkbox">
                                                <label for="checkbox11" class="label-brand text-capitalize">
                                                    Free WiFi
                                                </label>

                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox12" type="checkbox">
                                                <label for="checkbox12" class="label-brand text-capitalize">
                                                    Car Parking
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products__filter__footer">
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary text-capitalize btn-block"><i
                                            class="fa fa-search ml-1"></i> search
                                        property </button>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END FORM FILTER -->
                    <!-- ARCHIVE CATEGORY -->
                    <div class=" wrapper__list__category">
                        <!-- CATEGORY -->
                        <div class="widget widget__archive">
                            <div class="widget__title">
                                <h5 class="text-dark mb-0 text-center">Categories Property</h5>
                            </div>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" class="text-capitalize">
                                        apartement
                                        <span class="badge badge-primary">14</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-capitalize">
                                        villa
                                        <span class="badge badge-primary">4</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-capitalize">
                                        family house
                                        <span class="badge badge-primary">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-capitalize">
                                        modern villa
                                        <span class="badge badge-primary">8</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-capitalize">
                                        town house
                                        <span class="badge badge-primary">10</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-capitalize">
                                        office
                                        <span class="badge badge-primary">12</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END CATEGORY -->
                    </div>
                    <!-- End ARCHIVE CATEGORY -->
                    <div class="download mb-0">
                        <h5 class="text-center text-capitalize">Property Attachments</h5>
                        <div class="download__item">
                            <a href="#" target="_blank"><i class="fa fa-file-pdf-o mr-3" aria-hidden="true"></i>Download
                                Document.Pdf</a>
                        </div>
                        <div class="download__item">
                            <a href="#" target="_blank"><i class="fa fa-file-word-o mr-3"
                                    aria-hidden="true"></i>Presentation
                                2016-17.Doc</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs__custom-v2 ">
                                <!-- FILTER VERTICAL -->
                                <ul class="nav nav-pills myTab" role="tablist">
                                    <li class="list-inline-item mr-auto">
                                        <span class="title-text">Sort by</span>
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Based Properties
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0)">Low to High Price</a>
                                                <a class="dropdown-item" href="javascript:void(0)">High to Low Price
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0)">Sell Properties</a>

                                                <a class="dropdown-item" href="javascript:void(0)">Rent Properties</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#pills-tab-one" role="tab"
                                            aria-controls="pills-tab-one" aria-selected="true">
                                            <span class="fa fa-th-list"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#pills-tab-two" role="tab"
                                            aria-controls="pills-tab-two" aria-selected="false">
                                            <span class="fa fa-th-large"></span></a>
                                    </li>
                                </ul>



                                
                                    <div class="tab-pane fade show active" id="pills-tab-two" role="tabpanel"
                                        aria-labelledby="pills-tab-two">
                                        <div class="row">
                                            @if($ModeCategoria === true)
                                            @foreach($cities as $p)
                                                @include('livewire.index')
                                            @endforeach
                                            @elseif($ModeIndex === true)
                                            @foreach($propriedade as $p)
                                                @include('livewire.index')
                                            @endforeach
                                            @elseif($ModeTipo === true)
                                            @foreach($tipos as $p)
                                                @include('livewire.index')
                                            @endforeach
                                            @elseif($ModeDistrito === true)
                                            @foreach($d as $p)
                                                @include('livewire.index')
                                            @endforeach
                                            @elseif($ModePreco === true)
                                            @foreach($precos as $p)
                                                @include('livewire.index')
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="cleafix"></div>
                                    </div>



                                </div>
                                <!-- END FILTER VERTICAL -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
