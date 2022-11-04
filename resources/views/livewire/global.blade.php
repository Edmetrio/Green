<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs__custom-v2 ">
                            <div class="container">
                                <div class="row">
                                    @foreach ($propriedade as $p)
                                        @include('livewire.inicio.filtro')
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
