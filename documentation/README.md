Mosque Management System
Project Overview
The Mosque Management System is a web application developed using the Laravel framework. It aims to enhance the management and operational efficiency of mosques by providing essential features accessible to both users and administrators. The application includes standard pages such as Home, About, Events, Sermons, Testimonials, Login, Register, and Contact, along with dedicated dashboards for administrative tasks.

Setting Up the Application
Clone the Repository
To set up the application, start by cloning the repository from GitHub:

git clone https://github.com/MaryamMuzzammil/PHP_laravel_Projects.git
cd mosque-management-system
Install Dependencies
Install the necessary dependencies using Composer:

composer install
Environment Configuration
Copy the example environment file and set up your environment variables:



cp .env.example .env
php artisan key:generate
Edit the .env file to configure your database and mail settings.

Database
Create a MySQL database named final_project.

Functional Requirements
Home Page: Provides an overview of mosque activities, recent events, and announcements.
Events: Lists upcoming and past events with detailed descriptions and registration options.
Testimonials: Displays testimonials from users and community members.
Login Page: Allows users and administrators to access their respective dashboards.
Register Page: Enables users to create accounts for donations and access to other features described in the user section.
Contact: Includes a contact form for inquiries and feedback.
To see the email feature, add your email and app password in the .env file:
makefile

MAIL_USERNAME=youremail@gmail.com
MAIL_PASSWORD=yourapppassword
About Page (static): Displays information about the mosque's history, mission, leadership, and other relevant details.
Sermons (static): Provides access to recorded sermons and related resources.
Dashboard
Admin Dashboard
Accessed via the login button on the top navigation bar using:

Email: admin@gmail.com
Password: admin123
Features of the Admin Dashboard include:

Roles and Permissions Management: Admins can create, update, delete roles, assign permissions, and manage user access.
User Management: Admins can create, update, and delete users with specific roles.
Blogs: Admins can manage blog posts created by themselves and users.
Testimonials: Admins can manage testimonials created by themselves and users.
Events: Admins can manage upcoming and past events.
Donations: Admins can manage donation records.
Settings: Admins can change their password.
User Dashboard
Accessed via the login button using:

Email: user@gmail.com
Password: user123

Features available to users include:

Blogs: Users can create, view, edit, and delete their own blog posts.
Testimonials: Users can create, view, edit, and delete their own testimonials.
Events: Users can view upcoming events managed by admins.
Donations: Users can create, view, edit, and delete their own donation records.
Settings: Users can change their password.
Setting Up the Application
Database: Create a MySQL database named final_project.
Migrations: Execute all migrations and set up the database schema using:

php artisan migrate
Seed Data: Populate the database with initial data using:

•	Php artisan migrate 
•	php artisan db:seed --class=Roles 
•	php artisan db:seed --class=PermissionsSeeder 
•	php artisan db:seed --class=PermissionRolesSeeder
•	php artisan db:seed --class=UsersSeeder
•	php artisan db:seed --class=TestimonialsSeeder
•	php artisan db:seed --class=BlogsSeeder  
•	php artisan db:seed --class=eventsSeeder  
php artisan db:seed --class=DonationSeeder

Conclusion
The Mosque Management System provides a robust solution for mosques to streamline operations and effectively engage with their community. Leveraging Laravel ensures scalability, security, and ease of maintenance. The distinct dashboards for admins and users cater to specific needs, facilitating efficient management of content, events, donations, and community interactions.

