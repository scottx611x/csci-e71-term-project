<?php

namespace Tests;

use App\Asset;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

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
        $asset->computer_type_id = 1;
        $asset->memory = "4GB";
        $asset->model = "Cool Model";
        $asset->operating_system = "Ubuntu 16.04 LTS";
        $asset->mac_address = "1A:2A:3A:4A:5A:6A";
        return json_decode(json_encode($asset), true);
    }
}
