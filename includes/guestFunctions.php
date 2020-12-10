<?php

    // Validate Name
    function validName($name)
    {
        // If it does not have an empty string, return true
        // or return false.
        return !empty($name);
    }

    // Validate Email, only if supplied.
    function validateEmail($email)
    {
        // If the email field does not have empty string, try to match the regex
        if(validName($email))
        {
            $pattern = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
            return preg_match($pattern, $email);
        }
        else
        {
            return true;
        }
    }

    // when user checks the mailing list checkbox, then they must also provide an email address
    function validateMailingList($selections)
    {
        $validSelection = array("yes");

        foreach ($selections as $selection)
        {
            if(!in_array($selection, $validSelection))
            {
                return false;
            }
        }

        return true;
    }

    // Validate LinkedIn, only if supplied.
    function validateLinkedIn($linkedin)
    {
        // If the linkedin field does not have empty string, try to match the regex
        if(validName($linkedin))
        {
            $pattern = '/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/';
            return preg_match($pattern, $linkedin);
        }
        else
        {
            return true;
        }
    }

    // "How we met" answer is required and must be valid.
    function validateHowWeMet($selections)
    {
        $validSelection = array("Meetup", "Job Fair", "College", "Not met yet", "other");

        foreach ($selections as $selection)
        {
            if(!in_array($selection, $validSelection))
            {
                return false;
            }
        }
        return true;
    }














