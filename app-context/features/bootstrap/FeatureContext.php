<?php

use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
     * @When I populate and submit the new asset page
     */
    public function thereIsAProperlyPopulatedAssetForm()
    {   
        return $this->AssetDatabaseTest->createTestAssetAsJSON();
    }

    /**
     * @Then I should be redirected to the newly created Asset's detail view
     */
    public function iShouldBeRedirectedToTheNewlyCreatedAssetsDetailView()
    {
        $this->assetPostResponse = $this->TestCase->postData("/asset", $this->thereIsAProperlyPopulatedAssetForm());
    }

    /**
     * @Then the new asset should be in the database
     */
    public function theNewAssetShouldBeInTheDatabase()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be returned to the form with warning
     */
    public function iShouldBeReturnedToTheFormWithWarning()
    {
        throw new PendingException();
    }

    /**
     * @Then the database should be unchanged
     */
    public function theDatabaseShouldBeUnchanged()
    {
        throw new PendingException();
    }
    
    /**
     * @When I visit the asset page without an id
     */
    public function iVisitTheAssetPageWithoutAnId()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see a table of all assets
     */
    public function iShouldSeeATableOfAllAssets()
    {
        throw new PendingException();
    }

    /**
     * @When I visit the asset page with an id
     */
    public function iVisitTheAssetPageWithAnId()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the asset's details
     */
    public function iShouldSeeTheAssetsDetails()
    {
        throw new PendingException();
    }

        /**
     * @Given database has at least one asset
     */
    public function databaseHasAtLeastOneAsset()
    {
        throw new PendingException();
    }

    /**
     * @When I delete an asset
     */
    public function iDeleteAnAsset()
    {
        throw new PendingException();
    }

    /**
     * @Then the asset should be removed
     */
    public function theAssetShouldBeRemoved()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be returned to the homepage
     */
    public function iShouldBeReturnedToTheHomepage()
    {
        throw new PendingException();
    }



    // /**
    //  * @Given there is a properly populated asset form
    //  */
    // public static function thereIsAProperlyPopulatedAssetForm()
    // {
    //     return [
    //             'owner' => 'Mr. Bradley',
    //             'description' => 'Cool Asset',
    //             'purchase_price' => 100,
    //             'purchase_date' => '2017-11-17',
    //             'serial_number' => '9wyf897t23r87t2',
    //             'estimated_life_months' => 36,
    //             'assigned_to' => 'abc',
    //             'assigned_date' => '2017-11-17',
    //             'tag' => 'JAFUfE',
    //             'scheduled_retirement_year' => 2020
    //         ];
    // }

    // /**
    //  * @When I post to the asset url
    //  */
    // public function iPostToTheAssetUrl()
    // {
    //     $this->assetPostResponse = $this->TestCase->postData("/asset", $this::thereIsAProperlyPopulatedAssetForm());
    // }

    // /**
    //  * @Then I should be redirected to the newly created Asset's detail view
    //  */
    // public function iShouldBeRedirectedToTheNewlyCreatedAssetsDetailView()
    // {
    //     $this->assetPostResponse->assertRedirect('/asset/'.($this->initialAssetCount + 1));
    // }

    // /**
    //  * @Then there should be one more Asset than what existed originally
    //  */
    // public function thereShouldBeOneMoreAssetThanWhatExistedOriginally()
    // {
    //     return $this->TestCase->assertEquals($this->initialAssetCount + 1, Asset::count());
    // }
}
