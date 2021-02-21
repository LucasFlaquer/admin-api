<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'lucas';
        $user->email = 'lucas.flaquer@gmail.com';
        $user->password = bcrypt('123');
        $user->save();
    }
}
