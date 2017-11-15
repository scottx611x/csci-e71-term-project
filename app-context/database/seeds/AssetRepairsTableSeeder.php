<?php

use Illuminate\Database\Seeder;
use App\AssetRepair;

class AssetRepairsTableSeeder extends Seeder
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
                16,
                "2017-05-01",
                "8.18",
                "Nulla semper tellus"
            ],
            [
                14,
                "2017-02-21",
                "3.23",
                "Fusce diam nunc, ullamcorper eu,"
            ],
            [
                16,
                "2017-08-04",
                "2.94",
                "pede. Praesent eu"
            ],
            [
                9,
                "2016-11-21",
                "3.24",
                "lorem, sit amet"
            ],
            [
                12,
                "2018-03-05",
                "5.33",
                "molestie"
            ],
            [
                16,
                "2018-06-04",
                "9.13",
                "lectus convallis est, vitae sodales nisi"
            ]
        ];

        $count = count($records);

        foreach ($records as $key => $record) {
            AssetRepair::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'asset_id' => $record[0],
                'repair_date' => $record[1],
                'repair_cost' => $record[2],
                'notes' => $record[3]
            ]);
            $count--;
        }
    }
}
