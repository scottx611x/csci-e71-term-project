<?php

use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
#This will be needed if you require "behat/mink-selenium2-driver"
#use Behat\Mink\Driver\Selenium2Driver;
use Behat\MinkExtension\Context\MinkContext;

use App\Asset;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class TestCaseContext extends TestCase {
    public function setUp(){
        TestCase::setUp();
    }
    public function postData($uri, $data){
        return TestCase::post($uri, $data);;
    }
}

class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {   
        $this->TestCase = new TestCaseContext();
        $this->TestCase->setUp();
        $this->initialAssetCount = Asset::count();
    }

    /**
     * @Given there is a properly populated asset form
     */
    public static function thereIsAProperlyPopulatedAssetForm()
    {
        return [
                'owner' => 'Mr. Bradley',
                'description' => 'Cool Asset',
                'purchase_price' => 100,
                'purchase_date' => '2017-11-17',
                'serial_number' => '9wyf897t23r87t2',
                'estimated_life_months' => 36,
                'assigned_to' => 'abc',
                'assigned_date' => '2017-11-17',
                'tag' => 'JAFUfE',
                'scheduled_retirement_year' => 2020
            ];
    }

    /**
     * @When I post to the :arg1 url
     */
    public function iPostToTheAssetUrl()
    {
        $response = $this->TestCase->postData("/asset", $this::thereIsAProperlyPopulatedAssetForm());
        return $response;
    }

    /**
     * @Then I should be redirected to the newly created Asset's detail view
     */
    public function iShouldBeRedirectedToTheNewlyCreatedAssetsDetailView()
    {
        $this->iPostToTheAssetUrl()->assertRedirect('/asset/'.($this->initialAssetCount + 2));

    }

    /**
     * @Then there should be one more Asset than what existed originally
     */
    public function thereShouldBeOneMoreAssetThanWhatExistedOriginally()
    {
        return $this->TestCase->assertEquals($this->initialAssetCount + 2, Asset::count());
    }
}
