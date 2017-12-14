Feature: Search Assets
  As a School Administrator
  As a School Administrator, I want to search for Items by any of their properties so that I can quickly find particular equipment.

  Scenario: Search by id
    Given that there is a test asset
    When I search for an asset by its id
    Then I should see the asset listed on the search page

  Scenario: Search by description
    Given that there is a test asset
    When I search for the test asset by its description
    Then I should see the asset listed on the search page

  Scenario: Search by funding source
    Given that there is a test asset
    When I search for the test asset by its funding source
    Then I should see the asset listed on the search page

  Scenario: Search by assigned to
    Given that there is a test asset
    When I search for the test asset by its assigned to
    Then I should see the asset listed on the search page

  Scenario: Search by owner
    Given that there is a test asset
    When I search for the test asset by its owner
    Then I should see the asset listed on the search page