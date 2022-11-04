<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Noticia extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'noticia';
    protected $fillable = ['categoria_id','tipo_id','destaque_id','nome','descricao','icon','texto','texto1','texto2','estado'];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function tipos()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function destaques()
    {
        return $this->belongsTo(Destaque::class, 'destaque_id');
    }
}
