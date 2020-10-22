<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome','cpf','telefone','email'];
    public function orcamentos()
    {
        return $this->hasMany(Orcamento::class);
    }


}
