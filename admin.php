<?php

// Error Reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['loggedin']))
{
    // Store the page that I'm currently on in the session
    $_SESSION['page'] = $_SERVER['REQUEST_URI'];

    // Redirect to login
    header("location: login.php");
}

// require will look for the file, if it doesn't get it, it will terminate
require ($_SERVER['HOME'].'/someFolder/dbcreds.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>Admin Page</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/guestbook.png">
</head>
<body>
<!--Header -->
<div class="jumbotron jumbotron-fluid text-white text-center">
    <div class="container">
        <h1 class="display-4">Sign My Guestbook!</h1>
        <a type="button" class="btn btn-secondary btn-lg float-right" href="logout.php">Log Out</a>
    </div>
</div>

<!-- Form -->
<div class="container">

<h1>Guest's Summary</h1>
    <table id="guest-table" class="display cell-border compact stripe">
        <thead>
            <tr>
                <td>Guest ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Job Title</td>
                <td>Company</td>
                <td>LinkedIn</td>
                <td>Email</td>
                <td>Meet Type</td>
                <td>Guest Input Date</td>
            </tr>
        </thead>

        <tbody>
            <?php
                $sql = "SELECT * FROM guestbook";
                $result = mysqli_query($cnxn, $sql);

                foreach($result as $row)
                {
                    $guest_id = $row['guest_id'];
                    $firstname = $row['fname'];
                    $lastname = $row['lname'];
                    $jobtitle = $row['jobtitle'];
                    $company = $row['company'];
                    $linkedin = $row['linkedin'];
                    $email = $row['email'];
                    $meettype = $row['meettype'];
                    $guestdate = date("M d, Y", strtotime($row['guest_date']));

                    echo "<tr>";
                    echo "<td>$guest_id</td>";
                    echo "<td>$firstname</td>";
                    echo "<td>$lastname</td>";
                    echo "<td>$jobtitle</td>";
                    echo "<td>$company</td>";
                    echo "<td>$linkedin</td>";
                    echo "<td>$email</td>";
                    echo "<td>$meettype</td>";
                    echo "<td>$guestdate</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="https://safal.greenriverdev.com/sdev305/guestbook/" role="button" style="margin-bottom: 10px">Go to Guestbook Form</a>
</div>

<!-- Footer -->
<nav class="navbar">
    <a class="navbar-brand" href="#">Footer</a>
</nav>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="js/scripts.js"></script>

<script>
    $('#guest-table').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
</script>

</body>
</html>
