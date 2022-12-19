<?php

namespace App\Http\Livewire;

use App\Models\Models\Categoria;
use App\Models\Models\Destaque;
use App\Models\Models\Noticia;
use App\Models\Models\Tipo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Noticias extends Component
{
    public $categoria_id, $tipo_id, $destaque_id, $nome, $descricao, $icon, $texto, $texto1, $texto2, $estado, $noticia_id, $new_icon, $old_icon;
    public $updateMode = false;
    use WithFileUploads;

    public function mount()
    {
        $this->categoria = Categoria::orderBy('created_at', 'desc')->get();
        $this->tipo = Tipo::orderBy('created_at', 'desc')->get();
        $this->destaque = Destaque::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        $this->noticia = Noticia::with('categorias','tipos','destaques')->orderBy('created_at', 'desc')->get();
        return view('livewire.noticias')->layout('layouts.appDash');
    }

    private function resetInputFields(){
        $this->categoria_id = '';
        $this->tipo_id= '';
        $this->destaque_id = '';
        $this->nome = '';
        $this->descricao = '';
        $this->texto = '';
        $this->texto1 = '';
        $this->texto2 = '';
        $this->old_icon = '';
        $this->new_icon = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'categoria_id' => 'required',
            'tipo_id' => 'required',
            'destaque_id' => 'required',
            'nome' => 'required',
            'descricao' => 'required',
            'texto' => 'required',
            'texto2' => 'required',
            'texto1' => 'required',
            /* 'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', */
        ]);

        $input = $validatedDate;
        if ($this->icon) {
            $input['icon'] = $this->icon->store('files', 'public');
        } else {
            $input['icon'] = '';
        }
     

        Noticia::create($input);
  
        session()->flash('message', 'Notícia criado com sucesso.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Noticia::findOrFail($id);
        $this->noticia_id = $id;
        $this->categoria_id = $post->categoria_id;
        $this->tipo_id = $post->tipo_id;
        $this->destaque_id = $post->destaque_id;
        $this->nome = $post->nome;
        $this->descricao = $post->descricao;
        $this->texto = $post->texto;
        $this->texto1 = $post->texto1;
        $this->texto2 = $post->texto2;
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
        $tipo = Noticia::findOrFail($this->noticia_id);
        $validatedDate = $this->validate([
            'categoria_id' => 'required',
            'tipo_id' => 'required',
            'destaque_id' => 'required',
            'nome' => 'required',
            'descricao' => 'required',
            'texto' => 'required',
        ]);
        
        $input = $validatedDate;
        $input['texto1'] = $this->texto1;
        $input['texto2'] = $this->texto2;
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

        $post = Noticia::find($this->noticia_id);
        $post->update($input);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Notícia actualizada.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $tipo = Noticia::findOrFail($id);
        $destination = public_path("storage\\". $tipo->icon);
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        Noticia::find($id)->delete();
        session()->flash('message', 'Notícia deletada com sucesso.');
    }

}
