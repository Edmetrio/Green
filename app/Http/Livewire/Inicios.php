<?php

namespace App\Http\Livewire;

use App\Models\Models\Area;
use App\Models\Models\Categoria;
use App\Models\Models\Distrito;
use App\Models\Models\Noticia;
use App\Models\Models\Propriedade;
use App\Models\Models\Provincia;
use App\Models\Models\Slider;
use App\Models\Models\Tipo;
use App\Models\Models\Tipoitem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PHPUnit\Framework\Error\Notice;

class Inicios extends Component
{
    public $provincias, $distritos, $propriedades;
    public $categoria_id, $tipo_id, $provincia_id, $distrito_id;
    public $selectedProvincia= NULL;
    public $Mode = false; 
    public $ModeGlobal = false, $ModeCategorias = false, $ModeTipos = false, $ModeDistritos = false;

    public $selectedTipo = NULL, $selectedCategorias = NULL, $selectedTipos = NULL, $selectedDistritos = NULL;
    public $tipos;

    public function mount()
    {
        $this->distritos = collect();
    }

    public function render()
    {
        $users = User::with('agentes')->where(function ($query){
            if(auth()->check()){
                $query->where('id', Auth::user()->id);
            }
        })->get();
        /* dd($users->agentes); */
        $propriedade = Propriedade::with('categorias','tipoitems.tipos','areas','distritos','estados','moedas')->orderBy('created_at', 'desc')->paginate(5);
        /* dd($propriedade); */
        $tipoitem = Tipoitem::orderBy('created_at', 'asc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $this->provincias = Provincia::orderBy('created_at', 'desc')->get();
        $this->distrito = Distrito::orderBy('created_at', 'desc')->get();
        $this->noticia = Noticia::with('destaques')->orderBy('created_at', 'desc')->get();
        $tipo = Tipo::with('tipoitems')->orderBy('created_at', 'desc')->get();
        $slider = Slider::orderBy('created_at', 'desc')->get();
        /* dd($this->slider); */
        return view('livewire.inicios', compact('propriedade', 'categoria','tipoitem','tipo'))->layout('layouts.ap', compact('categoria','tipoitem','slider','users','tipo'));
    } 

    public function edit($id)
    {
        $this->propriedades = Tipoitem::with('propriedades.tipoitems','propriedades.categorias','propriedades.distritos','propriedades.estados')->where('tipo_id', $id)->get();
        $this->Mode = true;
        /* $this->propriedades = Propriedade::with('categorias','tipoitems','areas','distritos','estados')->where('tipoitem_id', $tipoitem->id)->get(); */
        /* dd($this->propriedades); */
        
    }

    public function updatedSelectedTipo($tipo_id)
    {
        if (!is_null($tipo_id)) {
            /* $this->Mode = true; */
            $this->propriedades = Propriedade::with('categorias','tipos','areas','distritos','estados','agentes')->where('tipo_id', $tipo_id)->get();
            /* dd($this->propriedades); */
        }
    }
    
    public function updatedSelectedProvincia($provincia_id)
    {
        if (!is_null($provincia_id)) {
            $this->distritos = Distrito::where('provincia_id', $provincia_id)->get();
        }
    }

    public function busca()
    {
        $validatedDate = $this->validate([
            'categoria_id' => 'required',
            'tipo_id' => 'required',
            'distrito_id' => 'required',
        ]);
        
        $propriedade = Propriedade::where('categoria_id', $this->categoria_id)
                                    ->where('tipo_id', $this->tipo_id)
                                    ->where('distrito_id', $this->distrito_id)
                                    ->get();
        return view('livewire.busca');


        /* Agente::create($input);
  
        session()->flash('message', 'Agente criado com sucesso.');
  
        $this->resetInputFields(); */
    }

    public function updatedSelectedCategorias($categoria_id)
    {
        if(!is_null($categoria_id))
        {
            $this->ModeGlobal = true;
            $this->IdCategoria = $categoria_id;
            $this->categorias = Propriedade::with('categorias','tipoitems','areas','distritos','estados','agentes')->where('categoria_id', $categoria_id)->get();
            $this->ModeCategorias = true;
        }
    }

    public function updatedSelectedTipos($tipo_id)
    {
        if(!is_null($tipo_id))
        {
            $this->ModeGlobal = true;
            $this->IdTipo = $tipo_id;
            $this->tipos = Propriedade::with('categorias','tipoitems','areas','distritos','estados','agentes')
                                        ->where('categoria_id', $this->IdCategoria)
                                        ->where('tipoitem_id', $tipo_id)
                                        ->get();
            $this->ModeCategorias = false;
            $this->ModeTipos = true;
        }
    }

    public function updatedSelectedDistritos($distrito_id)
    {
        if(!is_null($distrito_id))
        {
            $this->ModeGlobal = true;
            $this->dt = Propriedade::with('categorias','tipoitems','areas','distritos','estados','agentes')
                                        ->where('categoria_id', $this->IdCategoria)
                                        ->where('tipoitem_id', $this->IdTipo)
                                        ->where('distrito_id', $distrito_id)
                                        ->get();
            $this->ModeGlobal = true;
            $this->ModeCategorias = false;
            $this->ModeTipos = false;
            $this->ModeDistritos = true;
        }
    }

}
