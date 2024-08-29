
-------------------------------------------------------------------------------------------------------------------------------------

### Project: ToucanTech Task

-------------------------------------------------------------------------------------------------------------------------------------

# Author - Ravi Kiran Allipilli

-------------------------------------------------------------------------------------------------------------------------------------

## Overview
This project is a School Member Management System built using PHP. It allows users to view school member counts, select schools, and download a CSV report listing members, their email addresses, and their respective schools. The application features an interface for selecting schools and generating a CSV file based on the selected schools.

-------------------------------------------------------------------------------------------------------------------------------------

## Features
● View School Member Counts: Displays a table of schools and the number of members in each school.
● Select Schools: Use checkboxes to select one or more schools.
● Generate CSV Report: Download a CSV report listing members, their email addresses, and their respective schools based on selected schools.

-------------------------------------------------------------------------------------------------------------------------------------

## Technology Stack
● Backend: PHP
● Frontend: HTML, CSS, JavaScript, jQuery
● Styling: Bootstrap 4
● Databases: MYSQL with PDO

-------------------------------------------------------------------------------------------------------------------------------------

## Installation
Prerequisites
● PHP >= 8.0
● A web server (e.g., Apache or Nginx) - I used Wampp
● A database (e.g., MySQL) >= 8.3
● Database Engine = InnoDB

-------------------------------------------------------------------------------------------------------------------------------------

## Setup
Clone the Repository
 -- bash
git clone https://github.com/raviallipilli/toucan-project
cd toucan-project

-------------------------------------------------------------------------------------------------------------------------------------

## Configure local environment
● Step1: Setup your localhost server example: toucan.localhost
● Step2: Add a Virtual Host in vhosts file located at 'C:\wamp64\bin\apache\apache2.4.59\conf\extra\httpd-vhosts'
● Step 3: Example VirtualHost configuration: 
                <VirtualHost *:80>
                ServerName toucan.localhost
                ServerAlias toucan.localhost
                DocumentRoot "C:/wamp64/www/toucan-project"
                <Directory "C:/wamp64/www/toucan-project/">
                DirectoryIndex index.php
                    Options +Indexes +Includes +FollowSymLinks +MultiViews
                    AllowOverride All
                    Require local
                </Directory>
                </VirtualHost>
● Step4: Configure server path at 'C:\Windows\System32\drivers\etc\hosts'
● Step 5: Example setup in hosts file:
                127.0.0.1 toucan.localhost
● Step6: Start your server wampp/xampp/nginx or docker
● Step7: Access your localhost server at 'http://toucan.localhost' to complete the setup

-------------------------------------------------------------------------------------------------------------------------------------

## Configure Environment
1. Create a database and update the database credentials in the config/db.php file.
2. Import the provided SQL schema files into your database to set up the necessary tables: /sql/toucan-tech.sql

-------------------------------------------------------------------------------------------------------------------------------------

## Set Up Application
1. Ensure your web server is properly configured to serve PHP files from the project directory.
2. Place the project files in your web server's document root.

-------------------------------------------------------------------------------------------------------------------------------------

## Usage
# Start the Development Server
● Ensure that your web server is running and configured to serve the project files. Navigate to http://toucan.localhost (or your configured URL) to access the application.

-------------------------------------------------------------------------------------------------------------------------------------

## 1. TASK 1: file - /tasks/task1.php
● SQL select statement to retrieve all duplicate email addresses for the same UserRefID where the user is alive and at least one of the emails is a default email address. 

-------------------------------------------------------------------------------------------------------------------------------------

## Task 2: file - /tasks/task2.php
● Using the profiles and emails tables from Task 1 above write down the HTML, JavaScript, and PHP code for the following: 
● A single webpage that has an input field for name and a button called search ● Clicking the search button should call a PHP function using ajax 
● Show the Firstname, LastName and email address on the page for any matching results

-------------------------------------------------------------------------------------------------------------------------------------

## Task 3: file - /tasks/task3.php
● Code to print the numbers from 1 to 100. 
● For any number that is a multiple of three print “Toucan”. 
●  For the multiples of five print "Tech”.
● For numbers that are multiples of both three and five print “ToucanTech” 

-------------------------------------------------------------------------------------------------------------------------------------

## Task 4: file - /tasks/task4.php
● This file doesnt have any view, it provides a code review, best practices implemented and a detailed documentation with comments, the below are immplemented:
1. The 9 missing comments in the function to explain the logic/what the code is doing - provided by replacing with comments
2. The description at the top that explains what the function does - addressedd at the top of the file
3. Describe what each of the return values means - also described immediately after the first description 

-------------------------------------------------------------------------------------------------------------------------------------

## Task 5:
## 5a - file - /tasks/task5a.php
    ● Web application:
    1.	Allows users to add a new member with "Name", "Email Address", and "School" (selected from a list).
    2.	Displays all members for a selected school.


## 5b - file - /tasks/task5b.php
    ● Extended the web application with these features:
    A. Add a link that downloads a CSV report listing each member, their email address, and school 
    B. Shows both table / bar chart that displays each school and the number of members in that school 
    C. Also extended the application to include a country field for each school and with simple search & displaying data by country 


## 5c - file - /tasks/task5c.php
    ● SQl query to that lists all the schools to which no members are assigned.

-------------------------------------------------------------------------------------------------------------------------------------

# Code Overview
● Best Practices: The code adheres to best practices for software development.
● Security: All necessary security checks and vulnerability mitigations are implemented.
● Maintainability: The code is designed to be maintainable, extensible, and easy to understand.
● Documentation: The project is fully documented with detailed comments and instructions.
● Comments: To generate comments, I used the DocBlocker extension in Visual Studio Code. Other extensions, such as those enforcing PSR-12 standards, can also be utilized for consistent and detailed documentation.

-------------------------------------------------------------------------------------------------------------------------------------

## Note
Composer was not used in this project. However, the project is structured in a way that would facilitate the integration of Composer in the future. As no third-party packages were utilized in this project, a dependency manager was not required. The project is designed to be easily extendable and can incorporate a dependency manager, such as Composer, should the need arise.

-------------------------------------------------------------------------------------------------------------------------------------

## Conclusion
The project is fully documented with comments and instructions where necessary. For detailed information on specific features and codebase, refer to the codebase and comments within the files.

-----------------------------------------------------------END TASK------------------------------------------------------------------