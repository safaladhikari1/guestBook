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
require ($_SERVER['HOME'].'/someFolder/dbcreds.php');
require('includes/guestFunctions.php');

?>

<?php

    // Print the POST Array
//    echo "<pre>";
//    var_dump($_POST);
//    echo "</pre>";

    // Data Validation Flag
    $isValid = true;

    // Check First Name
    if(validName($_POST['fname']))
    {
        $fname = $_POST['fname'];
    }
    else
    {
        echo "<p>First Name is required</p>";
        $isValid = false;
    }

    // Check Last Name
    if(validName($_POST['lname']))
    {
        $lname = $_POST['lname'];
    }
    else
    {
        echo "<p>Last Name is required</p>";
        $isValid = false;
    }

    // Validate Email, only if supplied.
    if(validateEmail($_POST['email']))
    {
        $email = $_POST['email'];
    }
    else
    {
        echo "<p>Enter a valid email address.</p>";
        $isValid = false;
    }

    // mailing list checkbox
    $mailingList = "";
    if(isset($_POST['mailingList']))
    {
        $mailingList = $_POST['mailingList'];

        if(!validateMailingList($mailingList))
        {
            echo "<p>Go away, evildoer! That's not a valid selection</p>";
            return;
        }

        else if(!validName($_POST['email']))
        {
            echo "<p>Enter an email address for my mailing list.</p>";
            $isValid = false;
        }

        $mailingCount = sizeof($mailingList);
    }

    // Validate LinkedIn, only if supplied.
    if(validateLinkedIn($_POST['linkedin']))
    {
        $linkedin = $_POST['linkedin'];
    }
    else
    {
        echo "<p>Enter a valid LinkedIn address.</p>";
        $isValid = false;
    }

    // validate "How we met"
    $howWeMet= "";
    if(isset($_POST['meettype']))
    {
        $howWeMet = $_POST['meettype'];

        if(!validateHowWeMet($howWeMet))
        {
            echo "<p>Please let me know how we did we meet?</p>";
            $isValid = false;
        }

        $howWeMetCount = sizeof($howWeMet);
    }

    if (!$isValid) {
        return;
    }

    if($isValid)
    {
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $meettype = $_POST['meettype'];
        $email = $_POST['email'];
        $linkedin = $_POST['linkedin'];

        $fullname = $firstname . " " . $lastname;
        echo "<h2>" . "Thank you! for filling out my Guestbook Form, " . $fullname . "</h2>";

        echo "<h3>" . "Guest's summary" . "</h3>";
        echo "<p>Name: $fullname</p>";
        echo "<p>How we met: " . implode(",", $meettype) . "</p>";
        echo "<p>Email: $email</p>";
        echo "<p>LinkedIn: $linkedin</p>";
    }

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $jobtitle = $_POST['lname'];
    $company = $_POST['company'];
    $linkedin = $_POST['linkedin'];
    $email = $_POST['email'];
    $meettype = $_POST['meettype'];
    $meettypeString =  implode(', ', $meettype);

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
        '$meettypeString'
    )";

    $success = mysqli_query($cnxn, $sql);

    if(!$success)
    {
        echo "<p>Sorry..something went wrong.</p>";
        return;
    }

?>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>


