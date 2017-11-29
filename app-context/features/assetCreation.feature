Feature: Create Assets
  As a School Administrator
  I want to be able to enter an item into the inventory
  so that I can have a record of our equipment.

  Scenario: Create New Asset
    When I populate and submit the new asset page
    Then I should be redirected to the newly created Asset's detail view
    And the new asset should be in the database

  Scenario: Owner Missing
    Whene I populate the form without owner and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged

  Scenario: Device Location Missing
    Whene I populate the form without device location and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged

  Scenario: Purchase Price Missing
    Whene I populate the form without purchase price and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged

  Scenario: Purchase Date Missing
    Whene I populate the form without purchase date and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged

  Scenario: Serial Number Missing
    Whene I populate the form without serial number and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged
  
  Scenario: Estimated Life Months Missing
    Whene I populate the form without estimated life months and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged

  Scenario: Assigned To Missing
    Whene I populate the form without assigned to and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged

  Scenario: Assigned Date Missing
    Whene I populate the form without assigned date and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged

  Scenario: Assigned Date Missing
    Whene I populate the form without assigned date and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged
  
  Scenario: Tag Missing
    Whene I populate the form without tag and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged

  Scenario: Scheduled Retirement Year Missing
    Whene I populate the form without scheduled retirement year and submit the new asset page
    Then I should be returned to the form with warning
    And the database should be unchanged

