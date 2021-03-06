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
* Resource Specialist - Dana Serini (https://app.xtensio.com/folio/bqjivd9x)
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

Burndown chart: (https://github.com/scottx611x/csci-e71-term-project/blob/master/docker-context/BURNDOWN-SPRINT1.png)

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

Burndown chart: (https://github.com/scottx611x/csci-e71-term-project/blob/master/docker-context/BURNDOWN-SPRINT2.png)

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

Sprint Review 12/04/17
----------------------

e conducted our sprint review on 12/04/2017. Our Stakeholder Mr. Bradley was not able to make it he had to teach classes.  Mr. Bradley sent an email with a list of current inventory items https://drive.google.com/file/d/1Uadf9LPi9kvK50A0wqMSa1nLRXAzVb54/view?usp=sharing. 

Update 12/06/2017
-----------------

We conducted another  Sprint Review with Mr. Bradley present.  Mr. Bradley really liked the system.  After reviewing the system Mr. Bradley wanted to add the fields item quantity, funding source, and federal participation %.  Mr. Bradley also discussed the fields that will be required on the creation of a new asset. We will now perform our Sprint planning for our next sprint.

Testing
-------
We have Behavior tests (app-context/features) and Unit tests (app-context/tests). The Unit folder https://github.com/scottx611x/csci-e71-term-project/tree/master/app-context/tests/Unit is where we are testing individual bits of code to behave as expected. The Beharior folder https://github.com/scottx611x/csci-e71-term-project/tree/master/app-context/features is where we are using the Gherkin-style Behat tests to test whole features of the application. Test output is visible in Travis CI https://travis-ci.org/scottx611x/csci-e71-term-project/builds

Continuous Integration System
-----------------------------
We use Travis CI https://travis-ci.org/scottx611x/csci-e71-term-project/builds as our continuous integration system.  Travis runs our test suite on every commit. Travis passing tests merged to master https://drive.google.com/file/d/11-5Y38W0EJmIFi3Ro9Fufhe_aiU6o80Q/view?usp=sharing.

Product Increment Working Software
----------------------------------
http://aits.srinivasyelamanchili.me/

Deployment
----------
I wasn’t able to get the continuous delivery system finished.  I worked on it for three days and realized I need more experience with Docker.   I have concluded that our Docker container that we created to optimize our tests needs to be redesigned to deploy to an AWS Elastic Beanstalk Environment.  We currently have our web server and database in the same container, and they need to be separated out.  Our production environment build is continuously deploying to AWS using Travis.  After Elastic Beanstalk receives our build, it tries to create an application using Docker containers.  AWS Elastic Beanstalk is erroring out when it tries to create our build.

Here is our JSON file https://github.com/scottx611x/csci-e71-term-project/blob/master/Dockerrun.aws.json for AWS deployment, our code to deploy to AWS and run tests https://github.com/scottx611x/csci-e71-term-project/blob/master/.travis.yml and our Elastic Beanstalk Environment https://drive.google.com/file/d/1yrATro5b3R6UeuT9F-1ld-aGqQe_iP6C/view?usp=sharing.

Sprint 3
========
Velocity estimate: 14 (Based on Sprint 1 + 2)

Burndown chart: (https://github.com/scottx611x/csci-e71-term-project/blob/master/docker-context/BURNDOWN-SPRINT3.png)

Goal: To make requested changes and implement search and authentication

Daily Scrum 12/13/17
--------------------
"Daily Scrum"s are held on M-W-F schedule

What did we do since last daily scrum? 
 * Scott - Worked on CD system/AWS deployment and integrating Sri's changes
 * Rob - Research on containers, fleshing out user personas
 * Sri - Implemented search and authentication, and UI improvements
 * Nick - Researched CSV export

What will we do in next period?
In mobbing session (everyone), flesh out BDD tests to capture desired functionality, discuss and improve search UI. Because we have time, added CSV reporting item into sprint backlog (Nick).

Impediments?
Scheduling meetings early in week was difficult due to very different schedules and end-of-year outside activities. We resolved to schedule meetings daily to catch up. We discussed our burndown charts, where items were not getting "done" until late in the sprint. We've been working largely on many stories at once and wrapping them up at once. While this works in the sprint, we can see how this might break down (e.g. a last minute illness) thus delaying all work. In the future, we will work on and complete sprint tasks more in sequence, rather than in parallel, to have a steadier burndown.

Mobbing Video
---------
https://drive.google.com/file/d/1Gs4ZejX9P2rawvHDS9183wCAYCzsTlwW/view?usp=sharing

Sprint 3 Backlog:
---------
https://github.com/scottx611x/csci-e71-term-project/milestone/4?closed=1

Testing
-------
We have Behavior tests (app-context/features) and Unit tests (app-context/tests). The Unit folder https://github.com/scottx611x/csci-e71-term-project/tree/master/app-context/tests/Unit is where we are testing individual bits of code to behave as expected. The Beharior folder https://github.com/scottx611x/csci-e71-term-project/tree/master/app-context/features is where we are using the Gherkin-style Behat tests to test whole features of the application. Test output is visible in Travis CI https://travis-ci.org/scottx611x/csci-e71-term-project/builds

Rehearse Sprint Review 12/17/17
-------------------------------

https://drive.google.com/file/d/1-rDQvvGb4f8iNkbNnQuxcsCoMuL5CTxt/view?usp=sharing

Product Increment Working Software
----------------------------------
http://aits.scott-ouellette.com/

Continuous Integration System
------------------------------
Travis passing tests merged to master https://drive.google.com/file/d/1z_4SUyw8k-TM64scDa6bj5Edhkw3pqI7/view?usp=sharing.

Continuous Deployment
---------------------
https://drive.google.com/file/d/1RoWFTpQhWS78rF3XUjOzIJoCJeyq5mjx/view?usp=sharing
