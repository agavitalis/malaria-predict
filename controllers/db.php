<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "malaria";

    //when on live heroku server connection
    //mysql://b339cf1f317569:29dcd907@us-cdbr-iron-east-02.cleardb.net/heroku_f80f34e3fb7c40f?//reconnect=true
    $servername_live = "us-cdbr-iron-east-02.cleardb.net";
    $user_live = "b339cf1f317569";
    $password_live = "29dcd907";
    $dbname_lve = "heroku_f80f34e3fb7c40f";
    // Create connection
    
    //$conn = mysqli_connect($servername, $user, $password,$dbname);
    $conn = mysqli_connect($servername_live, $user_live, $password_live,$dbname_live);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?> 