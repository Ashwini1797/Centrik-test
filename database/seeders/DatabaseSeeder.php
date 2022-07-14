<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run()
    {
        User::create([
            'id' => '6cee8add-b7c3-46ea-a9a3-f92a26ff3783',
            'name'=>'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at'=>now()
        ]);
    }
}
