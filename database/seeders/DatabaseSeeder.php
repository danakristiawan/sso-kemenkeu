<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DataRekeningSeeder;
use Database\Seeders\ReferensiBankSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            //UserSeeder::class,
            // ReferensiBankSeeder::class,
            DataRekeningSeeder::class,
        ]);
    }


}
