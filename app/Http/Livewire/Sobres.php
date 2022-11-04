<?php

namespace App\Http\Livewire;

use App\Mail\Teste;
use App\Models\Models\Categoria;
use App\Models\Models\Tipo;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Sobres extends Component
{
    public $nome, $email, $contacto, $mensagem;

    public function resetInput()
    {
        $this->nome = '';
        $this->email = '';
        $this->contacto = '';
        $this->mensagem = '';
    }

    public function render()
    {
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        return view('livewire.sobres')->layout('layouts.app', compact('categoria','tipo'));
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'email' => 'required',
            'contacto' => 'required',
            'mensagem' => 'required'
        ]);
        $detail = $validatedDate;
        Mail::to('edmetrio@firsteducation.edu.mz')->send(new Teste($detail));
        session()->flash('status', 'E-mail Enviado com Sucesso!');
        $this->resetInput();
    }
}
