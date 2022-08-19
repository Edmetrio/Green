<?php

namespace App\Http\Controllers;

use App\Models\Models\Area;
use App\Models\Models\Categoria;
use App\Models\Models\Distrito;
use App\Models\Models\Estado;
use App\Models\Models\Propriedade;
use App\Models\Models\Tipo;
use Illuminate\Http\Request;

class PropriedadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propriedade = Propriedade::with('categorias','tipos','areas','distritos','estados')->orderBy('created_at', 'desc')->paginate(5);
        return view('propriedades.index',compact('propriedade'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $tipo = Tipo::orderBy('created_at', 'desc')->get();
        $area = Area::orderBy('created_at', 'desc')->get();
        $distrito = Distrito::orderBy('created_at', 'desc')->get();
        $estado = Estado::orderBy('created_at', 'desc')->get();
        return view('propriedades.create', compact('categoria','tipo','area','distrito','estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'tipo_id' => 'required',
            'area_id' => 'required',
            'distrito_id' => 'required',
            'estado_id' => 'required',
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($icon = $request->file('icon')) {
            $destinationPath = 'assets/images/propriedade';
            $profileImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $profileImage);
            $input['icon'] = "$profileImage";
        }
    
        Propriedade::create($input);
     
        return redirect()->route('propriedade.index')
                        ->with('success','Propriedade criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
