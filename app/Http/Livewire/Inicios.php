<?php

namespace App\Http\Livewire;

use App\Models\Models\Area;
use App\Models\Models\Categoria;
use App\Models\Models\Distrito;
use App\Models\Models\Propriedade;
use App\Models\Models\Provincia;
use App\Models\Models\Tipo;
use Livewire\Component;

class Inicios extends Component
{
    public $provincias, $distritos;
    public $selectedProvincia= NULL;
    public $Mode = false;

    public function mount()
    {
        $this->distritos = collect();
    }

    public function render()
    {
        $propriedade = Propriedade::with('categorias','tipos','areas','distritos','estados')->orderBy('created_at', 'desc')->paginate(5);
        /* dd($propriedade); */
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $provincias = Provincia::orderBy('created_at', 'desc')->get();
        $distrito = Distrito::orderBy('created_at', 'desc')->get();
        /* dd($propriedade); */
        return view('livewire.inicios', compact('propriedade','tipo'))->layout('layouts.ap', compact('categoria','tipo','provincias','distrito'));
    } 

    public function edit($id)
    {
        $this->Mode = true;
        $this->propriedades = Propriedade::with('categorias','tipos','areas','distritos','estados')->where('tipo_id', $id)->get();
        
    }

    public function updatedSelectedProvincia($provincia_id)
    {
        if (!is_null($provincia_id)) {
            $this->distritos = Distrito::where('provincia_id', $provincia_id)->get();;
        }
    }
}
