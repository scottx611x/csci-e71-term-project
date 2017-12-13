<?php

use Illuminate\Database\Seeder;
use App\Asset;
use App\Keyword;

class AssetKeywordTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        // Attach few keywords with asset id=1
        $asset = Asset::with('keywords')->findOrFail(1);

        $keywords = ['new', 'internal', 'expensive'];
        foreach ($keywords as $keywordName) {
            $keyword = Keyword::where('name', 'LIKE', $keywordName)->first();

            # Connect this asset to this keyword
            $asset->keywords()->save($keyword);
        }

        // Attach few keywords with asset id=2
        $asset = Asset::with('keywords')->findOrFail(2);

        $keywords = ['antique', 'electronic', 'furniture'];
        foreach ($keywords as $keywordName) {
            $keyword = Keyword::where('name', 'LIKE', $keywordName)->first();

            # Connect this asset to this keyword
            $asset->keywords()->save($keyword);
        }
    }
}
