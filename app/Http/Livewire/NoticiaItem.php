<?php

namespace App\Http\Livewire;

use App\Models\Models\Categoria;
use App\Models\Models\Noticia;
use App\Models\Models\Propriedade;
use App\Models\Models\Tipo;
use Livewire\Component;

class NoticiaItem extends Component
{
    public function mount($id)
    {
        $this->noticia = Noticia::with('categorias','tipos','destaques')->findOrFail($id);
        $this->propriedade = Propriedade::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $this->noticias = Noticia::with('categorias','tipos','destaques')->where('id', [$this->noticia->id])->get();
        /* dd($this->noticias); */
        return view('livewire.noticia-item', compact('tipo'))->layout('layouts.app', compact('categoria','tipo'));
    }
}
