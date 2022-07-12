<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dizimista extends Model
{
    use HasFactory;
    protected $fillable = ['idEndereco', 'idContato', 'nome', 'nascimento', 'cpf', 'estadoCivil', 'tipoCasamento',
    'conjuge','conjugeNascimento','ativo'];
}
