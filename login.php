<?php

// Error Reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$err = false;
$username = "";

// If the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Get the username and password
    $username = strtolower(trim($_POST['username']));
    $password = trim($_POST['password']);

    // If they are correct
    // Actual username and password are stored in a separate file
    // Should be moved to home directory ABOVE public_html
    require ('login-creds.php');

    if($username == $adminUser && $password == $adminPassword)
    {
        $_SESSION['loggedin'] = true;

        // Redirect to page the user was on, or index page
        if(!isset($_SESSION['page']))
        {
            $_SESSION['page'] = 'admin.php';
        }

        header("location: " . $_SESSION['page']);
    }

    // Set an error flag
    $err = true;
}

// include will keep running, even if the file is not found.
$page_title = "Login Page";
include ('includes/header.html');
?>

    <h1>Login Page</h1>
    <form action="#" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                <?php echo "value='$username' "?>
            >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <?php
            if($err)
            {
                echo "<span class='err'>Incorrect login</span><br>";
            }
        ?>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

</div>

<!-- Footer -->
<nav class="navbar fixed-bottom">
    <a class="navbar-brand" href="#">Footer</a>
</nav>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>


