Feature: View Assets
  As a School Administrator
  I want to be able to view an item in the inventory
  So that I can see all the equipment we own.

  Scenario: View All Assets
    Given database has at least one asset
    When I visit the asset page without an id
    Then I should see a table of all assets

  Scenario: View Single Asset
    Given database has at least one asset
    When I visit the asset page with an id
    Then I should see the asset's details