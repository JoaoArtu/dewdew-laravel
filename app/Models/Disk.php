<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disk extends Model
{
    use HasFactory;

    protected $table = 'discos';
    public $timestamps = true;

    protected $fillable = [
        'titulo',
        'artista',
        'genero',
        'ano',
        'qtd_exemplares',
        'qtd_disponivel',
        'preco',
    ];
}