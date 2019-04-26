<?php
include('session.php');
include('db.php');

//select every parameter belonging to the user from the prediction table
 
    $sql = ("SELECT * FROM predictions WHERE `email` = '$email'");
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) < 1) {
        //user does not exits,redirect
        header("location:error.php");
            
    } 

    //I converted everything to an associative array, to make listing possible
    $row = mysqli_fetch_assoc($result);
    
    $weather = $row['weather'];
    $weather_des = $row['weather_des'];
    $humidity = $row['humidity'];

    //converted the pressure from hectopascals to atmospheres [hPa to atm]:
    $pressure = $row['pressure'] / 1013.25;

    //converted the temp from kelvin to celcius
    $temp = $row['temp'] - 273;

    $country = $row['country'];
    $location = $row['location'];
    $age = $row['age'];
    $blood = $row['blood'];
    $gender = $row['gender'];
    $treated_m = $row['treated_m'];
    $mosquito = $row['mosquito'];
    $date= $row["date"];
//seletions of the user inputs ends
  

//selecting variables that causes malaria begins here
    $sql_variables = ("SELECT * FROM variables");
    $result_variables = mysqli_query($conn, $sql_variables);

    $row_variables = mysqli_fetch_assoc($result_variables);

    $humidity_variable = $row_variables['humidity'];
    $temperature_variable = $row_variables['temperature'];
    $age_variable = $row_variables['age'];
    $mosquito_variable = $row_variables['mosquito'];
    $blood_variable = $row_variables['blood'];
    $gender_variable = $row_variables['gender'];
    $medication_variable = $row_variables['medication'];
   

//selecting of the variables that causes malaria ends here
   
//select the probabilities of the users selection and location
//echo($age);
    $age_choosen = ("SELECT * FROM age Where ranges = '$age'");
    $result_age_choosen = mysqli_query($conn, $age_choosen);
    //echo mysqli_num_rows($result_age_choosen);
    $row_age_chosen = mysqli_fetch_assoc($result_age_choosen);
    $age_value = $row_age_chosen['value'];  
    
    $mosquito_choosen = ("SELECT * FROM mosquito Where types = '$mosquito'");
    $result_mosquito_choosen = mysqli_query($conn, $mosquito_choosen);
    $row_mosquito_chosen = mysqli_fetch_assoc($result_mosquito_choosen);
    $mosquito_value = $row_mosquito_chosen['value'];  
    
    $gender_choosen = ("SELECT * FROM gender Where gender = '$gender'");
    $result_gender_choosen = mysqli_query($conn, $gender_choosen);
    $row_gender_chosen = mysqli_fetch_assoc($result_gender_choosen);
    $gender_value = $row_gender_chosen['value'];

    $medication_choosen = ("SELECT * FROM medication Where m_time = '$treated_m'");
    $result_medication_choosen = mysqli_query($conn, $medication_choosen);
    $row_medication_chosen = mysqli_fetch_assoc($result_medication_choosen);
    $medication_value = $row_medication_chosen['value'];

    //echo $blood;
    $blood_choosen = ("SELECT * FROM blood Where groups ='$blood'");
    $result_blood_choosen = mysqli_query($conn, $blood_choosen);
    $row_blood_chosen = mysqli_fetch_assoc($result_blood_choosen);
    $blood_value = $row_blood_chosen['value'];

if($temp < 15){
    $temp_choosen = ("SELECT * FROM temperature Where ranges = 'low'");
    $result_temp_choosen = mysqli_query($conn, $temp_choosen);
    $row_temp_chosen = mysqli_fetch_assoc($result_temp_choosen);
    $temp_value = $row_temp_chosen['value'];
}
elseif($temp < 65){
    $temp_choosen = ("SELECT * FROM temperature Where ranges = 'normal'");
    $result_temp_choosen = mysqli_query($conn, $temp_choosen);
    $row_temp_chosen = mysqli_fetch_assoc($result_temp_choosen);
    $temp_value = $row_temp_chosen['value'];
}
else{
    $temp_choosen = ("SELECT * FROM temperature Where ranges = 'high'");
    $result_temp_choosen = mysqli_query($conn, $temp_choosen);
    $row_temp_chosen = mysqli_fetch_assoc($result_temp_choosen);
    $temp_value = $row_temp_chosen['value'];
}

if($humidity < 15){
    $humidity_choosen = ("SELECT * FROM humidity Where ranges = 'low'");
    $result_humidity_choosen = mysqli_query($conn, $humidity_choosen);
    $row_humidity_chosen = mysqli_fetch_assoc($result_humidity_choosen);
    $humidity_value = $row_humidity_chosen['value'];
}
elseif($humidity < 75){
    $humidity_choosen = ("SELECT * FROM humidity Where ranges = 'normal'");
    $result_humidity_choosen = mysqli_query($conn, $humidity_choosen);
    $row_humidity_chosen = mysqli_fetch_assoc($result_humidity_choosen);
    $humidity_value = $row_humidity_chosen['value'];
}
else{
    $humidity_choosen = ("SELECT * FROM humidity Where ranges = 'high'");
    $result_humidity_choosen = mysqli_query($conn, $humidity_choosen);
    $row_humidity_chosen = mysqli_fetch_assoc($result_humidity_choosen);
    $humidity_value = $row_humidity_chosen['value'];
}


    //Getting the positive probabilities of each of the factors causing malaria
    $pos_humidity_prob = $humidity_value * $humidity_variable;
    $pos_medication_prob = $medication_value * $medication_variable;
    $pos_temperature_prob = $temp_value * $temperature_variable;
    $pos_age_prob = $age_value * $age_variable;
    $pos_mosquito_prob = $mosquito_value * $mosquito_variable;
    $pos_gender_prob = $gender_value * $gender_variable;
    $pos_blood_prob = $blood_value * $blood_variable;

    //Getting the negative probabilities of each of the factors causing malaria
    $neg_humidity_prob = (1 -$humidity_value) * $humidity_variable;
    $neg_medication_prob = (1 -$medication_value) * $medication_variable;
    $neg_temperature_prob = (1 -$temp_value) * $temperature_variable;
    $neg_age_prob = (1 -$age_value) * $age_variable;
    $neg_mosquito_prob = (1 -$mosquito_value) * $mosquito_variable;
    $neg_gender_prob = (1 -$gender_value) * $gender_variable;
    $neg_blood_prob = (1 -$blood_value) * $blood_variable;

    
    //getting the effect of

    //getting general positive probability
    $positive_probability = $pos_age_prob * $pos_blood_prob * $pos_gender_prob * $pos_humidity_prob * $pos_mosquito_prob * $pos_medication_prob * $pos_temperature_prob;
    
    
    //getting general negative probability
    $negative_probability = $neg_age_prob * $neg_blood_prob * $neg_gender_prob * $neg_humidity_prob * $neg_mosquito_prob * $neg_medication_prob * $neg_temperature_prob;
    
    //Normalizing the two probabilities
    $normalizer = $positive_probability + $negative_probability;

    //Getting then probability value for malaria
    $malaria_probability = $positive_probability/$normalizer;
    //prediction message
    if($malaria_probability > 0.5){
        $message = " You are much likely to have malaria in the next two weeks";
    }else{
         $message = "Relax, malaria is not on your way. atleast for the next two weeks!";
    }

    //Get this guys details    
    $user_details = ("SELECT * FROM users WHERE `email` = '$email'");
    $detail_result = mysqli_query($conn, $user_details);

    //I converted everything to an associative array, to make listing possible
    $user_row = mysqli_fetch_assoc($detail_result);
    $user_name = $user_row["name"];

?>