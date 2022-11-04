<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Propriedade extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'propriedades';
    protected $fillable = ['categoria_id','tipo_id','area_id','distrito_id','estado_id','nome','descricao','icon','preco','estado','agente_id','endereco'];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function tipos()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
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
}
