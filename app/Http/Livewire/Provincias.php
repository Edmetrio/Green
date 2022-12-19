<?php

namespace App\Http\Livewire;

use App\Models\Models\Provincia;
use Livewire\Component;

class Provincias extends Component
{
    public $nome, $estado, $provincia_id;
    public $updateMode = false;

    public function render()
    {
        $this->provincia = Provincia::orderBy('created_at', 'desc')->get();
        return view('livewire.provincias')->layout('layouts.appDash');
    }

    private function resetInputFields(){
        $this->nome = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
        ]);
     
        Provincia::create($validatedDate);
  
        session()->flash('message', 'Província criada com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Provincia::findOrFail($id);
        $this->provincia_id = $id;
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
        
        Provincia::find($this->provincia_id)->update($validatedDate);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Província actualizado.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Provincia::findOrFail($id)->delete();
        session()->flash('message', 'Província deletada com sucesso.');
    }

}
