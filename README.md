# csci-e71-term-project [![Build Status](https://travis-ci.org/scottx611x/csci-e71-term-project.svg?branch=master)](https://travis-ci.org/scottx611x/csci-e71-term-project) [![codecov](https://codecov.io/gh/scottx611x/csci-e71-term-project/branch/master/graph/badge.svg)](https://codecov.io/gh/scottx611x/csci-e71-term-project)

Scrum Avengers (Group 3)
========================

[**Local Development Docs**](https://github.com/scottx611x/csci-e71-term-project/blob/master/SETUP.md)

Scrum Team
----------
* Rob Dornberger (Product Owner, Developer)
* Sri Yelamanchili  (Developer)
* Nicholas Bauer (Scrummaster, Developer)
* Scott Ouellette (Developer)

Project Name
------------
Alpine Inventory Tracking System

Vision
------
Near: "Automate inventory tracking system for Alpine Academy in 3 months"

Far: "Eliminate overhead of managing educational equipment"

Stakeholders
------------
* School Administrators - Michael Bradley, Vice Principal, Alpine Academy (https://app.xtensio.com/folio/m723zhos)
* Administrative Assistant
* IT Personnel

Product Backlog
---------------
[View Backlog](https://github.com/scottx611x/csci-e71-term-project/projects/1)

Product Backlog Ordering Rationale
----------------------------------
The core functions are manipulating the inventory items, so these are the most important to get done if we ran out of time. Searching and reporting are extremely useful add-ons, but depend on the database existing first. Having non-administrator accounts would be a nice addition for a multi-user environment, but could be dispensed with if necessary.

Definition of Ready
-------------------
When a produt backlog item:
 * has a title
 * has an opening sentence
 * has details
 * has been estimated
 * has user acceptance criteria
 
 Definition of Done
-------------------
 * works in the IE11 or Edge browsers in cloud
 * has tests
 * good test coverage
 * peer reviewed
 * committed

Relative Size Estimating Activity
---------------------------------
 
All developers, and only developers, participated in relative size estimating. We accomplished this activity by doing a planning poker-like activity over a group video chat session

Sprint 1
========
Velocity estimate: 14.3 (Total points / 3 sprints)

Burndown chart: (https://github.com/scottx611x/csci-e71-term-project/blob/master/BURNDOWN-SPRINT1.png)

Goal: To add and view items in the application

Daily Scrum 11/17/17
--------------------
"Daily Scrum"s are held on M-W-F schedule

What did we do since last daily scrum? 
 * Scott - set up and integrated development and production environment infrastructure for all of us
 * Rob - set up local development environment, created PHP UI pages, communicated with stakeholder
 * Sri - set up local development environment, wired up database and basic routing
 * Nick - set up local development environment, kept team on track for success

What will we do in next period?
Together, we will mob to create our tests and finish the add and view pages with full functionality.

Impediments?
Our major impediments have been communication, figuring out how to get set up, and working as a team. This made for a slow start, but we've figured out how to get through them and the way should be clear to completing our goals for the sprint. Checking in to Slack regularly and setting up meeting times in advance with expectation of attending have addressed these issues.

Mobbing Video
---------
https://drive.google.com/file/d/1H0U9OEZrssp668rpRPh5tOKXA-IcIFV2/view?usp=sharing

Sprint 1 Backlog:
---------
https://github.com/scottx611x/csci-e71-term-project/milestone/2?closed=1

Testing
-------
We have Feature tests and Unit tests (app-context/tests). The Feature folder https://github.com/scottx611x/csci-e71-term-project/tree/master/app-context/tests/Feature is how we are staring with our BDD testing--testing large operations at a high-level (e.g. HTTP requests integrated with database handling). The Unit folder https://github.com/scottx611x/csci-e71-term-project/tree/master/app-context/tests/Unit is where we are testing individual bits of code to behave as expected. As we are all getting familiar with this new framework, and understanding its full scope of testing abilities, we've become aware of aspects of code that could be conducted test-first that we didn't realize and will adapt next sprint. We are also going to test out a BDD framework for Laravel in the next sprint that allows Cucumber-like semantics for Feature tests. Test output is visible in Travis CI https://travis-ci.org/scottx611x/csci-e71-term-project/builds

Sprint Review 11/19/17
----------------------
We conducted our sprint review on 11/19/2017.  Our Stakeholder Mr. Bradley was present for the Sprint Review.  Using Mr. Bradley’s suggestions, we updated our product backlog.


Sprint 2
========
Velocity estimate: 14 (Based on Sprint 1)

Burndown chart: (https://github.com/scottx611x/csci-e71-term-project/blob/master/BURNDOWN-SPRINT2.png)

Goal: More user friendly UI, Add additional fields to Asset, Be able to Modify and Delete Assets from the UI.

Daily Scrum 11/27/17
--------------------
"Daily Scrum"s are held on M-W-F schedule

What did we do since last daily scrum? 
 * Scott - Set up BDD and integrated with CI
 * Rob - UI design work
 * Sri - UI design work, delete and edit functionality
 * Nick - Wrote tests, looked into refactoring Controllers

What will we do in next period?
Figure out and write BDD, unit tests during mobbing for modify and delete and code. Offline/separate: set up Dusk for testing browser views and actions (Nick), set up AWS continuous deployment (Rob), refined design to industry standards (Sri), improve BDD efficiency (Scott).

Impediments?
Installing and learning a new part of a framework adds a week of downtime. Unfortunately, this is a necessary part of the learning curve, and allows us to gain important new capabilities. If we had a longer-term project, these costs would be much more reduced over time.

Mobbing Video
---------
https://drive.google.com/file/d/1rOkNaL9KEAfBW70B4MxFduuAybwS1RVz/view?usp=sharing

Sprint 2 Backlog:
---------
https://github.com/scottx611x/csci-e71-term-project/milestone/3?closed=1

Testing
-------
We have Behavior tests (app-context/features) and Unit tests (app-context/tests). The Unit folder https://github.com/scottx611x/csci-e71-term-project/tree/master/app-context/tests/Unit is where we are testing individual bits of code to behave as expected. The Beharior folder https://github.com/scottx611x/csci-e71-term-project/tree/master/app-context/features is where we are using the Gherkin-style Behat tests to test whole features of the application. Test output is visible in Travis CI https://travis-ci.org/scottx611x/csci-e71-term-project/builds

Deployment
----------
TODO: Document
