Feature: Asset Viewing
  In order to make the tracking of inventory items easier
  As a user
  I want to be able to view these assets.

  Scenario: View an existing Asset
    Given I am on the homepage
    When I c
    Then the url should match "/example"
    And I should see "It works!"
    And I should be able to do something with Laravel