<?php

namespace App\Http\Livewire;

use App\Models\Models\permissao as ModelsPermissao;
use App\Models\Models\role;
use App\Models\Models\rota;
use Livewire\Component;

class Permissao extends Component
{
    public $role_id, $rota_id, $permissao_id;
    public $updateMode = false;

    public function mount()
    {
        $this->rota = rota::orderBy('created_at', 'desc')->get();
        $this->role = role::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $permissao = role::with('rotas')->orderBy('created_at', 'desc')->get();
        $role = role::where('nome', 'Dev')->first();
        return view('livewire.permissao', compact('permissao'))->layout('layouts.appDash', compact('role'));
    }

    private function resetInputFields(){
        $this->role_id = '';
        $this->rota_id = '';
        $this->permissao_id = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'role_id' => 'required',
            'rota_id' => 'required',
        ]);
     
        ModelsPermissao::create($validatedDate);
  
        session()->flash('message', 'Permissão criada com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = ModelsPermissao::findOrFail($id);
        $this->permissao_id = $id;
        $this->role_id = $post->role_id;
        $this->rota_id = $post->rota_id;
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
            'role_id' => 'required',
            'rota_id' => 'required',
        ]);
        
        ModelsPermissao::find($this->permissao_id)->update($validatedDate);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Permissão actualizada.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        ModelsPermissao::findOrFail($id)->delete();
        session()->flash('message', 'Permissão deletada com sucesso.');
    }
}
