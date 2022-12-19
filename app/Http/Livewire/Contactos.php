<?php

namespace App\Http\Livewire;

use App\Mail\Contacto;
use App\Models\Models\Categoria;
use App\Models\Models\Tipo;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contactos extends Component
{
    public $nome, $email, $objectivo, $mensagem, $message, $text;

    public function resetInput()
    {
        $this->nome = '';
        $this->email = '';
        $this->objectivo = '';
        $this->mensagem = '';
        $this->message = '';
        $this->text = '';
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
        Mail::to('info@firsteducation.edu.mz')->send(new Contacto($detail));
        $this->message = 'E-mail Enviado com Sucesso!';
        $this->text = 'Por favor, aguarda a resposta.';
        session()->flash('status', 'E-mail Enviado com Sucesso!');
        $this->alertSuccess();

        $this->resetInput();
    }

    public function alertSuccess()
    {
        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => $this->message, 
                'text' => $this->text
            ]);
    }

    public function alertUpdate()
    {
        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Rota actualizada com sucesso.', 
                'text' => 'Por favor, verifica a rota actualizada.'
            ]);
    }

    public function error()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'error',
            'message' => 'Rota Inexistente!',
            'text' => 'Por favor, Introduz outra Rota.'
        ]);
    }

    public function remove()
    {
        /* Write Delete Logic */
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Rota deletada!',
            'text' => 'A Rota não faz mais parte da lista.'
        ]);
    } 
}
