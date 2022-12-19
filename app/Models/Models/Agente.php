<?php

namespace App\Models\Models;

use App\Models\User;
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
    protected $fillable = ['users_id','distrito_id','nome','endereco','email','contacto','icon','cargo_id','estado'];

    public function distritos()
    {
        return $this->belongsTo(Distrito::class, 'distrito_id');
    }

    public function propriedades()
    {
        return $this->hasMany(Propriedade::class,  'agente_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function cargos()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

}
