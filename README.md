<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
    <h2>Laravel 6 REST API  Authentication, Email Verification and Task Scheduling  </h2>
</p>
<h4>Packages used</h4>
<ul>
<li>"tymon/jwt-auth": "^1.0.0-rc.2"</li>
</ul>
<h4>What does it do</h4>
<ul>
<li>Email Verification via API</li>
    <li>Authentication via API</li>
    <li>Add,delete and update users(students) via API</li>
    <li>enroll into courses</li>
    <li>show enrolled courses</li>
    <li>comment on courses</li>
    <li>Task Scheduling(notify:students who not logged in for month)</li>
</ul>
<h4>Installion && Setup</h4>
<li>Clone the repository</li>
<li>composer update &&npm install </li>
<li>cp .env.example .env gedit .env</li>
<li>Sign up at mailtrap.io &&Place the settings in the demo inbox in your .env file</li>
<li>Create the database and enter the information in the .env file</li>
<li>php artisan key:generate</li>
<li>php artisan jwt:secret</li>
<li>php artisan migrate:fresh</li>
<li>php artisan migrate:fresh</li>
<li>Start Laravel server php artisan serve --port=8000</li>
<h4>EndPoints<h4>
<ul>
    <li><h5>Registeration</h5>http://127.0.0.1:8000/api/register</li>
    <li><h5>Logout</h5>http://127.0.0.1:8000/api/logout</li>
    <li><h5>Login</h5>http://127.0.0.1:8000/api/login</li>
    <li><h5>Add Comment</h5>http://127.0.0.1:8000/api/courses/{id}/comment</li>
    <li><h5>Enroll Course</h5>http://127.0.0.1:8000/api/courses/{id}/enroll</li>
    <li><h5>Show enrolled Courses</h5>http://127.0.0.1:8000/api/courses</li>
</ul>


