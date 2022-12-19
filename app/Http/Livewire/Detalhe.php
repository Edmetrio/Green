<?php

namespace App\Http\Livewire;

use App\Models\Models\Agente;
use App\Models\Models\Categoria;
use App\Models\Models\Descricao;
use App\Models\Models\Detalhe as ModelsDetalhe;
use App\Models\Models\Propriedade;
use App\Models\Models\Provincia;
use App\Models\Models\role;
use App\Models\Models\Tipo;
use App\Models\Models\Tipoitem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detalhe extends Component
{
    public $nome, $estado, $propriedade_id, $descricao_id, $detalhe_id;
    public $updateMode = false;
    public $nomep;

    public $tipos, $propriedades;
    public $selectedTipos = NULL;

    public function render()
    {
        $tipo = Tipoitem::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $this->descricao = Descricao::with('propriedades')->orderBy('created_at', 'asc')->get();
        $this->propriedadees = Agente::with('propriedades.descricaos','users.roles')->where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        /* dd($this->propriedadees->propriedades); */
        $this->propriedades = Agente::with('propriedades.descricaos','users.roles')->orderBy('created_at', 'desc')->get();
        /* dd($this->propriedades); */

        $this->propriedade = Propriedade::orderBy('created_at', 'desc')->get();
        $role = role::where('nome', 'Dev')->first();

        $this->users = Propriedade::with('detalhes.descricaos')->where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $this->devs = Propriedade::with('detalhes.descricaos')->orderBy('created_at', 'desc')->get();
        return view('livewire.detalhe', compact('tipo'))->layout('layouts.appDash', compact('categoria','tipo','role'));
    }

    private function resetInputFields(){
        $this->nome = '';
        $this->propriedade_id = '';
        $this->descricao_id = '';
        $this->nomep = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'propriedade_id' => 'required',
            'descricao_id' => 'required',
            'nome' => 'required'
        ]);
     
        ModelsDetalhe::create($validatedDate);
  
        session()->flash('message', 'Detalhe criado com sucesso.');
  
        $this->resetInputFields();
    }

    public function storeP()
    {
        $validatedDate = $this->validate([
            'nomep' => 'required'
        ]);
     
        $input['nome'] = $this->nomep;
        Descricao::create($input);
  
        session()->flash('message', 'Descricao criado com sucesso.');
  
        $this->resetInputFields();
        $this->emit('provinciaAdd');
    }

    public function edit($id)
    {
        $post = ModelsDetalhe::findOrFail($id);
        $this->detalhe_id = $post->id;
        $this->propriedade_id = $post->propriedade_id;
        $this->descricao_id = $post->descricao_id;
        $this->nome = $post->nome;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'propriedade_id' => 'required',
            'descricao_id' => 'required',
            'nome' => 'required'
        ]);
        ModelsDetalhe::findOrFail($this->detalhe_id)->update($validatedDate);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Detalhe actualizado.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        ModelsDetalhe::findOrFail($id)->delete();
        session()->flash('message', 'Detalhe deletada com sucesso.');
    }

    public function updatedSelectedTipos($tipo_id)
    {
        if (!is_null($tipo_id)) {
            $this->propriedad = Propriedade::where('tipoitem_id', $tipo_id)->get();
        }
    }
}
