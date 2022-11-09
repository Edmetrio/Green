<?php

namespace App\Http\Livewire;

use App\Models\Models\Categoria;
use App\Models\Models\Propriedade;
use App\Models\Models\Tipo;
use Livewire\Component;

class Items extends Component
{
    public $selectedTipo = NULL;
    public $Mode = false;
    public $Idtipo;

    public function mount($id)
    {
        $this->Idtipo = $id;
        $this->propriedade = Propriedade::with('categorias','tipos','areas','distritos','estados')->where('tipo_id', $this->Idtipo)->get();
    }

    public function render()
    {
        $this->categoria = Categoria::orderBy('created_at', 'desc')->get();
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        return view('livewire.items')->layout('layouts.app', compact('categoria','tipo'));
    }
    
    public function updatedSelectedTipo($categoria_id)
    {
        if (!is_null($categoria_id)) {
            $this->Mode = true;
            $this->propriedades = Propriedade::with('categorias','tipos','areas','distritos','estados','agentes')
                                                ->where('categoria_id', $categoria_id)
                                                ->where('tipo_id', $this->Idtipo)
                                                ->get();
           /*  dd($this->propriedades); */
        }
    }
}
