Feature: Create Assets
  In order keep our users happy
  Users should be able to create new assets

  Scenario: Create New Asset
    Given there is a properly populated asset form
    When I post to the asset url
    Then I should be redirected to the newly created Asset's detail view
    And there should be one more Asset than what existed originally