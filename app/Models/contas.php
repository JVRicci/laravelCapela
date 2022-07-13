<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contas extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'valor','categoria','fornecedor','vencimento','responsavel',
    'pagamento','formaPagamento','estado'];
}
