<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Descricao extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'descricao';
    protected $fillable = ['nome', 'estado'];

    public function propriedades()
    {
        return $this->belongsToMany(Propriedade::class, 'detalhe')->withPivot('nome');
    }
}
