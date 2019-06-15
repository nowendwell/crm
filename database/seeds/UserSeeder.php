<?php

use App\User;
use Illuminate\Support\Str;
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
        User::create([
            'uuid' => Str::uuid(),
            'name' => 'Ben Miller',
            'email' => 'nowendwell@gmail.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('password'),
            'remember_token' => Str::random(10),
            'api_token' => Str::random(40),
            'organization_id' => 1
        ]);

        factory(User::class, 10)->create();
    }
}
