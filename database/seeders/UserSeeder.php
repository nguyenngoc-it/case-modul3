<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->id=1;
        $user->username='dung';
        $user->email='admin@gmail.com';
        $user->password=Hash::make('12345678');
        $user->role_id=1;
        $user->save();
    }
}
