<?php

use Illuminate\Database\Seeder;
use App\OutOfServiceCode;

class OutOfServiceCodesTableSeeder extends Seeder
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
                "Malfunctioning"
            ],
            [
                "2",
                "Outdated"
            ],
            [
                "3",
                "Expired"
            ],
            [
                "4",
                "Broken"
            ],
            [
                "5",
                "Misconfigured"
            ]
        ];

        $count = count($records);

        foreach ($records as $key => $record) {
            OutOfServiceCode::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'reason' => $record[1]
            ]);
            $count--;
        }
    }
}
