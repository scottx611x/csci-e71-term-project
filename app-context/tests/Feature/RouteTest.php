<?php

namespace Tests\Feature;

use App\Asset;
use Tests\TestCase;
use Tests\Unit\AssetDatabaseTest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
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
        $id = $initialCount + 1;

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
        $initialCount = Asset::count();

        $response = $this->get('/asset/999999999999999999999999/delete/');
        $response->assertRedirect('/asset');

        $this->assertEquals($initialCount, Asset::count());
    }
    
    public function testAssetRepairs()
    {
        $route = "/assetrepairs/";
        $this->assertRouteWorks($route);
        $this->assertItemIdExists($route, '1');
    }
    
    public function testComputers()
    {
        $route = "/computer/";
        $this->assertRouteWorks($route);
    }
    
    public function testComputerTypes()
    {
        $route = "/computertype/";
        $this->assertRouteWorks($route);
        $this->assertItemIdExists($route, '1');

    }
    
    public function testGroups()
    {
        $route = "/group/";
        $this->assertRouteWorks($route);
        $this->assertItemIdExists($route, '1');
    }
    
    public function testLocations()
    {
        $route = "/location/";
        $this->assertRouteWorks($route);
        $this->assertItemIdExists($route, '1');
    }
    
    public function testOutOfServiceCodes()
    {
        $route = "/outofservicecode/";
        $this->assertRouteWorks($route);
        $this->assertItemIdExists($route, '1');
    }

    public function testVendors()
    {
        $route = "/vendor/";
        $this->assertRouteWorks($route);
        $this->assertItemIdExists($route, '1');
    }

    public function testWarranties()
    {
        $route = "/warranty/";
        $this->assertRouteWorks($route);
        $this->assertItemIdExists($route, '1');
    }

}