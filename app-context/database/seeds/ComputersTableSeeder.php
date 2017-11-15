<?php

use Illuminate\Database\Seeder;
use App\Computer;

class ComputersTableSeeder extends Seeder
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
                3,
                2,
                "I0T 4M7",
                "R3W 1G7",
                "Ali Phelps",
                "57D70265-E492-F366-59F7-80D084"
            ],
            [
                4,
                2,
                "H3W 7K1",
                "G9O 0S6",
                "Colin Mcleod",
                "0C6C4DA5-AF30-8ABB-455C-B1131C"
            ],
            [
                5,
                5,
                "J7W 6E4",
                "A9F 1D1",
                "Rigel Day",
                "3325F706-2628-90C5-92C5-1C9730"
            ],
            [
                7,
                1,
                "Y1V 7J8",
                "X4O 1Y3",
                "Aquila French",
                "5A2EEA68-24F6-5A1B-E342-77A1E6"
            ],
            [
                11,
                4,
                "R4X 7B5",
                "L2X 2Z3",
                "Channing Dorsey",
                "B6C2CD51-9406-667F-3EFB-B27606"
            ],
            [
                14,
                2,
                "L5I 9C3",
                "Q3H 2K1",
                "Flynn Keith",
                "3CEA42AE-EEE8-2F46-C72F-4D624C"
            ],
        ];

        $count = count($records);

        foreach ($records as $key => $record) {
            Computer::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'asset_id' => $record[0],
                'computer_type_id' => $record[1],
                'memory' => $record[2],
                'model' => $record[3],
                'operating_system' => $record[4],
                'mac_address' => $record[5]
            ]);
            $count--;
        }
    }
}
