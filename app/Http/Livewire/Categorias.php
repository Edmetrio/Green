<?php

namespace App\Http\Livewire;

use App\Models\Models\Area;
use App\Models\Models\Categoria;
use App\Models\Models\Distrito;
use App\Models\Models\Propriedade;
use App\Models\Models\Provincia;
use App\Models\Models\Tipo;
use Livewire\Component;

class Categorias extends Component
{
    public $states, $categoriaB, $tipoB, $distritoB;
    public $cities;
    public $tipos;
    public $provincias, $distritos;
    public $ModeCategoria = false, $ModeIndex = true, $ModeTipo = true, $ModeDistrito = true, $ModePreco = true;
  
    public $selectedState = NULL;
    public $selectedTipo = NULL;
    public $selectedProvincia = NULL;
    public $selectedDistrito = NULL;
    public $selectedPreco = NULL;


    public function mount()
    {
        $this->states = Categoria::orderBy('created_at', 'desc')->get();
        $this->provincias = Provincia::orderBy('created_at', 'desc')->get();
        $this->distritos = Distrito::orderBy('created_at', 'desc')->get();
        $this->cities = collect();
    }

    public function render()
    {
        $propriedade = Propriedade::with('categorias','tipos','areas','distritos','estados','agentes')->orderBy('created_at', 'desc')->paginate(5);
        $this->tipo = Tipo::orderBy('created_at', 'desc')->get();
        $this->area = Area::orderBy('created_at', 'desc')->get();
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        return view('livewire.categorias', compact('propriedade'))->layout('layouts.app', compact('categoria','tipo'));
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->categoriaB = $state;
            $this->cities = Propriedade::where('categoria_id', $state)->get();
            $this->ModeCategoria = true;
            $this->ModeIndex = false;
        }
    }

    public function updatedSelectedTipo($tipo_id)
    {
        if(!is_null($tipo_id))
        {
            $this->tipoB = $tipo_id;
            $this->tipos = Propriedade::where('tipo_id', $tipo_id)->where('categoria_id', $this->categoriaB)->get();
            $this->ModeTipo = true;
            $this->ModeCategoria = false;
            $this->ModeIndex = false;
        }
    }

    public function updatedSelectedProvincia($provincia_id)
    {
        if(!is_null($provincia_id))
        {
            $this->distritos = Distrito::where('provincia_id', $provincia_id)->get();
        } 
    }

    public function updatedSelectedDistrito($distrito_id)
    {
        if(!is_null($distrito_id))
        {
            $this->distritoB = $distrito_id;
            $this->d = Propriedade::where('tipo_id', $this->tipoB)
                                    ->where('categoria_id', $this->categoriaB)
                                    ->where('distrito_id', $distrito_id)
                                    ->get();
            $this->ModeDistrito = true;
            $this->ModeTipo = false;
            $this->ModeCategoria = false;
            $this->ModeIndex = false;
        } 
    }

    public function updatedSelectedPreco($propriedade_id)
    {
        if(!is_null($propriedade_id))
        {
            $preco = Propriedade::findOrFail($propriedade_id);
            $this->precos = Propriedade::where('tipo_id', $this->tipoB)
                                    ->where('categoria_id', $this->categoriaB)
                                    ->where('distrito_id', $this->distritoB)
                                    ->where('preco', $preco->preco)
                                    ->get();
            $this->ModePreco = true;
            $this->ModeDistrito = false;
            $this->ModeTipo = false;
            $this->ModeCategoria = false;
            $this->ModeIndex = false;
        } 
    }
}
