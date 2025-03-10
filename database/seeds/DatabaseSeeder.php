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
        $this->call(UserTableSeeder::class);
        $this->call(WebsiteTableSeeder::class);
        $this->call(ItemSchemaTableSeeder::class);
        $this->call(LinksTableSeeder::class);
    }
}
