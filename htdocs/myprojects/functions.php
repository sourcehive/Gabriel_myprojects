<?php

session_start();
$link = mysqli_connect("localhost", "root", "", "twitter1");

if (mysqli_connect_error()) {

 print_r(mysqli_connect_error());
exit();

}

if ($_GET['function'] == "Logout") {


session_unset();


}




?>