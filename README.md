# CoolsAcademy Project

## table of contents

1. [General Info](#general-info)
2. [Installation](#installation)
2. [Design](#design)
3. [Technologies](#technologies)
4. [Functionalities](#functionalities)
5. [Collaborators](#collaborators)

## General Info
***
A software development group wants to create a web application to manage their online events such as workshops, masterclasses or webinars.

There are two user history: users will be able to see the description of an event, sign up and unsubscribe. They will be able to see the list of events they have signed up for. The administrator must have the tools for the management (CRUD) of the events.

We project there is a Scrum master (Andrea Suarez) and Product Owner (David Sanchez). 

## Installation
$ composer create-project laravel/laravel CoolsAcademy
$ composer require laravel/ui
$ npm install
$ php artisan ui bootstrap --auth
$ npm run watch
$ composer require/fzaninotto/fakers -> (github library) 

## Design
***
First, was made a Sketch with Balsamic and before a design with Figma. It is also responsive. For the web application web we used Bootstrap and Laravel's Blade components. On the home page there is a slider with favorite courses chosen by the administrator.

![Sketch](public\img\figma.png)
![Figma](public\img\sketch.png)

## Technologies
***
As communication technology we use Zoom and Slack; To organizer our project we used Trello and Poker Planning; we used Visual Studio Code with framework Laravel and PHP lenguaje. We created a link in Github repository. We used with database PhpMy Admin, MySQL, MAMB and XAMPP besides Heroku with cloud computing plataform as a service. 

We worked with differents branches and with the merge system.

## Functionalities
***
- On the cover, the application has a slider with the highlighted masterclasses. These are selectable by the administrator.
- On the cover it has a paginated list with all the events ordered from closest to furthest.
- Events include at a minimum: title, date / time, maximum number of participants, description and an image.
- Past events are kept in the list but identifiable as unavailable.
- Users can register to sign up for an event. Once signed up, they cannot do it again.
- When they sign up for an event, they receive an email (business - html) with the link (zoom) where it will take place, as well as remembering the title of the event, the time and the day.
- Users can see on one page the list of events to which they are registered. (My Courses).
- The administrator can CRUD the events (create, read,update and delete).
- When an event is full (maximum number of participants) no one can register.

## Collaborators
***
Andrea Suarez,
Andres Patiño,
Amr Hefny,
David Sanchez,
Gabriela Piñeiro.
