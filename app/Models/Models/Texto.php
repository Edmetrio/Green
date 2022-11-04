<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Texto extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $table = 'texto';
    protected $fillable = ['propriedade_id','texto','estado'];
}
