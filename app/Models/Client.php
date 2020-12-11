<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    public $timestamps = true;
    protected $primaryKey = 'cpf';
    public $incrementing = false;

    protected $fillable = [
        'nome',
        'cpf',
        'endereco',
    ];
}
