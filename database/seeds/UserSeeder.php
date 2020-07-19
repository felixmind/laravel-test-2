<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::forceCreate([
            'name'      => 'felixmind',
            'email'     => 'felximind@email.com',
            'password'  => Hash::make('123456'),
            'api_token' => ':$1$Lb1FK6No$dsHLVYkyCT/0vejYgMVI90',
        ]);

        User::forceCreate([
            'name'      => 'sammind',
            'email'     => 'sammind@email.com',
            'password'  => Hash::make('123456'),
            'api_token' => ':$1$Yz7zY6V/$6q/Fn0UWCPl8M2xLii6tQ0',
        ]);
    }
}
