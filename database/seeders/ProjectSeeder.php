<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Ignition\Contracts\ConfigManager;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = config('projects.projects');

        foreach($projects as $project){
            $newProject = new Project();

            $newProject->name = $project['name'];
            $newProject->image = $project['image'];
            $newProject->description = $project['description'];

            $newProject->save();
        }
    }
}
