<?php

namespace App\Http\Livewire;

use App\Models\Models\Categoria;
use App\Models\Models\role;
use App\Models\Models\rota as ModelsRota;
use App\Models\Models\Tipo;
use Livewire\Component;
use Livewire\WithPagination;

class Rota extends Component
{
    public $nome, $rota_id;
    public $updateMode = false;
    use WithPagination;

    public function mount()
    {
        $this->categoria = Categoria::orderBy('created_at', 'desc')->get();
        $this->tipo = Tipo::orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        $rota = ModelsRota::orderBy('created_at', 'desc')->paginate(2);
        $role = role::where('nome', 'Dev')->first();
        return view('livewire.rota', compact('rota'))->layout('layouts.appDash', compact('role'));
    }

    private function resetInputFields(){
        $this->nome = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
        ]);
     
        ModelsRota::create($validatedDate);
  
        session()->flash('message', 'Rota criado com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = ModelsRota::findOrFail($id);
        $this->rota_id = $post->id;
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
        
        ModelsRota::find($this->rota_id)->update($validatedDate);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Rota actualizado.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        ModelsRota::findOrFail($id)->delete();
        $this->resetInputFields();
        session()->flash('message', 'Rota deletada com sucesso.');
    }
}
