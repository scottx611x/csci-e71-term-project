<?php

namespace Tests\Feature;

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
        $response = $this->post('/asset/');
        $response->assertRedirect('/');
    }

    public function testCreateNewAssetRedirectsWithValidPost()
    {
        // TODO: Ask Sri about this behavior
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
        $response->assertRedirect('/asset/345');
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