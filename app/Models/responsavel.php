<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class responsavel extends Model
{
    use HasFactory;
    protected $fillable =['responsavel', 'nascResponsavel', 'estadoCivil', 'tipoCasamento', 'padrinho', 'madrinha'];
}
