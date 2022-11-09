<?php

namespace App\Http\Livewire;

use App\Mail\Contacto;
use App\Models\Models\Categoria;
use App\Models\Models\Tipo;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contactos extends Component
{
    public $nome, $email, $objectivo, $mensagem;

    public function resetInput()
    {
        $this->nome = '';
        $this->email = '';
        $this->objectivo = '';
        $this->mensagem = '';
    }

    public function render()
    {
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        return view('livewire.contactos')->layout('layouts.app', compact('categoria','tipo'));
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'email' => 'required',
            'objectivo' => 'required',
            'mensagem' => 'required'
        ]);
        $detail = $validatedDate;
        Mail::to('edmetrio@firsteducation.edu.mz')->send(new Contacto($detail));
        session()->flash('status', 'E-mail Enviado com Sucesso!');
        $this->resetInput();
    }
}
