<?php

// Error Reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// include will keep running, even if the file is not found.
$page_title = "Admin Page";
include ('includes/header.html');

// require will look for the file, if it doesn't get it, it will terminate
require ('includes/guestDbCreds.php');

?>

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
        "order": [[ 5, "desc" ]]
    } );
</script>

</body>
</html>
