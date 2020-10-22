<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Servico extends Model
{
    use HasFactory;


    protected $fillable = ['nome'];

    public function orcamentos()
    {
        return $this->hasMany(Orcamento::class);
    }

    //Chave enstrangeira
    //A chave estrangeira da tabela (modelo) associada
    //deve ser o nome desse modelo(snake_case) com o sufixo_id
}
