<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(
            // [
            // 'name'=>'user',
            // 'role'=>'student',
            // 'adress'=>'casa',
            // 'email'=>'user@dev.test',
            // 'password'=>Hash::make('user'),
            // ],
            [
                'name'=>'userprof',
                'role'=>'teacher',
                'adress'=>'casa',
                'email'=>'prof@dev.test',
                'password'=>Hash::make('prof'),
             ],
    );
    }
}
