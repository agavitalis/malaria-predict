<?php
include('session.php');
include('db.php');


//check if these fields are avaliable
if($_POST['action'] == "general"){


    $age = $_POST['age'];
    $blood = $_POST['blood'];
    $gender = $_POST['gender'];
    $humidity = $_POST['humidity'];
    $temperature = $_POST['temperature'];
     
    $medication = $_POST['medication'];
    $mosquito = $_POST['mosquito'];
    
   
       
    //delete previous records
    $delete = ("DELETE FROM predictions");
    mysqli_query($conn, $delete);

        
       
            
    //update the database
    $sql = "INSERT INTO variables (`age`,`blood`,`gender`,`humidity`,`temperature`,`medication`,`mosquito`) 
    VALUES ('$age', '$blood', '$gender','$humidity','$temperature','$medication','$mosquito')";
    if (mysqli_query($conn, $sql)) {
        
        echo 1;
    } 
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
      
}   
    
//set variations for age
if($_POST['action'] == "age"){

        $under_25 = $_POST['age15_25'];
        $under_35 = $_POST['age26_35'];
        $under_45 = $_POST['age35_45'];
        $over_45 = $_POST['age45_above'];
        
     
        //delete previous records
        $delete = ("DELETE FROM age");
        mysqli_query($conn, $delete);

        
    for ($i=0; $i <= 3; $i++) { 
       
        if($i == 0) {
            $sql = "INSERT INTO age (`ranges`,`value`) 
            VALUES ('Under_25', '$under_25')";
            mysqli_query($conn, $sql);
        }
        elseif($i == 1) {
            $sql = "INSERT INTO age (`ranges`,`value`) 
            VALUES ('Under_35', '$under_35')";
            mysqli_query($conn, $sql);
        }
        elseif($i == 2) {
            $sql = "INSERT INTO age (`ranges`,`value`) 
            VALUES ('Under_45', '$under_45')";
            mysqli_query($conn, $sql);
        }
        elseif($i == 3) {
            $sql = "INSERT INTO age (`ranges`,`value`) 
            VALUES ('Over_45', '$over_45')";
            $y = mysqli_query($conn, $sql);
            break;
        }
    }
            
    //update the database 
    if ($y) {
        
        echo 1;
    } 
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
                

}

//set variations for gender
if($_POST['action'] == "gender"){

        $male = $_POST['male'];
        $female = $_POST['female'];
       
  
        //delete previous records
        $delete = ("DELETE FROM gender");
        mysqli_query($conn, $delete);

        
    for ($i=0; $i <= 1; $i++) { 
       
        if($i == 0) {
            $sql = "INSERT INTO gender (`gender`,`value`) 
            VALUES ('Male', '$male')";
            mysqli_query($conn, $sql);
        }
        elseif($i == 1) {
            $sql = "INSERT INTO gender (`gender`,`value`) 
            VALUES ('Female', '$female')";
            $y= mysqli_query($conn, $sql);
            break;
        }
       
    }
            
    //update the database 
    if ($y) {
        
        echo 1;
    } 
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
                

}

//set variations for blood
if($_POST['action'] == "blood"){

        $ass = $_POST['ass'];
        $ss = $_POST['ss'];
        $aa = $_POST['ss'];
       
        //delete previous records
        $delete = ("DELETE FROM blood");
        mysqli_query($conn, $delete);

        
    for ($i=0; $i <= 2; $i++) { 
       
        if($i == 0) {
            $sql = "INSERT INTO blood (`groups`,`value`) 
            VALUES ('AS', '$ass')";
            mysqli_query($conn, $sql);
        }
        elseif($i == 1) {
            $sql = "INSERT INTO blood (`groups`,`value`) 
            VALUES ('AA', '$aa')";
            mysqli_query($conn, $sql);
           
        }
        elseif($i == 2) {
            $sql = "INSERT INTO blood (`groups`,`value`) 
            VALUES ('SS', '$ss')";
            $y= mysqli_query($conn, $sql);
            break;
        }
       
    }
            
    //update the database 
    if ($y) {
        
        echo 1;
    } 
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
                

}

