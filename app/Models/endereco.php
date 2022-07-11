<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
    use HasFactory;
    protected $fillable = ['endereco', 'cep', 'numero', 'cidade', 'bairro', 'uf'];
}
