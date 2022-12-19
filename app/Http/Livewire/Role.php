<?php

namespace App\Http\Livewire;

use App\Models\Models\Area;
use App\Models\Models\Categoria;
use App\Models\Models\role as ModelsRole;
use App\Models\Models\Tipo;
use Livewire\Component;

class Role extends Component
{
    public $nome, $role_id;
    public $updateMode = false;

    public function mount()
    {
        $this->categoria = Categoria::orderBy('created_at', 'desc')->get();
        $this->tipo = Tipo::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $this->role = ModelsRole::orderBy('created_at', 'desc')->get();
        $role = ModelsRole::where('nome', 'Dev')->first();
        return view ('livewire.role')->layout('layouts.appDash', compact('role'));
    }

    private function resetInputFields(){
        $this->nome = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
        ]);
     
        ModelsRole::create($validatedDate);
  
        session()->flash('message', 'Role criado com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = ModelsRole::findOrFail($id);
        $this->role_id = $post->id;
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
            'nome' => 'required',
        ]);
        
        ModelsRole::find($this->role_id)->update($validatedDate);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Role actualizado.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        ModelsRole::findOrFail($id)->delete();
        $this->resetInputFields();
        session()->flash('message', 'Role deletado com sucesso.');
    }
}
