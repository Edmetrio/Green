<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class role extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'role';
    protected $fillable = ['nome','estado'];

    public function rotas()
    {
        return $this->belongsToMany(Rota::class, 'permissao', 'role_id', 'rota_id')->withPivot(['id']);
    }
}
