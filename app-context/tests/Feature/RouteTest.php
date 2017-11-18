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

        if ($detailView)
        {
            $response = $this->get($routeName."1");
            $response->assertStatus(200);
        }
    }
    
    public function testAssets()
    {
        $this->assertRouteWorks('/asset/');
    }
    
    public function testAssetRepairs()
    {
        $this->assertRouteWorks('/assetrepairs/');
    }
    
    public function testComputers()
    {
        $this->assertRouteWorks('/computers/', $detailView = False);
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