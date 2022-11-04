<div>
    <section class="wrap__contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h5>Contacta-nos</h5>
                    @if ($message = Session::get('status'))
                        <div>
                            <p class="alert alert-success" class="table p-field p-col-12 p-md-6 table-striped"
                                style="text-align: center;">{{ $message }}</p>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Opss!</strong> Algum problema com seu formulário<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-name">
                                <label>Seu Nome <span class="required"></span></label>
                                <input wire:model="nome" type="text" class="form-control" name="name" required="">
                                <span class="text-danger">
                                    @error('nome')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-name">
                                <label>Seu E-mail <span class="required"></span></label>
                                <input wire:model="email" type="email" class="form-control" name="email" required="">
                                <span class="text-danger">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-name">
                                <label>Objectivo <span class="required"></span></label>
                                <input wire:model="objectivo" type="text" class="form-control" name="subject" required="">
                                <span class="text-danger">
                                    @error('objectivo')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sua Mensagem</label>
                                <textarea wire:model="mensagem" class="form-control" rows="9" name="message"></textarea>
                                <span class="text-danger">
                                    @error('mensagem')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group float-right mb-0">
                                <button wire:click.prevent="store()" type="submit" class="btn btn-primary btn-contact">Enviar</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>


                <div class="col-md-4">
                    <h5>Informação de Localização</h5>
                    <div class="wrap__contact-form-office">
                        <ul class="list-unstyled">
                            <li>
                                <span>
                                    <i class="fa fa-home"></i>
                                </span>
                                Av. Salvador Allende, nº. 42, Maputo - Moçambique
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:866500009">(+258) 86 650 0009</a>
                                </span>

                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:">green@greenmozambique.co.mz</a>
                                </span>

                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-globe"></i>
                                    <a href="#" target="_blank"> www.greenmozambique.com</a>
                                </span>
                            </li>
                        </ul>

                        <div class="social__media">
                            <h5>Encontre-nos</h5>
                            <ul class="list-inline">

                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white telegram">
                                        <i class="fa fa-telegram"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
