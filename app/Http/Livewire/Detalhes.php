<?php

namespace App\Http\Livewire;

use App\Mail\Detalhe;
use App\Models\Models\Categoria;
use App\Models\Models\Propriedade;
use App\Models\Models\Tipo;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Detalhes extends Component
{
    
    public $nome, $email, $contacto, $mensagem, $detalhenome;

    public function resetInput()
    {
        $this->nome = '';
        $this->email = '';
        $this->contacto = '';
        $this->mensagem = '';
    }

    public function mount($id)
    {
        $this->propriedade = Propriedade::with('categorias','tipoitems','areas','distritos.provincias','estados','agentes','textos','fotos','descricaos')->findOrFail($id);
        /* dd($this->propriedade); */

        /* dd($this->propriedade->agentes->email); */
        $this->propriedades = Propriedade::with('categorias','tipoitems','areas','distritos.provincias','estados','agentes')
                                        ->where('tipoitem_id', $this->propriedade->tipoitem_id)
                                        ->whereNotIn('id', [$this->propriedade->id])
                                        ->get();
        /* dd($this->propriedade);   */                              
    }


    public function render()
    {
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        return view('livewire.detalhes')->layout('layouts.app', compact('categoria','tipo'));
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nome' => 'required',
            'email' => 'required',
            'contacto' => 'required',
            'mensagem' => 'required'
        ]);
       /*  dd($this->propriedade); */
        $input = $validatedDate;
        $input['detalhenome'] = $this->propriedade->nome;
        $input['detalheavenida'] = $this->propriedade->endereco;
        $input['detalhepreco'] = $this->propriedade->preco;
        $input['detalheestado'] = $this->propriedade->estados->nome;
        $detail = $input;
        if($this->propriedade->estados->nome === 'Disponível')
        {
            Mail::to($this->propriedade->agentes->email)->send(new Detalhe($detail));
            Mail::to('info@firsteducation.edu.mz')->send(new Detalhe($detail));
            $this->message = 'E-mail Enviado com Sucesso!';
            $this->text = 'Por favor, Aguarda à nossa resposta';
            $this->alertSuccess();
            session()->flash('status', 'E-mail Enviado com Sucesso!');
        } elseif($this->propriedade->estados->nome === 'Indisponível') {
            $this->error();
        } elseif($this->propriedade->estados->nome === 'Reservado')
        {
            $this->Reservado();
        }

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
            'message' => 'A propriedade Está Indisponível!',
            'text' => 'Por favor, Verifica outras.'
        ]);
    }

    public function Reservado()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'error',
            'message' => 'A propriedade Está Reservado!',
            'text' => 'Por favor, Entra em contacto com agente para mais informação.'
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
