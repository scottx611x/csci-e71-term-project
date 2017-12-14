<?php

use Illuminate\Database\Seeder;
use App\ComputerType;

class ComputerTypesTableSeeder extends Seeder
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
                "Laptop"
            ],
            [
                "2",
                "Desktop"
            ],
            [
                "3",
                "Tablet"
            ],
            [
                "4",
                "Mini-Tower"
            ],
            [
                "5",
                "Server"
            ]
        ];

        $count = count($records);

        foreach ($records as $key => $record) {
            ComputerType::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'description' => $record[1]
            ]);
            $count--;
        }
    }
}
