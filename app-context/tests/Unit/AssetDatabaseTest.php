<?php

namespace Tests\Unit;

use App\Asset;
use App\ComputerType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AssetDatabaseTest extends TestCase
{   
    # TODO: Utilize DatabaseTransactions for some of our tests?
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

    public function testModifyAssetSavesDescription()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $asset->description = "new description";
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->description, $savedAsset->description);
    }

    public function testModifyAssetSavesPurchasePrice()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $asset->purchase_price = 78;
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->purchase_price, $savedAsset->purchase_price);
    }

    public function testModifyAssetSavesPurchaseDate()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $asset->purchase_date = "2015-11-17";
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->purchase_date, $savedAsset->purchase_date);
    }

    public function testModifyAssetSavesSerialNumber()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $asset->serial_number = "7687567567474";
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->serial_number, $savedAsset->serial_number);
    }

    public function testModifyAssetSavesEstimatedLifeMonths()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $asset->estimated_life_months = 45;
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->estimated_life_months, $savedAsset->estimated_life_months);
    }

    public function testModifyAssetSavesAssignedTo()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $asset->assigned_to = "ABC129";
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->assigned_to, $savedAsset->assigned_to);
    }

    public function testModifyAssetSavesAssignedDate()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $asset->assigned_date = "2015-11-13";
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->assigned_date, $savedAsset->assigned_date);
    }

    public function testModifyAssetSavesTag()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $asset->tag = "VHUIEHF";
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->tag, $savedAsset->tag);
    }

    public function testModifyAssetSavesScheduledRetirementYear()
    {
        $asset = $this->createTestAsset();        
        $asset->save();

        $asset->purchase_date = 2053;
        $asset->save();

        $savedAsset = Asset::findOrFail($asset->id);

        $this->assertEquals($asset->scheduled_retirement_year, $savedAsset->scheduled_retirement_year);
    }

    public function testAddNewComputerTypeIncrementsCount()
    {
        $initialCount = ComputerType::count();
        
        $computertype = new ComputerType();
        $computertype->description = "type 1";       
        $computertype->save();

        $this->assertEquals($initialCount + 1, ComputerType::count());
    }
    
    public function testAddNewComputerTypeSavesDescription()
    {
        $computertype = new ComputerType();
        $computertype->description = "type 1";
        $computertype->save();

        $savedComputertype = ComputerType::findOrFail($computertype->id);

        $this->assertEquals($computertype->description, $savedComputertype->description);
    }

    public function testModifyComputerTypeSavesDescription()
    {
        $computertype = new ComputerType();
        $computertype->description = "type 1";      
        $computertype->save();

        $computertype->description = "new description";
        $computertype->save();

        $savedComputertype = ComputerType::findOrFail($computertype->id);

        $this->assertEquals($computertype->description, $savedComputertype->description);
    }
}