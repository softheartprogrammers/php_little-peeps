<?php

// session_start();: This line initiates a PHP session. Sessions are a way to store information (data) across multiple page requests from the same user.  Here's how it works:

//     If a session doesn't already exist for the user, it creates a new one.
//     If a session exists, it resumes the existing session.
//     session_unset();: This function clears all of the data that's been stored in the current session. Essentially, it "empties" the session variables.
    
//     session_destroy();:  This function completely destroys the current session along with all information associated with it. The user will not have access to any session data from there on.



session_start();
session_unset();
session_destroy();


header("location: index.php");
