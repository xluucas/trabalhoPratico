<?php

namespace Database\Seeders;

use App\Models\Servico;
use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servico::create(['nome'=>'Pintura']);
        Servico::create(['nome'=>'Alinhamento']);
        Servico::create(['nome'=>'Polimento']);
        Servico::create(['nome'=>'Revisao']);
        Servico::create(['nome'=>'Lavagem']);
    }
}
