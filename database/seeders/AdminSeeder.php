<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() !== 0) {
            return;
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin8@gmail.com',
            'password' => bcrypt('123456admin'),
            'is_admin' => '1'
        ]);
    }
}
