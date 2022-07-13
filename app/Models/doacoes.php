<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doacoes extends Model
{
    use HasFactory;
    protected $fillable = ['idDoador','descricao', 'destino', 'dataRecebimento', 'ticoDoacao'];
}
