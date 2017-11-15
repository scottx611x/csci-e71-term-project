<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(VendorsTableSeeder::class);
         $this->call(GroupsTableSeeder::class);
         $this->call(LocationsTableSeeder::class);
         $this->call(OutOfServiceCodesTableSeeder::class);
         $this->call(WarrantiesTableSeeder::class);
         $this->call(ComputerTypesTableSeeder::class);
         $this->call(AssetsTableSeeder::class);
         $this->call(ComputersTableSeeder::class);
         $this->call(AssetRepairsTableSeeder::class);
    }
}
