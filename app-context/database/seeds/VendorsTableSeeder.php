<?php

use Illuminate\Database\Seeder;
use App\Vendor;

class VendorsTableSeeder extends Seeder
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
                "Ap #440-2284 Odio St.",
                "3377 Ullamcorper. Av.",
                "Great Falls",
                "MT",
                "89328",
                "Ligula Aliquam Institute",
                "vel.pede.blandit@Donecegestas.co.uk",
                "(174) 268-6222",
                "(980) 726-0405"
            ],
            [
                "P.O. Box 823, 1707 Metus. Rd.",
                null,
                "Allentown",
                "PA",
                "79825",
                "Elit Curabitur Sed Limited",
                "tellus@Vivamusrhoncus.org",
                "(589) 733-0466",
                "(341) 796-9100"
            ],
            [
                "751-4882 Tellus. St.",
                "167-4587 Justo. Avenue",
                "Indianapolis",
                "IN",
                "33318",
                "Dictum Sapien Institute",
                "nunc@velitQuisque.org",
                "(631) 495-3600",
                "(603) 253-8954"
            ],
            [
                "Ap #166-4086 Maecenas Rd.",
                "303-4747 Amet Av.",
                "New Haven",
                "CT",
                "69535",
                "Nam Nulla Magna Inc.",
                null,
                "(777) 996-5987",
                "(481) 872-5591"
            ],
            [
                "Ap #523-2084 Duis St.",
                "687-4537 Integer Rd.",
                "Erie",
                "PA",
                "41842",
                "Mauris PC",
                "est@quis.com",
                "(647) 278-9658",
                null
            ],
            [
                "724-2564 Phasellus Ave",
                "P.O. Box 890, 1577 Pede Rd.",
                "Great Falls",
                "MT",
                "28195",
                "Dolor Foundation",
                "eros.Nam@eueleifend.ca",
                "(237) 674-7190",
                "(962) 151-4919"
            ],
            [
                "Ap #833-595 Lorem Road",
                "826-9364 Tincidunt Av.",
                "Hilo",
                "HI",
                "31661",
                "Lorem Auctor Corp.",
                "lacus.Quisque@odioa.co.uk",
                "(449) 157-0795",
                "(780) 990-3800"
            ],
            [
                "P.O. Box 556, 7165 Elit. Road",
                "446-7082 Nullam Street",
                "Fort Wayne",
                "IN",
                "64135",
                "Nunc Ac Inc.",
                "viverra.Maecenas.iaculis@Aliquam.co.uk",
                "(770) 345-7547",
                "(597) 558-1295"
            ],
            [
                "P.O. Box 330, 7980 Montes, Road",
                "P.O. Box 728, 2427 Placerat Road",
                "Fort Collins",
                "CO",
                "70921",
                "Sit LLP",
                "lacus@idmollis.net",
                "(170) 196-9039",
                "(325) 705-8887"
            ],
            [
                "759-185 Pellentesque Street",
                "Ap #611-9352 Aenean St.",
                "Richmond",
                "VA",
                "27441",
                "Vitae Diam Consulting",
                "diam.Proin.dolor@imperdieteratnonummy.org",
                "(100) 517-1124",
                "(588) 854-2977"
            ]
        ];

        $count = count($records);

        foreach ($records as $key => $record) {
            Vendor::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'address1' => $record[0],
                'address2' => $record[1],
                'city' => $record[2],
                'state' => $record[3],
                'zip' => $record[4],
                'company' => $record[5],
                'email' => $record[6],
                'phone' => $record[7],
                'fax' => $record[8]
            ]);
            $count--;
        }
    }
}
