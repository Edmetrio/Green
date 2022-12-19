<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Tipoitem extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'tipoitem';
    protected $fillable = ['tipo_id','nome','icon','descricao','estado'];

    public function tipos()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function propriedades()
    {
        return $this->hasMany(Propriedade::class, 'tipoitem_id', 'id');
    }
}
