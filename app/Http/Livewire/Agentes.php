<?php

namespace App\Http\Livewire;

use App\Models\Models\Agente;
use App\Models\Models\Cargo;
use App\Models\Models\Distrito;
use App\Models\Models\role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Agentes extends Component
{
    public $distrito_id, $nome, $endereco, $email, $contacto, $icon, $nomem, $cargo_id, $new_icon, $old_icon, $agente_id, $password, $role_id;
    public $updateMode = false;
    use WithFileUploads;

    public function mount()
    {
        $this->distritos = Distrito::orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        $this->agente = User::with('agentes.distritos','roles')->findOrFail(Auth::user()->id);
       /*  dd($this->agente); */
        $this->cargo = Cargo::orderBy('created_at', 'desc')->get();
        $this->agentes = User::with('agentes.distritos', 'roles')->orderBy('created_at', 'desc')->get();
        $role = role::where('nome', 'Dev')->first();
        return view('livewire.agentes')->layout('layouts.appDash', compact('role'));
    }

    private function resetInputFields(){
        $this->distrito_id = '';
        $this->nome= '';
        $this->endereco = '';
        $this->contacto = '';
        $this->cargo_id = '';
        $this->old_icon = '';
        $this->new_icon = '';
        $this->password = '';
        $this->role_id = '';
    }

    private function resetInputFieldsModal()
    {
        $this->nomem = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'contacto' => 'required',
            'distrito_id' => 'required',
            'cargo_id' => 'required',
            'password' => ['required'],
        ]);
        $input = $validatedDate;
        if ($this->icon) {
            $input['icon'] = $this->icon->store('files', 'public');
        } else {
            $input['icon'] = '';
        }


        $role = role::where('nome', 'User')->first();

        $user = $input;
        $user['name'] = $this->nome;
        $user['email'] = $this->email;
        $user['password'] = Hash::make($this->password);
        $user['role_id'] = $role->id;

        $u = User::create($user);
        $input['users_id'] = $u->id;
        Agente::create($input);
        
        session()->flash('message', 'Agente criado com sucesso.');
  
        $this->resetInputFields();
    }

    public function storeM()
    {
        $validatedDate = $this->validate([
            'nomem' => 'required',
        ]);
        
        $input = $validatedDate;
        $input['nome'] = $this->nomem;
        
        Cargo::create($input);
  
        session()->flash('message', 'Cargo criado com sucesso.');
  
        $this->resetInputFieldsModal();
        $this->emit('agenteAdded');
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
        $user = User::findOrFail($tipo->users_id);
        $destination = public_path("storage\\". $tipo->icon);
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        Agente::find($id)->delete();
        $user->delete();
        session()->flash('message', 'Agente deletado com sucesso.');
    }
}
