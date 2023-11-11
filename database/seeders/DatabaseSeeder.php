<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\{Teacher,Course,Research,Department,Activity,Admission};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // Teacher::factory(9)->create();
        // Activity::factory(30)->create();

        // Course::factory(18)->create();
        // Admission::factory(30)->create();

        // Research::factory(1000)->create();
        // if (\App\Models\User::all()->count()<1 ) {

        //             // password 1 to 8


        //     \App\Models\User::factory()->create([
        //         'name' => 'admin',
        //         'email' => 'admin@gmail.com',
        //         'password'=>'$2y$10$6pg9yxZbVWUE/oo2tKGgRu2Z6jdfqztGCIdyRkONTC1NaUmRSP6pm',
        //         'email_verified_at' => now(),
        //         'remember_token' => Str::random(10),
        //         'role'=>'superadmin',
        //     ]);
        // }
        
        // if (\App\Models\Faculty::all()->count()<1) {

        //     \App\Models\Faculty::create([

        //         'name'=>'science',
            
        //     ]);
        // }
        
        // \App\Models\User::factory(10)->create();

      
        
    }
}
