<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = config('projects.types');

        foreach($types as $type){

        $newType = new Type();
        $newType->name = $type['name'];

        $newType->save();
        };

    }
}
