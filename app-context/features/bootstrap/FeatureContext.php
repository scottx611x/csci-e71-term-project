<?php

use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

use App\Asset;
use Tests\TestCase;
use Tests\Unit\AssetDatabaseTest;

/**
 * Defines application features from the specific context.
 */
class TestCaseContext extends TestCase {
    public function setUp(){
        parent::setUp();
    }

    public function postData($uri, $data){
        return parent::post($uri, $data);;
    }
}

class AssetDatabaseTestContext extends AssetDatabaseTest {
    public function setUp(){
        parent::setUp();
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

        $this->AssetDatabaseTest = new AssetDatabaseTestContext();
        $this->AssetDatabaseTest->setup();

        $this->initialAssetCount = Asset::count();
        $this->assetPostResponse = null;
    }

    /**
     * @Given there is a properly populated asset form
     */
    public function thereIsAProperlyPopulatedAssetForm()
    {   
        return $this->AssetDatabaseTest->createTestAssetAsJSON();
    }

    /**
     * @When I post to the asset url
     */
    public function iPostToTheAssetUrl()
    {
        $this->assetPostResponse = $this->TestCase->postData("/asset", $this->thereIsAProperlyPopulatedAssetForm());
    }

    /**
     * @Then I should be redirected to the newly created Asset's detail view
     */
    public function iShouldBeRedirectedToTheNewlyCreatedAssetsDetailView()
    {
        $this->assetPostResponse->assertRedirect('/asset/'.($this->initialAssetCount + 1));
    }

    /**
     * @Then there should be one more Asset than what existed originally
     */
    public function thereShouldBeOneMoreAssetThanWhatExistedOriginally()
    {
        return $this->TestCase->assertEquals($this->initialAssetCount + 1, Asset::count());
    }
}
