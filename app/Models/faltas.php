<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faltas extends Model
{
    use HasFactory;
    protected $fillable = ['idFalta','faltasCatequese', 'faltaMissa','estado'];
}
