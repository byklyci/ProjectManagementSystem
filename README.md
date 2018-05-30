# ProjectManagementSystem
* This project is about implementing the project management system.
* CMPE 321 : Introduction to Database Systems

## About The Project
* This project is about implementing the project management system.There should be users and admins for this system.
* 1)Administrators can:
* Add/Edit/Delete Project Managers
* Add/Edit/Delete Projects (a project has name, start date, estimatedtotal task-days)
* Add/Edit/Delete Employees (employees do not login to the system)
* 2)Project Managers can:
* Add/Edit/Delete Tasks (a task has start date, no of days it takes, employee(s)working on)

## Implementation Details
* In my project, I select PHP language. I used relational database MySQL and the final product is web user interface.

## Database
* This is the ER ralation diagram for my project.
* The project management system includes these table inside it:
* Admins
* Pmanagers
* Employees
* Projects
* Tasks
## Interface
In this part the system will be shown with the screenshots and the way
of how the program works. You can easily understood when looking the
pictures about the general idea behind the implementation.The other figures
will for each operations screenshots.

## Conclusions & Assessment
This project is very helpful for me to learn php and sql so tahk you for
the project. For this project, i used session control to authorize admins and
make differences from project manager. An administrator cant access to a
users page where at the same time a user cant also access to admins page.
At the beginning of each page, there is an if statement which checks whether
in that session an admin or a user is logged in. To keep the login info, i
stored username at the login page and used session start to keep that info
at each page. At the login screen, a user or an admin can choose from a
dropdown list between admin and user, and if their login info is correct, they
are directed to different pages. All user operations are available at user page
and all admin operations are available at admin page.
