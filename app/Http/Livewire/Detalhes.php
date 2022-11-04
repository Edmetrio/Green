<?php

namespace App\Http\Livewire;

use App\Models\Models\Categoria;
use App\Models\Models\Propriedade;
use App\Models\Models\Tipo;
use Livewire\Component;

class Detalhes extends Component
{
    public $IdPro;

    public function mount($id)
    {
        $this->propriedade = Propriedade::with('categorias','tipos','areas','distritos.provincias','estados','agentes','textos')->findOrFail($id);
        $this->propriedades = Propriedade::with('categorias','tipos','areas','distritos.provincias','estados','agentes')
                                        ->where('tipo_id', $this->propriedade->tipo_id)
                                        ->whereNotIn('id', [$this->propriedade->id])
                                        ->get();
        /* dd($this->propriedade);   */                              
    }


    public function render()
    {
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        return view('livewire.detalhes')->layout('layouts.ap', compact('categoria','tipo'));
    }
}
