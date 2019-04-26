<?php
include('session.php');
include('db.php');

//check if these fields are avaliable
if(isset($_POST['action']) && $_POST['action'] == "signup"){
   
    if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']) ){
       
        //a function to validate user input
        function validation($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //i called the functions here
        $email = validation($_POST["email"]);
        $name = validation($_POST["name"]);
        $password = validation($_POST["password"]);
        $password = md5(md5($password));
              
        //Now I want tocheck for th user in the database
        $sql = ("SELECT * FROM users WHERE `email` = '$email' ");
        $result = mysqli_query($conn, $sql);

        //I converted everything to an associative array
        $row = mysqli_fetch_assoc($result);
        
        if (mysqli_num_rows($result) > 0  ) {
            //user exits
          echo "Email already exist";
        } 
        else{
            
            //update the database
            $sql = "INSERT INTO users ( `name`, `email`,`password`) VALUES ('$name', '$email', '$password')";

            if (mysqli_query($conn, $sql)) {
                
                $_SESSION["email"] = $email;
                echo 1;
            } 
            else{
                echo "A regisration error occured!";
            }
                
        }
        
      
    }
}

//check if these fields are avaliable
if(isset($_POST['action']) && $_POST['action'] == "login"){
   
    if(isset($_POST['email']) && isset($_POST['password']) ){
       
        //a function to validate user input
        function validation($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //i called the functions here
        $email = validation($_POST["email"]);
        $password = validation($_POST["password"]);
        $password = md5(md5($password));
              
        //Now I want tocheck for th user in the database
        $sql = ("SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password' ");
        $result = mysqli_query($conn, $sql);

        //I converted everything to an associative array
        $row = mysqli_fetch_assoc($result);
        //print_r($row);
        
        if (mysqli_num_rows($result) > 0 && $row['role'] == 1) {
            //user exits
            $_SESSION["email"] = $email;
            $_SESSION["admin"] = "admin";
            echo 1;
        }elseif(mysqli_num_rows($result) > 0 ){
            //user exits,but not admin
            $_SESSION["email"] = $email;
            echo 1;
        }
        else{
             //user does not exist
             echo "Invalid login email or password";
        }
      
    }
}
?>