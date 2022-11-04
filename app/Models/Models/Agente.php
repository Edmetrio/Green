<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Agente extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'agente';
    protected $fillable = ['distrito_id','nome','endereco','email','contacto','icon','estado'];

    public function distritos()
    {
        return $this->belongsTo(Distrito::class, 'distrito_id');
    }

    public function propriedades()
    {
        return $this->hasMany(Propriedade::class,  'agente_id', 'id');
    }
}
