<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PhoneSeeder::class);
        $this->call(EmailSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(OrganizationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CustomFieldSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(ContactSeeder::class);
    }
}
