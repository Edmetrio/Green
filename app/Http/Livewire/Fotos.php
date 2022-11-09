<?php

namespace App\Http\Livewire;

use App\Models\Models\Categoria;
use App\Models\Models\Foto;
use App\Models\Models\Propriedade;
use App\Models\Models\Tipo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Fotos extends Component
{
    public $updateMode = false;
    public $propriedade_id, $icon, $foto_id, $old_icon, $new_icon;
    use WithFileUploads;
    

    public function render()
    {
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $this->foto = Foto::orderBy('created_at', 'desc')->get();
        $this->propriedade = Propriedade::with('fotos')->orderBy('created_at', 'desc')->get();
        /* dd($this->propriedade); */
        return view('livewire.fotos')->layout('layouts.app', compact('categoria','tipo'));
    }

    private function resetInputFields(){
        $this->propriedade_id = '';
        $this->icon = '';
        $this->old_icon = '';
        $this->new_icon = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'propriedade_id' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $validatedDate;
        if ($this->icon) {
            $input['icon'] = $this->icon->store('files', 'public');
        } else {
            $input['icon'] = '';
        }
     

        Foto::create($input);
  
        session()->flash('message', 'Foto criado com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Foto::findOrFail($id);
        $this->foto_id = $id;
        $this->propriedade_id = $post->propriedade_id;
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
        $tipo = Foto::findOrFail($this->foto_id);
        $validatedDate = $this->validate([
            'propriedade_id' => 'required',
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
        
        $post = Foto::find($this->foto_id);
        $post->update($input);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Foto actualizada.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $tipo = Foto::findOrFail($id);
        $destination = public_path("storage\\". $tipo->icon);
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        Foto::find($id)->delete();
        session()->flash('message', 'Foto deletado com sucesso.');
    }
}
