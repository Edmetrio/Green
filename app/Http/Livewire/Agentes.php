<?php

namespace App\Http\Livewire;

use App\Models\Models\Agente;
use App\Models\Models\Distrito;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Agentes extends Component
{
    public $distrito_id, $nome, $endereco, $email, $contacto, $icon, $new_icon, $old_icon, $agente_id;
    public $updateMode = false;
    use WithFileUploads;

    public function mount()
    {
        $this->distritos = Distrito::orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        $this->agente = Agente::with('distritos')->orderBy('created_at', 'desc')->get();
        return view('livewire.agentes');
    }

    private function resetInputFields(){
        $this->distrito_id = '';
        $this->nome= '';
        $this->endereco = '';
        $this->contacto = '';
        $this->old_icon = '';
        $this->new_icon = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'contacto' => 'required',
            'distrito_id' => 'required'
            /* 'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', */
        ]);
        $input = $validatedDate;
        if ($this->icon) {
            $input['icon'] = $this->icon->store('files', 'public');
        } else {
            $input['icon'] = '';
        }
     

        Agente::create($input);
  
        session()->flash('message', 'Agente criado com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Agente::findOrFail($id);
        $this->agente_id = $id;
        $this->distrito_id = $post->distrito_id;
        $this->nome = $post->nome;
        $this->endereco = $post->endereco;
        $this->email = $post->email;
        $this->distrito_id = $post->distrito_id;
        $this->contacto = $post->contacto;
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
        $tipo = Agente::findOrFail($this->agente_id);
        $validatedDate = $this->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'contacto' => 'required',
            'distrito_id' => 'required'
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

        $post = Agente::find($this->agente_id);
        $post->update($input);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Agente actualizado.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $tipo = Agente::findOrFail($id);
        $destination = public_path("storage\\". $tipo->icon);
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        Agente::find($id)->delete();
        session()->flash('message', 'Agente deletado com sucesso.');
    }
}
