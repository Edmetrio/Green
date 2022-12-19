<?php

namespace App\Http\Livewire;

use App\Models\Models\role;
use App\Models\Models\Tipo;
use App\Models\Models\Tipoitem as ModelsTipoitem;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Tipoitem extends Component
{
    public $updateMode = false;
    public $tipo_id, $icon, $nome, $descricao, $tipoitem_id, $old_icon, $new_icon;
    use WithFileUploads;

    public function mount()
    {
        $this->tipo = Tipo::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $this->tipoitem = ModelsTipoitem::orderBy('created_at', 'desc')->get();
        $role = role::where('nome', 'Dev')->first();
        $this->tipoitem = ModelsTipoitem::with('tipos')->orderBy('created_at', 'desc')->get();
        /* dd($this->tipoitem); */
        return view('livewire.tipoitem')->layout('layouts.appDash', compact('role'));
    }

    private function resetInputFields(){
        $this->tipo_id = '';
        $this->icon = '';
        $this->nome = '';
        $this->descricao = '';
        $this->tipoitem_id = '';
        $this->old_icon = '';
        $this->new_icon = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'tipo_id' => 'required',
            'nome' => 'required',
            'descricao' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $validatedDate;
        /* $input['tipo_id'] = $this->tipo->id; */
        if ($this->icon) {
            $input['icon'] = $this->icon->store('files', 'public');
        } else {
            $input['icon'] = '';
        }
     

        ModelsTipoitem::create($input);
  
        session()->flash('message', 'Tipo de item criado com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = ModelsTipoitem::findOrFail($id);
        $this->tipoitem_id = $id;
        $this->tipo_id = $post->tipo_id;
        $this->old_icon = $post->icon;
        $this->nome = $post->nome;
        $this->descricao = $post->descricao;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $tipo = ModelsTipoitem::findOrFail($this->tipoitem_id);
        $validatedDate = $this->validate([
            'tipo_id' => 'required',
            'nome' => 'required',
            'descricao' => 'required',
        ]);
        
        $input = $validatedDate;
        /* $input['tipo_id'] = $this->tipo->id; */
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
        
        $post = ModelsTipoitem::find($this->tipoitem_id);
        $post->update($input);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Tipo de item actualizado.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $tipo = ModelsTipoitem::findOrFail($id);
        $destination = public_path("storage\\". $tipo->icon);
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        ModelsTipoitem::find($id)->delete();
        session()->flash('message', 'Tipo de item deletado com sucesso.');
    }

}
