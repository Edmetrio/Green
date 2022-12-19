<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Support\Facades\Auth;

class Propriedade extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'propriedades';
    protected $fillable = ['users_id','categoria_id','tipoitem_id','area_id','distrito_id','estado_id','nome','descricao','icon','preco','estado','agente_id','endereco','moeda_id'];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function tipoitems()
    {
        return $this->belongsTo(Tipoitem::class, 'tipoitem_id');
    }

    public function areas()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function distritos()
    {
        return $this->belongsTo(Distrito::class, 'distrito_id');
    }

    public function estados()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function agentes()
    {
        return $this->belongsTo(Agente::class, 'agente_id');
    }

    public function textos()
    {
        return $this->hasMany(Texto::class, 'propriedade_id', 'id');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'propriedade_id', 'id');
    }

    public function moedas()
    {
        return $this->belongsTo(Moeda::class, 'moeda_id');
    }

    public function descricaos()
    {
        return $this->belongsToMany(Descricao::class, 'detalhe')->withPivot('nome','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function detalhes()
    {
        return $this->hasMany(Detalhe::class, 'propriedade_id', 'id');
    }
}
