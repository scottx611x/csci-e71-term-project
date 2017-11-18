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
    
    public function testasset()
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