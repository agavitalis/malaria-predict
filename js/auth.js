$(document).ready(function () {

    $('#signup').click(function () {

        //alert("Yes dear");
        let name = $('#signup_name').val();
        let email = $("#signup_email").val();
        let password = $("#signup_password").val();
        let password2 = $("#signup_password2").val();

        if(name==""||email==""||password==""){
             $('#signup_message').text('Please fill all fields');
             $('#signup_message').addClass('alert-danger');
             $('#signup_message').removeClass('hidden');
        }else if(password !== password2){
            $('#signup_message').text('Passwords did not match');
            $('#signup_message').addClass('alert-danger');
            $('#signup_message').removeClass('hidden');
        }
        else{
            $.ajax({
                type: "POST",
                url: "controllers/auth.php",
                data: {
                    'action': "signup",
                    'name': name,
                    'email': email,
                    'password':password

                },
                success: function (data) {
                    if (data == 1) {
                        $('#signup_message').text('You have been sign up successfully');
                        $('#signup_message').removeClass('alert-danger');                      
                        $('#signup_message').addClass('alert-success');
                        $('#signup_message').removeClass('hidden');
                        setTimeout(function () {
                             location.reload()
                        }, 2000)

                    } else {
                            
                            $('#signup_message').text(data);
                            $('#signup_message').removeClass('alert-success');
                            $('#signup_message').addClass('alert-danger');
                            $('#signup_message').removeClass('hidden');
                    
                    }
                }
            });
        }

    })

    
    $('#login').click(function () {


        let email = $('#login_email').val();
        let password = $('#login_password').val();
        
        if (email == "" || password == "") {
            $('#login_message').text('Please fill fields');
            $('#login_message').addClass('alert-danger');
            $('#login_message').removeClass('hidden');
        }
        else{
            $.ajax({
                type: "POST",
                url: "controllers/auth.php",
                data: {
                    'action': "login",
                    'email': email,
                    'password': password

                },
                success: function (data) {
                    if (data == 1) {
                        $('#login_message').text('Login Successful');
                        $('#login_message').removeClass('alert-danger');
                        $('#login_message').addClass('alert-success');
                        $('#login_message').removeClass('hidden');
                        setTimeout(function () {
                            location.reload()
                        }, 2000)
                    } else {
                            $('#login_message').text(data);
                            $('#login_message').removeClass('alert-success');
                            $('#login_message').addClass('alert-danger');
                            $('#login_message').removeClass('hidden');
                    }
                }
            });
        }

    })



     $('#backtohome').click(function () {
           window.location = "index.php";
     })

});
