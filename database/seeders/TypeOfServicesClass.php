<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeOfServices;

class TypeOfServicesClass extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeOfServices::insert([
            [
                'service_name' => 'Hanya Cuci',
                'price'        => 5000,
                'description'  => 'Service hanya cuci regular'
            ],
            [
                'service_name' => 'Hanya Gosok',
                'price'        => 4000,
                'description'  => 'Service ini hanya gosok regular'
            ],
            [
                'service_name' => 'Cuci dan Gosok',
                'price'        => 8000,
                'description'  => 'Service hanya cuci regular'
            ],

        ]);
    }
}
