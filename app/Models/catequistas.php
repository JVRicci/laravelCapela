<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catequistas extends Model
{
    use HasFactory;
    protected $fillable = ['idContato', 'idEndereco','idTurma','nome','nascimento','ativo'];
}
