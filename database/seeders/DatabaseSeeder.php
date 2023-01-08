<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for ($i=1; $i <= 8; $i++) { 
            
            \App\Models\Projects::create(
                [
                    'name' => 'Test Project'.$i,
                    'client' => 'Test Client'.$i,
                    'leader_name' => 'Test Leader'.$i,
                    'leader_email' => 'leader.email'.$i.'@gmail.com',
                    'leader_image' => 'pic'.$i.'.jpg',
                    'start_date' => '2021-01-01',
                    'end_date' => '2021-01-05',
                    'progress' => 92+$i,
                ]
            );
        }
    }
}
