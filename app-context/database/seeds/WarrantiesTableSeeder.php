<?php

use Illuminate\Database\Seeder;
use App\Warranty;

class WarrantiesTableSeeder extends Seeder
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
               1,
               "sapien, cursus in, hendrerit consectetuer, cursus",
               "2017-11-04",
               "2017-05-03"
             ],
             [
               2,
               "Mauris vel turpis. Aliquam adipiscing . In",
               "2018-05-16",
               "2018-03-24"
             ],
             [
               3,
               "enim consequat purus. Maecenas libero est, congue",
               "2017-02-20",
               "2017-08-02"
             ],
             [
               4,
               "Phasellus vitae mauris sit amet lorem . Mauris",
               "2018-04-27",
               "2017-01-15"
             ],
             [
               5,
               "lacus. Nulla tincidunt, neque vitae , urna justo",
               "2017-10-03",
               "2018-02-01"
             ],
             [
               6,
               "pede. Nunc sed orci lobortis augue . Phasellus",
               "2018-02-17",
               "2018-04-02"
             ],
             [
               7,
               "cursus a, enim. Suspendisse aliquet,",
               "2017-10-19",
               "2017-07-26"
             ],
             [
               8,
               "dictum",
               "2017-02-28",
               "2018-10-07"
             ],
             [
               9,
               "Nulla interdum. Curabitur dictum. Phasellus. Nulla",
               "2018-05-21",
               "2017-01-02"
             ],
             [
               10,
               "faucibus orci luctus et ultrices posuere cubilia",
               "2016-12-29",
               "2018-04-30"
             ]
         ];

         $count = count($records);

         foreach ($records as $key => $record) {
             Warranty::insert([
                 'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                 'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                 'id' => $record[0],
                 'description' => $record[1],
                 'start_date' => $record[2],
                 'end_date' => $record[3]
             ]);
             $count--;
         }
     }
}
