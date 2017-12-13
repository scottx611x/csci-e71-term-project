<?php

use Illuminate\Database\Seeder;
use App\Keyword;

class KeywordsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $keywords = ['new', 'internal', 'expensive', 'second hand', 'antique', 'electronic', 'furniture'];

        foreach ($keywords as $keywordName) {
            $keyword = new Keyword();
            $keyword->name = $keywordName;
            $keyword->save();
        }
    }
}
