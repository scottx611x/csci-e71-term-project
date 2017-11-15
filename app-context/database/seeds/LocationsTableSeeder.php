<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsTableSeeder extends Seeder
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
                "Computer Science"
            ],
            [
                "2",
                "Computer Lab"
            ],
            [
                "3",
                "Physics"
            ],
            [
                "4",
                "Geology"
            ],
            [
                "5",
                "Master Bathroom"
            ]
        ];

        $count = count($records);

        foreach ($records as $key => $record) {
            Location::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'id' => $record[0],
                'description' => $record[1]
            ]);
            $count--;
        }
    }
}
