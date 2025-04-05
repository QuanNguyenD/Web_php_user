<?php

/***************Index************* */

$router->map("GET|POST","/home/?","IndexController#process");
$router->map("GET|POST","/about/?","AboutController#process");
$router->map("GET|POST","/service/?","ServiceController#process");
$router->map("GET|POST","/doctors/?","DoctorsController#process");
$router->map("GET|POST","/contact/?","ContactController#process");
$router->map("GET|POST","/login/?", "LoginController#process");

$router->map("GET|POST","/register/?", "RegisterController#process");
// Logout
$router->map("GET", "/logout/?", "LogoutController#process");

//service_detail

$router->map("GET","/services/?[i:id]/?","ServiceDetailController#process");
// PATIENT Booking
$router->map('GET|DELETE|PUT','/booking/?','BookingController#process');




?>