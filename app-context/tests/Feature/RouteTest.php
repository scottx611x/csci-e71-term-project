<?php

namespace Tests\Feature;

use App\Asset;
use Tests\TestCase;
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

    public function testCreateNewAssetRedirectsWithInvalidPost()
    {
        // TODO: Ask Sri about this behavior
        $initialCount = Asset::count();
        $response = $this->post('/asset/');
        $response->assertRedirect('/');
        $this->assertEquals($initialCount, Asset::count());
    }

    public function testCreateNewAssetRedirectsWithValidPost()
    {
        // TODO: Ask Sri about this behavior
        $initialCount = Asset::count();
        $response = $this->post(
            '/asset', 
            [
                'owner' => 'Mr. Bradley',
                'purchase_price' => 100,
                'purchase_date' => '2017/11/17',
                'serial_number' => '9wyf897t23r87t2',
                'estimated_life_months' => 36,
                'assigned_to' => 'abc',
                'assigned_date' => '2017/11/17',
                'tag' => 'JAFUfE',
                'scheduled_retirement_year' => 2020
            ]
        );
        $response->assertRedirect('/asset/'.($initialCount + 1));
        $this->assertEquals($initialCount + 1, Asset::count());
    }
    
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