//set variations for mosqito
if($_POST['action'] == "mosquito"){

        $fam = $_POST['fam'];
        $oth = $_POST['oth'];
        $idk = $_POST['idk'];
       
        //delete previous records
        $delete = ("DELETE FROM mosquito");
        mysqli_query($conn, $delete);

        
    for ($i=0; $i <= 2; $i++) { 
       
        if($i == 0) {
            $sql = "INSERT INTO mosquito (`types`,`value`) 
            VALUES ('Female_anophelis_mosquitoes', '$fam')";
            mysqli_query($conn, $sql);
        }
        elseif($i == 1) {
            $sql = "INSERT INTO mosquito (`types`,`value`) 
            VALUES ('Other_types_of_mosquitoes', '$oth')";
            mysqli_query($conn, $sql);
           
        }
        elseif($i == 2) {
            $sql = "INSERT INTO mosquito (`types`,`value`) 
            VALUES ('I_dont_know', '$idk')";
            $y= mysqli_query($conn, $sql);
            break;
        }
       
    }
            
    //update the database 
    if ($y) {
        
        echo 1;
    } 
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
                

}

//set variations for medication
if($_POST['action'] == "medication"){

        $three_months_ago = $_POST['three_months_ago'];
        $one_month_ago = $_POST['one_month_ago'];
        $two_weeks_ago = $_POST['two_weeks_ago'];
       
        //delete previous records
        $delete = ("DELETE FROM medication");
        mysqli_query($conn, $delete);

        
    for ($i=0; $i <= 2; $i++) { 
       
        if($i == 0) {
            $sql = "INSERT INTO medication (`m_time`,`value`) 
            VALUES ('Two_weeks_ago', '$two_weeks_ago')";
            mysqli_query($conn, $sql);
        }
        elseif($i == 1) {
            $sql = "INSERT INTO medication (`m_time`,`value`) 
            VALUES ('One_month_ago', '$one_month_ago')";
            mysqli_query($conn, $sql);
           
        }
        elseif($i == 2) {
            $sql = "INSERT INTO medication (`m_time`,`value`) 
            VALUES ('Three_months_ago', '$three_months_ago')";
            $y= mysqli_query($conn, $sql);
            break;
        }
       
    }
            
    //update the database 
    if ($y) {
        
        echo 1;
    } 
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
                

}

//set variations for temperature
if($_POST['action'] == "temperature"){

        $high = $_POST['high'];
        $normal = $_POST['normal'];
        $low = $_POST['low'];
       
        //delete previous records
        $delete = ("DELETE FROM temperature");
        mysqli_query($conn, $delete);

        
    for ($i=0; $i <= 2; $i++) { 
       
        if($i == 0) {
            $sql = "INSERT INTO temperature (`ranges`,`value`) 
            VALUES ('low', '$low')";
            mysqli_query($conn, $sql);
        }
        elseif($i == 1) {
            $sql = "INSERT INTO temperature (`ranges`,`value`) 
            VALUES ('normal', '$normal')";
            mysqli_query($conn, $sql);
           
        }
        elseif($i == 2) {
            $sql = "INSERT INTO temperature (`ranges`,`value`) 
            VALUES ('high', '$high')";
            $y= mysqli_query($conn, $sql);
            break;
        }
       
    }
            
    //update the database 
    if ($y) {
        
        echo 1;
    } 
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
                

}

//set variations for humidity
if($_POST['action'] == "humidity"){

        $high = $_POST['high'];
        $normal = $_POST['normal'];
        $low = $_POST['low'];
       
        //delete previous records
        $delete = ("DELETE FROM humidity");
        mysqli_query($conn, $delete);

        
    for ($i=0; $i <= 2; $i++) { 
       
        if($i == 0) {
            $sql = "INSERT INTO humidity (`ranges`,`value`) 
            VALUES ('low', '$low')";
            mysqli_query($conn, $sql);
        }
        elseif($i == 1) {
            $sql = "INSERT INTO humidity (`ranges`,`value`) 
            VALUES ('normal', '$normal')";
            mysqli_query($conn, $sql);
           
        }
        elseif($i == 2) {
            $sql = "INSERT INTO humidity (`ranges`,`value`) 
            VALUES ('high', '$high')";
            $y= mysqli_query($conn, $sql);
            break;
        }
       
    }
            
    //update the database 
    if ($y) {
        
        echo 1;
    } 
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
                

}