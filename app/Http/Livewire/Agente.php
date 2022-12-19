<?php

namespace App\Http\Livewire;

use App\Models\Models\Agente as ModelsAgente;
use App\Models\Models\Cargo;
use App\Models\Models\Categoria;
use App\Models\Models\Tipo;
use Livewire\Component;

class Agente extends Component
{
    public $search = '';

    public function render()
    {
        $this->tipo = Tipo::orderBy('created_at', 'desc')->get();
        $this->agente = ModelsAgente::with('propriedades','distritos','cargos')->where('nome' , 'like', '%' . $this->search . '%')->orderBy('created_at','desc')->get();
        $this->agentes = Cargo::with('agentes')->orderBy('created_at', 'desc')->get();
        /* dd($this->agentes); */
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        return view('livewire.agente')->layout('layouts.app', compact('categoria','tipo'));
    }
}
