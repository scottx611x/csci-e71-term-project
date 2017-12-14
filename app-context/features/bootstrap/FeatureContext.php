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
        return parent::post($uri, $data);
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
        $this->assetResponse = null;
        $this->testAsset = null;
    }

    public function searchForAsset($data, $query, $searchById = False){
        if ($searchById === True){
            $submit = "submit-search-by-id";
            $_GET['id_search_input'] = $data;
        }
        else {
            $submit = "submit-advanced-search";
            $_GET[$query] = $data;
        }
        $_GET["submitbtn"] = $submit;

        return $this->AssetDatabaseTest->get("/asset/search/");
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
        $this->assetResponse = $this->AssetDatabaseTest->postData("/asset", $this->thereIsAProperlyPopulatedAssetForm());
    }

    /**
     * @Then I should be redirected to the newly created Asset's detail view
     */
    public function iShouldBeRedirectedToTheNewlyCreatedAssetsDetailView()
    {
        $id = Asset::count();
        $this->assetResponse->assertRedirect("/asset/".$id);
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
        $this->assetResponse = $this->AssetDatabaseTest->get("/asset/");
    }

    /**
     * @Then I should see a table of all assets
     */
    public function iShouldSeeATableOfAllAssets()
    {
        $this->assetResponse->assertSee("View Assets");
    }

    /**
     * @When I visit the asset page with an id
     */
    public function iVisitTheAssetPageWithAnId()
    {
        $this->assetResponse = $this->AssetDatabaseTest->get("/asset/2");
    }

    /**
     * @Then I should see the asset's details
     */
    public function iShouldSeeTheAssetsDetails()
    {
        $this->assetResponse->assertSee("Delete");
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
        $this->assetResponse = $this->AssetDatabaseTest->delete("/asset/1");
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
        $this->assetResponse->assertRedirect("/");
    }

    /**
     * @When I search for an asset by its id
     */
    public function iSearchForAnAssetByItsId()
    {
        $this->assetResponse = $this->searchForAsset(
            $this->testAsset->id, 
            "id_search_input", 
            $searchById = true
        );
    }

    /**
     * @Then I should see the asset listed on the search page
     */
    public function iShouldSeeTheAssetListedOnTheSearchPage()
    {
        $this->assetResponse->assertSee($this->testAsset->description);
    }

    /**
     * @Given that there is a test asset
     */
    public function thatThereIsATestAsset()
    {
        $this->testAsset = $this->AssetDatabaseTest->createTestAsset();
        $this->testAsset->save();
    }

    /**
     * @When I search for the test asset by its description
     */
    public function iSearchForTheTestAssetByItsDescription()
    {
        $this->assetResponse = $this->searchForAsset(
            $this->testAsset->description, 
            "description_search_input"
        );
    }

    /**
     * @When I search for the test asset by its funding source
     */
    public function iSearchForTheTestAssetByItsFundingSource()
    {
        $this->assetResponse = $this->searchForAsset(
            $this->testAsset->funding_source, 
            "funding_source_search_input"
        );
    }

    /**
     * @When I search for the test asset by its assigned to
     */
    public function iSearchForTheTestAssetByItsAssignedTo()
    {
        $this->assetResponse = $this->searchForAsset(
            $this->testAsset->assigned_to, 
            "assigned_to_search_input"
        );
    }

    /**
     * @When I search for the test asset by its owner
     */
    public function iSearchForTheTestAssetByItsOwner()
    {
        $this->assetResponse = $this->searchForAsset(
            $this->testAsset->owner, 
            "owner_search_input"
        );
    }
}
