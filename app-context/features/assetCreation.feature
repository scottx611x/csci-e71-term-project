Feature: Create Assets
  As a School Administrator
  I want to be able to enter an item into the inventory
  so that I can have a record of our equipment.

  Scenario: Create New Asset
    Given there is a properly populated asset form
    When I post the properly populated asset form to the asset URL
    Then I should be redirected to the newly created Asset's detail view
    And the new asset should be in the database
