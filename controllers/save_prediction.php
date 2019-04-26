<?php
include('session.php');
include('db.php');


//check if these fields are avaliable
if(isset($_POST['action']) && $_POST['action'] == "save"){

    $weather = $_POST['weather'];
    $weather_des = $_POST['weather_des'];
    $humidity = $_POST['humidity'];
     $pressure = $_POST['pressure'];
      $temp = $_POST['temp'];
       $country = $_POST['country'];
        $location = $_POST['location'];
         $age = $_POST['age'];
          $blood = $_POST['blood'];
           $gender = $_POST['gender'];
            $treated_m = $_POST['treated_m'];
             $mosquito = $_POST['mosquito'];
             $date= date('d-m-Y');
    
                                 
    
              
        //Now I want tocheck for th user in the database
        $sql = ("SELECT * FROM predictions WHERE `email` = '$email' ");
        $result = mysqli_query($conn, $sql);

        //I converted everything to an associative array
        $row = mysqli_fetch_assoc($result);
        
        if (mysqli_num_rows($result) > 0  ) {
            //user record exist, delete them
            $delete = ("DELETE FROM predictions WHERE `email` = '$email' ");
            mysqli_query($conn, $delete);
        
        } 
       
            
        //update the database
        $sql = "INSERT INTO predictions (`email`,`weather`,`weather_des`,`humidity`,`pressure`,`temp`,`country`,`location`,`age`,`blood`,`gender`,`treated_m`,`mosquito`,`date`) 
        VALUES ('$email', '$weather', '$weather_des','$humidity','$pressure','$temp','$country','$location','$age','$blood','$gender','$treated_m','$mosquito','$date')";
        if (mysqli_query($conn, $sql)) {
            
            echo 1;
        } 
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
                
        
        
      
    
}