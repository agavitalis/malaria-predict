$(document).ready(function(){

    $('#yes_continue').click(function(){
        
        let latitude = $('[name="latitude"]').val();
        let longitude = $('[name="longitude"]').val();

            $.ajax({
               
                type: 'GET',
                url: 'http://api.openweathermap.org/data/2.5/weather?lat=' + latitude + '&lon=' + longitude + '&appid=bb10de3829a7fbbde3d318423840bca5',
               
                beforeSend: function () {
                    $("#error").fadeOut();
                    $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; signing you in ...');
                },

                success: function (response) {
                    //console.log(response)
                    
                    let weather_name = response.weather[0].main
                    let weather_des = response.weather[0].description
                  

                    let humidity = response.main.humidity
                    let pressure = response.main.pressure
                    let temp = response.main.temp

                    let country = response.sys.country
                    let location = response.name
                    let code = response.cod

                    //form data goes here
                    let age = $('[name="age"]').val();
                    let blood = $('[name="blood_g"]').val();
                    let gender = $('[name="gender"]').val();
                    let treated_m = $('[name="treated_m"]').val();
                    let mosquito = $('[name="mosquito"]').val();


                        $.ajax({

                            type: 'POST',
                            url: 'controllers/save_prediction.php',
                            data: {
                                 'action': "save",
                                //'email': email,
                                 'weather': weather_name,
                                 'weather_des': weather_des,
                                 'humidity':humidity,
                                 'pressure':pressure,
                                 'temp':temp,
                                 'country':country,
                                 'location':location,

                                 'age':age,
                                 'blood':blood,
                                 'gender':gender,
                                 'treated_m': treated_m,
                                 'mosquito':mosquito
                            },
                            success:function(data){
                                //redirect the user
                               // alert(data)
                                window.location = "show_prediction.php"
                            }
                            
                        })

                },

                error: function (error) {
                    console.log(error)
                }

            })
    })

    $('#no_continue').click(function () {
         location.reload();
    })


})