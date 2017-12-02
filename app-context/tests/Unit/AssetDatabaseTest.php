<?php

namespace Tests\Unit;

use App\Asset;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database;

class AssetDatabaseTest extends TestCase
{
    public function createTestAsset() : Asset
    {
        $asset = new Asset();
        $asset->owner = 'Mr. Bradley';
        $asset->description = 'Cool Asset';
        $asset->notes = 'This is a very cool Asset note';
        $asset->purchase_price = 100;
        $asset->purchase_date = '2017-11-17';
        $asset->serial_number = 'fewnfweifjweiojf';
        $asset->estimated_life_months = 36;
        $asset->assigned_to = 'abc';
        $asset->assigned_date = '2017-11-17';
        $asset->tag = 'JFEFIOj';
        $asset->scheduled_retirement_year = 2020;
        $asset->group_id = 1;
        $asset->location_id = 2;
        $asset->warranty_id = 7;
        $asset->vendor_id = 1;
        return $asset;
    }

    public function createTestAssetAsJSON()
    {
        $asset = $this->createTestAsset();
        $asset->is_out_of_service = true;
        $asset->out_of_service_id = 1;
        $asset->out_of_service_date = "2020-11-17";
        $asset->is_computer = true;
        $asset->memory = "4GB";
        $asset->model = "Cool Model";
        $asset->operating_system = "Ubuntu 16.04 LTS";
        $asset->mac_address = "1A:2A:3A:4A:5A:6A";
        return json_decode(json_encode($asset), true);
    }

    public function testAddNewAssetIncrementsCount()
    {
        $initialCount = Asset::count();
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $this->assertEquals($initialCount + 1, Asset::count());
    }

    public function testAddNewAssetHasIncrementedId()
    {
        $expectedId = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($expectedId);

        $this->assertEquals($expectedId, $asset->id);
    }
    
    public function testAddNewAssetSavesOwner()
    {
        $id = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals($asset->owner, $savedAsset->owner);
    }

    public function testAddNewAssetSavesDescription()
    {
        $id = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals($asset->description, $savedAsset->description);
    }

    public function testAddNewAssetSavesPurchasePrice()
    {
        $id = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals($asset->purchase_price, $savedAsset->purchase_price);
    }

    public function testAddNewAssetSavesPurchaseDate()
    {
        $id = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals($asset->purchase_date, $savedAsset->purchase_date);
    }

    public function testAddNewAssetSavesSerialNumber()
    {
        $id = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals($asset->serial_number, $savedAsset->serial_number);
    }

    // public function testAddNewAssetRejectsNullOwner()
    // {
    //     $asset = $this->createTestAsset();  
    //     $asset->owner = null;
        
    //     try
    //     {

    //         $asset->save();
    //     }
    //     catch (Illuminate\Database\QueryException $exception)
    //     {
    //         return;
    //     }

    //     $this->fail();
    // }

    public function testAddNewAssetSavesEstimatedLifeMonths()
    {
        $id = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals($asset->estimated_life_months, $savedAsset->estimated_life_months);
    }

    public function testAddNewAssetSavesAssignedTo()
    {
        $id = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals($asset->assigned_to, $savedAsset->assigned_to);
    }

    public function testAddNewAssetSavesAssignedDate()
    {
        $id = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals($asset->assigned_date, $savedAsset->assigned_date);
    }

    public function testAddNewAssetSavesTag()
    {
        $id = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals($asset->tag, $savedAsset->tag);
    }

    public function testAddNewAssetSavesScheduledRetirementYear()
    {
        $id = Asset::count() + 1;
        
        $asset = $this->createTestAsset();        
        $asset->save();

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals($asset->scheduled_retirement_year, $savedAsset->scheduled_retirement_year);
    }
}