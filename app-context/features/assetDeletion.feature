Feature: Delete Assets
  As a School Administrator
  I want to be able to delete an asset from the inventory
  So that I can remove errors or remove entries that are no longer relevant.

  Scenario: Delete Existing Assets
    Given database has at least one asset
    When I delete an asset
    Then the asset should be removed
    And I should be returned to the homepage
