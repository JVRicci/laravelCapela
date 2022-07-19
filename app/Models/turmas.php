<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turmas extends Model
{
    use HasFactory;
    protected $fillable = ['idCatequista', 'diaEncontro', 'formacao'];
}
