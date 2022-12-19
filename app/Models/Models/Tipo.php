<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tipo extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'tipo';
    protected $fillable = ['nome','icon','descricao','estado'];

    public function tipoitems()
    {
        return $this->hasMany(Tipoitem::class, 'tipo_id', 'id');
    }

    public function propriedades()
    {
        return $this->hasMany(Propriedade::class, 'tipo_id', 'id');
    }
}
