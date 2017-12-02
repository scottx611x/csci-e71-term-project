<?php

namespace Tests\Feature;

use App\Asset;
use Tests\TestCase;
use Tests\Unit\AssetDatabaseTest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends AssetDatabaseTest
{

    public function assertRouteWorks($routeName, $detailView = True)
    {
        $response = $this->get($routeName);
        $response->assertStatus(200);
    }

    public function assertItemIdExists($routeName, $id)
    {
        $response = $this->get($routeName.$id);
        $response->assertStatus(200);
    }
    
    public function testAsset()
    {
        $this->assertRouteWorks('/asset/');
    }

    public function testGetAsset()
    {
        $this->assertItemIdExists('/asset/', '1');
    }

    public function testAssetCreatePage()
    {
        $this->assertRouteWorks('/asset/create/');
    }

    public function testCreateNewAssetRedirectsWithInvalidPostAndDatabaseUnchanged()
    {
        $initialCount = Asset::count();
        $response = $this->post('/asset/');
        $response->assertRedirect('/');
        $this->assertEquals($initialCount, Asset::count());
    }

    public function testCreateNewAssetInsertsItemAndRedirectsWithValidPost()
    {
        $initialCount = Asset::count();
        $id = Asset::count() + 1;

        $response = $this->post('/asset', $this->createTestAssetAsJSON());
        $response->assertRedirect('/asset/'.$id);
        $this->assertEquals($id, Asset::count());

        $savedAsset = Asset::findOrFail($id);

        $this->assertEquals('Mr. Bradley', $savedAsset->owner);
        $this->assertEquals('Cool Asset', $savedAsset->description);
        $this->assertEquals(100, $savedAsset->purchase_price);
        $this->assertEquals('2017-11-17', $savedAsset->purchase_date);
        $this->assertEquals('fewnfweifjweiojf', $savedAsset->serial_number);
        $this->assertEquals(36, $savedAsset->estimated_life_months);
        $this->assertEquals('abc', $savedAsset->assigned_to);
        $this->assertEquals('2017-11-17', $savedAsset->assigned_date);
        $this->assertEquals('JFEFIOj', $savedAsset->tag);
        $this->assertEquals(2020, $savedAsset->scheduled_retirement_year);    
    }

    public function testEditNonExistantAssetRedirectsToAssetListing()
    {
        $response = $this->get('/asset/999999999999999999999999/edit/');
        $response->assertRedirect('/asset');
    }

    public function testEditExistingAsset()
    {
        $response = $this->get('/asset/1/edit/');
        $response->assertStatus(200);
    }

    public function testUpdateExistingAsset()
    {   
        $assetAsJSON = $this->createTestAssetAsJSON();
        $newAssetDescription = "Updated description";

        $initialCount = Asset::count();
        $id = Asset::count() + 1;

        $response = $this->post('/asset', $assetAsJSON);
        $response->assertRedirect('/asset/'.$id);
        $this->assertEquals($id, Asset::count());

        $savedAsset = Asset::findOrFail($id);
        $savedAssetOriginalDescription =  $savedAsset->description;

        $assetAsJSON["description"] = $newAssetDescription;

        $response = $this->put('/asset/'.$id, $assetAsJSON);
        $response->assertRedirect('/asset/'.$id);

        $updatedAsset = Asset::findOrFail($id);
        $this->assertFalse($updatedAsset->description == $savedAssetOriginalDescription);
        $this->assertEquals($updatedAsset->description, $newAssetDescription);
    }

    public function testDeleteNonExistantAssetRedirectsToAssetListing()
    {
        $response = $this->get('/asset/999999999999999999999999/delete/');
        $response->assertRedirect('/asset');
    }

    // public function testDeleteExistingAsset()
    // {
    //     $assetAsJSON = $this->createTestAssetAsJSON();
    //     $initialCount = Asset::count();
    //     $id = $initialCount + 1;
    //     $response = $this->post('/asset', $assetAsJSON);
    //     $this->assertEquals($id, Asset::count());

    //     $savedAsset = Asset::findOrFail($id);

    //     $response = $this->get('/asset/'.$savedAsset->id.'/delete/');
    //     $response->assertRedirect('/');
        
    //     $this->assertEquals(Asset::count(), $initialCount);
    // }
    
    /** Future tests **/

    public function testAssetRepairs()
    {
        $this->assertRouteWorks('/assetrepairs/');
    }
    
    public function testComputers()
    {
        $this->assertRouteWorks('/computers/');
    }
    
    public function testComputerTypes()
    {
        $this->assertRouteWorks('/computertypes/');
    }
    
    public function testGroups()
    {
        $this->assertRouteWorks('/groups/');
    }
    
    public function testLocations()
    {
        $this->assertRouteWorks('/locations/');
    }
    
    public function testOutOfServiceCodes()
    {
        $this->assertRouteWorks('/outofservicecodes/');
    }

    public function testVendors()
    {
        $this->assertRouteWorks('/vendors/');
    }

    public function testWarranties()
    {
        $this->assertRouteWorks('/warranties/');
    }

}