<?php

namespace App\Http\Livewire;

use App\Models\Models\Distrito;
use App\Models\Models\Provincia;
use Livewire\Component;

class Distritos extends Component
{
    public $nome, $estado, $provincia_id, $distrito_id;
    public $updateMode = false;

    public function render()
    {
        $this->provincia = Provincia::with('distritos')->orderBy('created_at', 'desc')->get();
       /*  dd($this->provincia); */
        return view('livewire.distritos')->layout('layouts.appDash');
    }

    private function resetInputFields(){
        $this->nome = '';
        $this->provincia_id = '';
        $this->distrito_id = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'provincia_id' => 'required',
        ]);
     
        Distrito::create($validatedDate);
  
        session()->flash('message', 'Distrito criada com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Distrito::findOrFail($id);
        $this->distrito_id = $id;
        $this->provincia_id = $post->provincia_id;
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
            'provincia_id' => 'required',
        ]);
        
        Distrito::find($this->distrito_id)->update($validatedDate);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Distrito actualizado.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Distrito::findOrFail($id)->delete();
        session()->flash('message', 'Distrito deletada com sucesso.');
    }
}
