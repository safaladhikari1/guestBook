<?php

// Error Reporting Turned On
ini_set('display_errors', 1);
error_reporting(E_ALL);

$page_title = "Guestbook";
include('includes/header.html');
?>
    <form id="guestForm" method="post" action="confirmation.php">

        <!-- Row 1 Start -->
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <fieldset class="form-group">
                    <legend>Contact Info</legend>

                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <span class="required">*</span>
                        <input class="form-control" type="text" id="firstname" name="fname">
                        <span class="d-none text-danger" id="errorFname">Please enter a first name</span>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <span class="required">*</span>
                        <input class="form-control" type="text" id="lastname" name="lname">
                        <span class="d-none text-danger" id="errorLname">Please enter a last name</span>
                    </div>

                    <div class="form-group">
                        <label for="jobtitle">Job Title</label>
                        <input class="form-control" type="text" id="jobtitle" name="jobtitle">
                    </div>

                    <div class="form-group">
                        <label for="company">Company</label>
                        <input class="form-control" type="text" id="company" name="company">
                    </div>

                    <div class="form-group">
                        <label for="linkedin">LinkedIn URL</label>
                        <input class="form-control" type="text" id="linkedin" name="linkedin">
                        <span class="d-none text-danger"
                              id="invalidLinkedIn">Please enter a valid LinkedIn URL address</span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <span class="d-none required" id="emailAsterisk">*</span>
                        <input class="form-control" type="email" id="email" name="email">
                        <span class="d-none text-danger" id="noEmail">Please enter your email address</span>
                        <span class="d-none text-danger" id="invalidEmail">Please enter a valid email address.</span>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-6 col-lg-6">
                <fieldset class="form-group">
                    <legend>How we met</legend>

                    <div class="form-group">
                        <label for="meettype">How did we meet?</label>
                        <span class="required">*</span>
                        <select class="custom-select" id="meettype" name="meettype[]">
                            <option value="0">Choose</option>
                            <option value="Meetup">Meetup</option>
                            <option value="Job Fair">Job Fair</option>
                            <option value="College">College</option>
                            <option value="Not met yet">We haven't met yet</option>
                            <option value="other" id="other">Other (please specify)</option>
                        </select>
                        <span class="d-none text-danger"
                              id="errorMeetSelection">Please let me know how did we met.</span>
                    </div>

                    <div class="form-group" id="showother">
                        <label for="othertext" class="othertext d-none">Other</label>
                        <textarea class="form-control othertext d-none" id="othertext" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="message">Message (a text area)</label>
                        <textarea class="form-control" id="message" rows="11"></textarea>
                    </div>

                </fieldset>
            </div>
        </div>
        <!-- Row 1 End -->

        <!-- Row 2 Start -->
        <div class="row">
            <fieldset class="form-group">
                <legend>Mailing list</legend>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="mailinglistcheck" name="mailingList[]" value="yes">
                        <label class="custom-control-label" for="mailinglistcheck">Please add me to your mailing
                            list</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="d-block">Choose an email format</label>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="html" name="emailformat" class="custom-control-input">
                        <label class="custom-control-label" for="html">HTML</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="text" name="emailformat" class="custom-control-input">
                        <label class="custom-control-label" for="text">Text</label>
                    </div>
                </div>
            </fieldset>
        </div>

        <!-- Row 2 End -->
        <input class="btn btn-primary" type="submit" value="Submit">
        <br>
        <small><span class="required">* </span>Required Field</small>
    </form>
    <br>
    <a class="btn btn-primary" href="https://safal.greenriverdev.com/sdev305/guestbook/admin.php" role="button"
       style="margin-bottom: 10px">Go to Admin Page</a>

<?php
include('includes/footer.html');
?>