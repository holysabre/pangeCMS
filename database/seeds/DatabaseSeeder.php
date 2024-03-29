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
         $this->call(UsersTableSeeder::class);
         $this->call(SitesTableSeeder::class);
         $this->call(MemberRolesTableSeeder::class);
         $this->call(MembersTableSeeder::class);
         $this->call(MenusTableSeeder::class);
         $this->call(RebatesTableSeeder::class);
         $this->call(EncouragementTableSeeder::class);
    }
}
