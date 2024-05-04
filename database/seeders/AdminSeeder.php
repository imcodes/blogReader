<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Check that we don't have a super admin yet
        $isSuper = User::where("user_role","admin")->where('user_level',0)->first();
        if (!$isSuper) {
            User::factory()->create([
                'name' => fake()->name(),
                'email' => 'superadmin@gmail.com',//fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' =>  Hash::make('12345678'),
                'remember_token' => Str::random(10),
                'user_role' => 'admin',
                'user_level' => 0
            ]);

            //check if regular admin exist in the database and creates one  if it does not exist
            $isregular = User::where('user_role','admin')->where('user_level',1)->first();
            if (!$isregular) {
                User::factory()->create([
                    'name' => fake()->name(),
                    'email' => 'admin1@gmail.com',//fake()->unique()->safeEmail(),
                    'email_verified_at' => now(),
                    'password' =>  Hash::make('12345678'),
                    'remember_token' => Str::random(10),
                    'user_role' => 'admin',
                    'user_level' => 1
                ]);
            }
        }
    }

}
