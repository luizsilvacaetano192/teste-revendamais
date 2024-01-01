<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddressFactory extends Factory
{
    public function definition(): array
    {
        $estados = array(
          1 =>  'AC',
          2 =>  'AL',
          3 =>  'AP',
          4 =>  'AM',
          5 =>  'BA',
          6 =>  'CE',
          7 =>  'DF',
          8 =>  'ES',
          9 =>  'GO',
          10 => 'MA',
        );

        return [
            'zip_code'     =>  random_int(10000000,99999999),
            'street'       =>  fake()->name(),
            'neighborhood' =>  fake()->sentence(1),
            'city'         =>  fake()->city(),
            'state'        =>  $estados[random_int(1,10)]
            
        ];
    }
}
