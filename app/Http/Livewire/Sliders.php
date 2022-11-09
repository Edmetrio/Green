<?php

namespace App\Http\Livewire;

use App\Models\Model\Slider;
use App\Models\Models\Categoria;
use App\Models\Models\Slider as ModelsSlider;
use App\Models\Models\Tipo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Sliders extends Component
{
    public $nome, $icon, $descricao, $new_icon, $old_icon, $slider_id;
    public $updateMode = false;
    use WithFileUploads;

    public function render()
    {
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $this->slider = ModelsSlider::orderBy('created_at', 'desc')->get();
        return view('livewire.sliders')->layout('layouts.app', compact('categoria','tipo'));
    }

    private function resetInputFields(){
        $this->nome= '';
        $this->descricao = '';
        $this->icon = '';
        $this->slider_id = '';
        $this->old_icon = '';
        $this->new_icon = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $validatedDate;
        if ($this->icon) {
            $input['icon'] = $this->icon->store('files', 'public');
        } else {
            $input['icon'] = '';
        }
     
        ModelsSlider::create($input);
  
        session()->flash('message', 'Slider criado com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = ModelsSlider::findOrFail($id);
        $this->slider_id = $id;
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
        $tipo = ModelsSlider::findOrFail($this->slider_id);
        $validatedDate = $this->validate([
            'nome' => 'required',
            'descricao' => 'required',
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

        $post = ModelsSlider::find($this->slider_id);
        $post->update($input);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Slider actualizado.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $tipo = ModelsSlider::findOrFail($id);
        $destination = public_path("storage\\". $tipo->icon);
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        ModelsSlider::find($id)->delete();
        session()->flash('message', 'Slider deletado com sucesso.');
    }
}
