<?php

use App\CustomField;
use Illuminate\Database\Seeder;

class CustomFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CustomField::class, 10)->create();
    }
}
