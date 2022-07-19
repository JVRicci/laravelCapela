<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catequizandos extends Model
{
    use HasFactory;
    protected $fillable = ['idContato', 'idEndereco', 'idResponsavel', 'idTurma','nome','nascimento',
    'faltas', 'ativo', 'turma','faltaEncontro', 'faltaMissa'];
}
