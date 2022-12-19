<?php

namespace App\Http\Livewire;

use App\Models\Models\role;
use App\Models\Models\Tipo;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Tipos extends Component
{
    public $nome, $icon, $descricao, $tipo_id, $new_icon, $old_icon;
    public $updateMode = false;
    use WithFileUploads;

    public function render()
    {
        $this->tipo = Tipo::with('tipoitems')->orderBy('created_at', 'desc')->get();
        /* dd($this->tipo); */
        $role = role::where('nome', 'Dev')->first();
        return view('livewire.tipos')->layout('layouts.appDash', compact('role'));
    }

    private function resetInputFields(){
        $this->nome = '';
        $this->icon= '';
        $this->descricao = '';
        $this->tipo_id = '';
        $this->old_icon = '';
        $this->new_icon = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            /* 'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', */
        ]);
        $input = $validatedDate;
        $input['descricao'] = $this->descricao;

        if ($this->icon) {
            $input['icon'] = $this->icon->store('files', 'public');
        } else {
            $input['icon'] = '';
        }
     

        Tipo::create($input);
  
        session()->flash('message', 'Tipo criado com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Tipo::findOrFail($id);
        $this->tipo_id = $id;
        $this->nome = $post->nome;
        $this->descricao = $post->descricao;
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
        $tipo = Tipo::findOrFail($this->tipo_id);
        $validatedDate = $this->validate([
            'nome' => 'required',
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
        
        $input['descricao'] = $this->descricao;

        $post = Tipo::find($this->tipo_id);
        $post->update($input);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Tipo actualizado.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $tipo = Tipo::findOrFail($id);
        $destination = public_path("storage\\". $tipo->icon);
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        Tipo::find($id)->delete();
        session()->flash('message', 'Categoria deletado com sucesso.');
    }

    public function switch($id)
    {
        $desaparecido = Tipo::findOrFail($id);
        $desaparecido->update(['estado' => 'true']);
        
    }
}
