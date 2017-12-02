<?php

namespace Tests\Unit;

use App\Asset;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AssetDatabaseTest extends TestCase
{
    public function testAddNewAssetIncrementsCount()
    {
        $initialCount = Asset::count();
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $this->assertEquals($initialCount + 1, Asset::count());
    }
    
    public function testAddNewAssetSavesOwner()
    {        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->owner, $savedAsset->owner);
    }

    public function testAddNewAssetSavesDescription()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->description, $savedAsset->description);
    }

    public function testAddNewAssetSavesPurchasePrice()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->purchase_price, $savedAsset->purchase_price);
    }

    public function testAddNewAssetSavesPurchaseDate()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->purchase_date, $savedAsset->purchase_date);
    }

    public function testAddNewAssetSavesSerialNumber()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->serial_number, $savedAsset->serial_number);
    }

    public function testAddNewAssetSavesEstimatedLifeMonths()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->estimated_life_months, $savedAsset->estimated_life_months);
    }

    public function testAddNewAssetSavesAssignedTo()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->assigned_to, $savedAsset->assigned_to);
    }

    public function testAddNewAssetSavesAssignedDate()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->assigned_date, $savedAsset->assigned_date);
    }

    public function testAddNewAssetSavesTag()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->tag, $savedAsset->tag);
    }

    public function testAddNewAssetSavesScheduledRetirementYear()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->scheduled_retirement_year, $savedAsset->scheduled_retirement_year);
    }

    public function testDeleteAssetRemovesFromDatabase()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $asset->delete();

        $a = Asset::find($asset->id);
        $this->assertEquals($a, 0);
    }

    public function testModifySavesOwner()
    {        
        $asset = $this->createTestAsset();        
        $asset->save();      

        $asset->owner = "new owner";
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->owner, $savedAsset->owner);
    }
}