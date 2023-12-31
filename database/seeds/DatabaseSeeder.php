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
        $this->call("RoleSeeder");
        $this->call("DivisionSeeder");
        $this->call("UserSeeder");
        $this->call("CategorySeeder");
        $this->call("PostSeeder");
        $this->call("PageContentSeeder");
        $this->call("ProkerSeeder");
        $this->call("ProkerDivisionSeeder");
        $this->call("ProkerUserSeeder");
    }
}
