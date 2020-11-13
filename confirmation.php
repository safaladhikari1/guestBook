<?php

// Error Reporting Turned On
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Redirect if form has not been submitted
// header function sends the user to another page
if(empty($_POST))
{
    header("location:index.php");
}

$page_title = "Thank you";
include('includes/header.html');
require ('includes/guestDbCreds.php');

?>

<?php
    $firstname = $_POST['fname'];
    echo "<h2>" . "Thank you! " . $firstname . "</h2>";

    $lastname = $_POST['lname'];
    $jobtitle = $_POST['lname'];
    $company = $_POST['company'];
    $linkedin = $_POST['linkedin'];
    $email = $_POST['email'];
    $meettype = $_POST['meettype'];

    //Save order to database

    $sql = "INSERT INTO guestbook
    (`fname`, `lname`, `jobtitle`, `company`, `linkedin`, `email`, `meettype`)
    
    VALUES
    (
        '$firstname',
        '$lastname',
        '$jobtitle',
        '$company',
        '$linkedin',
        '$email',
        '$meettype'
    )";

    $success = mysqli_query($cnxn, $sql);

    if(!$success)
    {
        echo "<p>Sorry..something went wrong.</p>";
        return;
    }

    include('includes/footer.html');
?>


