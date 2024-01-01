<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        Address::factory(10)->create();
    }
}
