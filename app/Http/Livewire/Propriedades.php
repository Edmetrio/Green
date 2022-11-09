<?php

namespace App\Http\Livewire;

use App\Models\Models\Agente;
use App\Models\Models\Area;
use App\Models\Models\Categoria;
use App\Models\Models\Distrito;
use App\Models\Models\Estado;
use App\Models\Models\Foto;
use App\Models\Models\Moeda;
use App\Models\Models\Propriedade;
use App\Models\Models\Texto;
use App\Models\Models\Tipo;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Propriedades extends Component
{
    public $updateMode = false;
    use WithFileUploads;
    public $categoria_id, $tipo_id, $area_id, $distrito_id, $estado_id, $nome, $descricao, $icon, $preco, $propriedade_id, $agente_id, $endereco, $texto, $new_icon, $old_icon, $moeda_id;
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function mount()
    {
        $this->categoria = Categoria::orderBy('created_at', 'desc')->get();
        $this->tipo = Tipo::orderBy('created_at', 'desc')->get();
        $this->area = Area::orderBy('created_at', 'desc')->get();
        $this->distrito = Distrito::orderBy('created_at', 'desc')->get();
        $this->estado = Estado::orderBy('created_at', 'desc')->get();
        $this->agente = Agente::orderBy('created_at', 'desc')->get();
        $this->moeda = Moeda::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $propriedade = Propriedade::with('estados')->orderBy('created_at', 'desc')->get();
        return view('livewire.propriedades', compact('propriedade'))->layout('layouts.app', compact('categoria','tipo'));
    }

    private function resetInputFields(){
        $this->categoria_id = '';
        $this->moeda_id = '';
        $this->tipo_id= '';
        $this->area_id = '';
        $this->distrito_id = '';
        $this->estado_id = '';
        $this->agente_id = '';
        $this->endereco = '';
        $this->nome = '';
        $this->descricao = '';
        $this->icon = '';
        $this->preco = '';
        $this->propriedade_id = '';
        $this->texto = '';
        $this->old_icon = '';
        $this->new_icon = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'categoria_id' => 'required',
            'tipo_id' => 'required',
            'agente_id' => 'required',
            'endereco' => 'required',
            'descricao' => 'required',
            'area_id' => 'required',
            'distrito_id' => 'required',
            'estado_id' => 'required',
            'preco' => 'required',
            'moeda_id' => 'required',
            'texto.0' => 'required',
            'texto.*' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
    [
        'texto.0.required' => 'É necessário preencher o texo',
        'texto.*.required' => 'É necessário preencher o texo',
    ]);

    

        $input = $validatedDate;

        if ($this->icon) {
            $input['icon'] = $this->icon->store('files', 'public');
        } else {
            $input['icon'] = '';
        }
     

        $p = Propriedade::create($input);
     
        foreach ($this->texto as $key => $value) {
            Texto::create(['propriedade_id' => $p->id, 'texto' => $this->texto[$key]]);
        }
  
        $this->inputs = [];

        session()->flash('message', 'Propriedade criada com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Propriedade::findOrFail($id);
        $this->propriedade_id = $id;
        $this->nome = $post->nome;
        $this->categoria_id = $post->categoria_id;
        $this->tipo_id = $post->tipo_id;
        $this->agente_id = $post->agente_id;
        $this->endereco = $post->endereco;
        $this->descricao = $post->descricao;
        $this->area_id = $post->area_id;
        $this->distrito_id = $post->distrito_id;
        $this->estado_id = $post->estado_id;
        $this->preco = $post->preco;
        $this->moeda_id = $post->moeda_id;
        $this->old_icon = $post->icon;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $tipo = Propriedade::findOrFail($this->propriedade_id);
        $validatedDate = $this->validate([
            'nome' => 'required',
            'categoria_id' => 'required',
            'tipo_id' => 'required',
            'agente_id' => 'required',
            'endereco' => 'required',
            'descricao' => 'required',
            'area_id' => 'required',
            'distrito_id' => 'required',
            'estado_id' => 'required',
            'preco' => 'required',
            'moeda_id' => 'required'
        ]);
        
        $input = $validatedDate;
        $destination =  public_path('storage\\'. $tipo->icon);
        if (isset($this->new_icon)) {
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $input['icon'] = $this->new_icon->store('files', 'public');
        } else {
            $input['icon'] = $this->old_icon;
        }

        $post = Propriedade::find($this->propriedade_id);
        $post->update($input);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Propriedade actualizada.');
        $this->resetInputFields();
    }

    
    public function delete($id)
    {
        $tipo = Propriedade::findOrFail($id);
        $destination = public_path("storage\\". $tipo->icon);
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        Propriedade::find($id)->delete();
        session()->flash('message', 'Propriedade deletado com sucesso.');
    }

}
