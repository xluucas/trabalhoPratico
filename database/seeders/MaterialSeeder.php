<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create(['nome'=>'Tinta']);
        Material::create(['nome'=>'Massa']);
        Material::create(['nome'=>'Lixa']);
        Material::create(['nome'=>'Oleo']);
        Material::create(['nome'=>'Shampoo']);
        Material::create(['nome'=>'Mao de obra']);
    }
}
