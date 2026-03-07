<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;
class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = User::first();

        // Project::create([
        //     'user_id' => $user->id,
        //     'title' => 'Solar Project Jalalabad',
        //     'location' => 'Jalalabad',
        //     'capacity' => '50kW',
        //     'description' => 'Installed 50kW solar system for industrial use.',
        //     'image' => 'projects/jalalabad.jpg'
        // ]);
    }
}
