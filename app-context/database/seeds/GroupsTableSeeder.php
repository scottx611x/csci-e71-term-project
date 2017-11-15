<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $records = [
             [
                 "1",
                 "Router"
             ],
             [
                 "2",
                 "Switch"
             ],
             [
                 "3",
                 "Printer"
             ],
             [
                 "4",
                 "MFC"
             ],
             [
                 "5",
                 "Computer"
             ]
         ];

         $count = count($records);

         foreach ($records as $key => $record) {
             Group::insert([
                 'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                 'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                 'id' => $record[0],
                 'description' => $record[1]
             ]);
             $count--;
         }
     }
}
