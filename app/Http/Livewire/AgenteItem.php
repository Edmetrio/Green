<?php

namespace App\Http\Livewire;

use App\Mail\Agente as MailAgente;
use App\Models\Models\Agente;
use App\Models\Models\Categoria;
use App\Models\Models\Tipo;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AgenteItem extends Component
{
    public $nome, $email, $contacto, $mensagem, $email2;

    public function resetInput()
    {
        $this->nome = '';
        $this->email = '';
        $this->contacto = '';
        $this->mensagem = '';
        $this->email2 = '';
    }
    public function mount($id)
    {
        $this->agente = Agente::with('distritos.provincias','propriedades.tipoitems','propriedades.categorias','propriedades.estados','propriedades.distritos','propriedades.estados')->findOrFail($id);
        $this->agentes = Agente::whereNotIn('id', [$id])->get();
    }

    public function render()
    {
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        return view('livewire.agente-item')->layout('layouts.app', compact('categoria','tipo'));
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'email' => 'required',
            'contacto' => 'required',
            'mensagem' => 'required',
        ]);
        $detail = $validatedDate;

        Mail::to($this->agente->email)->send(new MailAgente($detail));
        session()->flash('status', 'E-mail Enviado com Sucesso!');
        $this->resetInput();
    }
}
