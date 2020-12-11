<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'livros';
    public $timestamps = true;

    protected $fillable = [
        'titulo',
        'autor',
        'genero',
        'ano',
        'qtd_paginas',
        'qtd_exemplares',
        'qtd_disponivel',
        'preco',
    ];
}
