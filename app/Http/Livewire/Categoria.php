<?php

namespace App\Http\Livewire;

use App\Models\Models\Categoria as ModelsCategoria;
use App\Models\Models\Propriedade;
use App\Models\Models\Tipo;
use Livewire\Component;

class Categoria extends Component
{
    public $Mode = false;
    public $selectedTipo = NULL;
    public $IdCategoria;

    public function mount($id)
    {
        $this->IdCategoria = $id;
    }

    public function render()
    {
        $this->propriedade = Propriedade::with('categorias','tipos','areas','distritos.provincias','estados','agentes','textos')
                                        ->where('categoria_id', $this->IdCategoria)->get();
        $this->tipos = Tipo::orderBy('created_at', 'desc')->get();
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = ModelsCategoria::orderBy('created_at', 'desc')->get();
        return view('livewire.categoria')->layout('layouts.app', compact('categoria','tipo'));
    }

    public function updatedSelectedTipo($tipo_id)
    {
        if (!is_null($tipo_id)) {
            $this->Mode = true;
            $this->propriedades = Propriedade::with('categorias','tipos','areas','distritos','estados','agentes')
                                                ->where('categoria_id', $this->IdCategoria)
                                                ->where('tipo_id', $tipo_id)
                                                ->get();
        }
    }
}
