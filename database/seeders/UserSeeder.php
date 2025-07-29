<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private array $users;

    public function __construct()
    {
        $this->users = array(
            [
                'name' => 'Moammer Farshid Enan',
                'username' => 'enan',
                'email' => 'emoammerfershid@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('hello_enan_54'),
            ],
            [
                'name' => 'Moammer Farshid Enan',
                'username' => 'admin',
                'email' => 'admin@app.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->alert("Seeding users...");
        collect($this->users)->each(function ($user) {
            $name = Arr::get($user, 'name');
            $email = Arr::get($user, 'email');
            $username = Arr::get($user, 'username');
            $role = Arr::get($user, 'role');
            $password = Arr::get($user, 'password');

            $user = User::updateOrCreate([
                'email' => $email,
                'username' => $username,
            ], [
                'name' => $name,
                'role' => $role,
                'password' => $password,
            ]);

            $this->command->info('Seeding user: ' . $name);
        });
    }
}
