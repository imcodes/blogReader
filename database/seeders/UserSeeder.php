<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //we want to alwas 5 user seeds so we need to check that we have less than 5 users in the database before seeding
        $maxSeed = 6;
        $userCount = User::where('user_role','user')->count();
        if($userCount < $maxSeed){
            $maxSeed = $maxSeed - $userCount;
            User::factory($maxSeed)->create();
        }
    }
}
