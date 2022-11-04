<?php

namespace App\Http\Livewire;

use App\Models\Models\Area;
use App\Models\Models\Categoria;
use App\Models\Models\Distrito;
use App\Models\Models\Noticia;
use App\Models\Models\Propriedade;
use App\Models\Models\Provincia;
use App\Models\Models\Tipo;
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
        $propriedade = Propriedade::with('categorias','tipos','areas','distritos','estados')->orderBy('created_at', 'desc')->paginate(5);
        /* dd($propriedade); */
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $this->provincias = Provincia::orderBy('created_at', 'desc')->get();
        $this->distrito = Distrito::orderBy('created_at', 'desc')->get();
        $this->noticia = Noticia::with('destaques')->orderBy('created_at', 'desc')->get();
        /* dd($propriedade); */
        return view('livewire.inicios', compact('propriedade', 'categoria','tipo'))->layout('layouts.ap', compact('categoria','tipo'));
    } 

    public function edit($id)
    {
        $this->Mode = true;
        $this->propriedades = Propriedade::with('categorias','tipos','areas','distritos','estados')->where('tipo_id', $id)->get();
        
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
            $this->categorias = Propriedade::with('categorias','tipos','areas','distritos','estados','agentes')->where('categoria_id', $categoria_id)->get();
            $this->ModeCategorias = true;
        }
    }

    public function updatedSelectedTipos($tipo_id)
    {
        if(!is_null($tipo_id))
        {
            $this->ModeGlobal = true;
            $this->IdTipo = $tipo_id;
            $this->tipos = Propriedade::with('categorias','tipos','areas','distritos','estados','agentes')
                                        ->where('categoria_id', $this->IdCategoria)
                                        ->where('tipo_id', $tipo_id)
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
            $this->dt = Propriedade::with('categorias','tipos','areas','distritos','estados','agentes')
                                        ->where('categoria_id', $this->IdCategoria)
                                        ->where('tipo_id', $this->IdTipo)
                                        ->where('distrito_id', $distrito_id)
                                        ->get();
            $this->ModeGlobal = true;
            $this->ModeCategorias = false;
            $this->ModeTipos = false;
            $this->ModeDistritos = true;
        }
    }

}
