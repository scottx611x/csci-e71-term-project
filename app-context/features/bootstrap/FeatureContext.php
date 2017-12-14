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
use Tests\Unit\AssetDatabaseTest;

/**
 * Defines application features from the specific context.
 */
class AssetDatabaseTestContext extends AssetDatabaseTest {
    public function setUp(){
        parent::setUp();
    }

    public function postData($uri, $data){
        return parent::post($uri, $data);;
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
        $this->AssetDatabaseTest = new AssetDatabaseTestContext();
        $this->AssetDatabaseTest->setUp();

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
     * @When I post the properly populated asset form to the asset URL
     */
    public function iPostTheProperlyPopulatedAssetFormToTheAssetURL()
    {   
        $this->assetPostResponse = $this->AssetDatabaseTest->postData("/asset", $this->thereIsAProperlyPopulatedAssetForm());
    }

    /**
     * @Then I should be redirected to the newly created Asset's detail view
     */
    public function iShouldBeRedirectedToTheNewlyCreatedAssetsDetailView()
    {
        $id = Asset::count();
        $this->assetPostResponse->assertRedirect("/asset/".$id);
    }

    /**
     * @Then the new asset should be in the database
     */
    public function theNewAssetShouldBeInTheDatabase()
    {
        $id = Asset::count();
        $savedAsset = Asset::findOrFail($id);

        $this->AssetDatabaseTest->assertEquals($this->AssetDatabaseTest->createTestAsset()->owner, $savedAsset->owner);
    }

    
    /**
     * @When I visit the asset page without an id
     */
    public function iVisitTheAssetPageWithoutAnId()
    {
        $this->assetPostResponse = $this->AssetDatabaseTest->get("/asset/");
    }

    /**
     * @Then I should see a table of all assets
     */
    public function iShouldSeeATableOfAllAssets()
    {
        $this->assetPostResponse->assertSee("View Assets");
    }

    /**
     * @When I visit the asset page with an id
     */
    public function iVisitTheAssetPageWithAnId()
    {
        $this->assetPostResponse = $this->AssetDatabaseTest->get("/asset/2");
    }

    /**
     * @Then I should see the asset's details
     */
    public function iShouldSeeTheAssetsDetails()
    {
        $this->assetPostResponse->assertSee("Delete");
    }

    /**
     * @Given database has at least one asset
     */
    public function databaseHasAtLeastOneAsset()
    {
        $this->AssetDatabaseTest->assertTrue(Asset::count() > 0);
    }

    /**
     * @When I delete an asset
     */
    public function iDeleteAnAsset()
    {
        $this->assetPostResponse = $this->AssetDatabaseTest->delete("/asset/1");
    }

    /**
     * @Then the asset should be removed
     */
    public function theAssetShouldBeRemoved()
    {
        $a = Asset::find(1);
        $this->AssetDatabaseTest->assertEquals(0, $a);
    }

    /**
     * @Then I should be returned to the homepage
     */
    public function iShouldBeReturnedToTheHomepage()
    {
        $this->assetPostResponse->assertRedirect("/");
    }
}
