<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        Client::create([
            'name' => 'Client One',
            'email' => 'client@gmail.com',
            'phone' => '01234567890',
            'image' => 'default.png'
        ]);

        Project::create([
            'title' => 'Project One',
            'description' => 'Project description',
            'deadline' => Carbon::now()->addDays(5),
            'user_id' => 1,
            'client_id' => 1
        ]);

        Task::create([
            'title' => 'Task One',
            'details' => 'Task details',
            'deadline' => Carbon::now()->addDays(2),
            'project_id' => 1
        ]);
    }
}
