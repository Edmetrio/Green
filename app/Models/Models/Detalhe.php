<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Detalhe extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'detalhe';
    protected $fillable = ['propriedade_id','descricao_id','nome','estado'];

    public function propriedades()
    {
        return $this->belongsTo(Propriedade::class, 'propriedade_id');
    }

    public function descricaos()
    {
        return $this->belongsTo(Descricao::class, 'descricao_id');
    }
}
