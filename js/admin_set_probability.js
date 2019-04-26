$(document).ready(function () {

    $('#general_variable').click(function () {

      
      
        let age = Number($('[name="age"]').val());
        let blood = Number($('[name="blood"]').val());
        let gender = Number($('[name="gender"]').val());
        let medication = Number($('[name="medication"]').val());
        let mosquito = Number($('[name="mosquito"]').val());
        let humidity = Number($('[name="humidity"]').val());
        let temperature = Number($('[name="temperature"]').val());

       // alert(age);

        let sum = age + blood + gender + medication + mosquito + humidity + temperature ;
        if (age == "" || blood == "" || gender == "" || medication =="" ||mosquito==""||humidity ==""||temperature=="") {
            $('#general_text').text('Please fill all fields');
            $('.general_message').addClass('alert-danger');
            $('.general_message').removeClass('hidden');
        } else if (sum > 1) {
             $('#general_text').text('The sum of the values cannot be more than 1');
             $('.general_message').addClass('alert-info');
              $('.general_message').removeClass('alert-danger');
             $('.general_message').removeClass('hidden');
        } else {
            $.ajax({
                type: "POST",
                url: "controllers/admin_set_probability.php",
                data: {
                    'action': "general",
                    'age': age,
                    'blood': blood,
                    'gender': gender,
                    'medication':medication,
                    'mosquito':mosquito,
                    'humidity':humidity,
                    'temperature':temperature

                },
                success: function (data) {
                    if (data == 1) {
                        $('#general_text').text('Probability values added');
                        $('.general_message').removeClass('alert-danger');
                        $('.general_message').addClass('alert-success');
                        $('.general_message').removeClass('hidden');
                        setTimeout(function () {
                            location.reload()
                        }, 2000)

                    } else {

                        $('#general_text').text(data);
                        $('.general_message').removeClass('alert-success');
                        $('.general_message').addClass('alert-danger');
                        $('.general_message').removeClass('hidden');

                    }
                }
            });
        }

    })


    $('#age_variable').click(function () {

        let age15_25 = Number($('[name="age15_25"]').val());
        let age26_35 = Number($('[name="age26_35"]').val());
        let age35_45 = Number($('[name="age35_45"]').val());
        let age45_above = Number($('[name="age45_above"]').val());
    

     

        let sum = age15_25 + age26_35 + age35_45 + age45_above;
        //alert(sum);

        if (age15_25 == "" || age26_35 == "" || age35_45 == "" || age45_above == "") {
            $('#age_text').text('Please fill all fields');
            $('.age_message').addClass('alert-danger');
            $('.age_message').removeClass('hidden');
        }
         if (sum > 1) {
            $('#age_text').text('The sum of the values cannot be more than 1');
            $('.age_message').addClass('alert-info');
            $('.age_message').removeClass('alert-danger');
            $('.age_message').removeClass('hidden');
        } else {
            $.ajax({
                type: "POST",
                url: "controllers/admin_set_probability.php",
                data: {
                    'action': "age",
                    'age15_25': age15_25,
                    'age26_35': age26_35,
                    'age35_45': age35_45,
                    'age45_above': age45_above,
                    
                },
                success: function (data) {
                    if (data == 1) {
                        $('#age_text').text('Probability values added');
                        $('.age_message').removeClass('alert-danger');
                        $('.age_message').addClass('alert-success');
                        $('.age_message').removeClass('hidden');
                        setTimeout(function () {
                            location.reload()
                        }, 2000)

                    } else {

                        $('#age_text').text(data);
                        $('.age_message').removeClass('alert-success');
                        $('.age_message').addClass('alert-danger');
                        $('.age_message').removeClass('hidden');

                    }
                }
            });
        }

    })
     
    $('#gender_variable').click(function () {

        let male = Number($('[name="male"]').val());
        let female = Number($('[name="female"]').val());
        


        //alert(male);

        let sum = male + female;

        if (male == "" || female == "") {
            $('#gender_text').text('Please fill all fields');
            $('.gender_message').addClass('alert-danger');
            $('.gender_message').removeClass('hidden');
        } else if (sum > 1) {
            $('#gender_text').text('The sum of the values cannot be more than 1');
            $('.gender_message').addClass('alert-info');
            $('.gender_message').removeClass('alert-danger');
            $('.gender_message').removeClass('hidden');
        } else {
            $.ajax({
                type: "POST",
                url: "controllers/admin_set_probability.php",
                data: {
                    'action': "gender",
                    'male': male,
                    'female': female,
                    

                },
                success: function (data) {
                    if (data == 1) {
                        $('#gender_text').text('Probability values added');
                        $('.gender_message').removeClass('alert-danger');
                        $('.gender_message').addClass('alert-success');
                        $('.gender_message').removeClass('hidden');
                        setTimeout(function () {
                            location.reload()
                        }, 2000)

                    } else {

                        $('#gender_text').text(data);
                        $('.gender_message').removeClass('alert-success');
                        $('.gender_message').addClass('alert-danger');
                        $('.gender_message').removeClass('hidden');

                    }
                }
            });
        }

    })

    $('#blood_variable').click(function () {

        let aa = Number($('[name="aa"]').val());
        let ass = Number($('[name="as"]').val());
        let ss = Number($('[name="ss"]').val());



        //alert(aa);

        let sum = aa + ass + ss;

        if (aa == "" || ass == "" || ss =="") {
            $('#blood_text').text('Please fill all fields');
            $('.blood_message').addClass('alert-danger');
            $('.blood_message').removeClass('hidden');
        } else if (sum > 1) {
            $('#blood_text').text('The sum of the values cannot be more than 1');
            $('.blood_message').addClass('alert-info');
            $('.blood_message').removeClass('alert-danger');
            $('.blood_message').removeClass('hidden');
        } else {
            $.ajax({
                type: "POST",
                url: "controllers/admin_set_probability.php",
                data: {
                    'action': "blood",
                    'ass': ass,
                    'ss': ss,
                    'aa': aa,

                },
                success: function (data) {
                    if (data == 1) {
                        $('#blood_text').text('Probability values added');
                        $('.blood_message').removeClass('alert-danger');
                        $('.blood_message').addClass('alert-success');
                        $('.blood_message').removeClass('hidden');
                        setTimeout(function () {
                            location.reload()
                        }, 2000)

                    } else {

                        $('#blood_text').text(data);
                        $('.blood_message').removeClass('alert-success');
                        $('.blood_message').addClass('alert-danger');
                        $('.blood_message').removeClass('hidden');

                    }
                }
            });
        }

    })

    $('#mosquito_variable').click(function () {

        let fam = Number($('[name="fam"]').val());
        let oth = Number($('[name="oth"]').val());
        let idk = Number($('[name="idk"]').val());



       // alert(fam);

        let sum = fam + oth + idk;

        if (fam == "" || oth == "" || idk == "") {
            $('#mosquito_text').text('Please fill all fields');
            $('.mosquito_message').addClass('alert-danger');
            $('.mosquito_message').removeClass('hidden');
        } else if (sum > 1) {
            $('#mosquito_text').text('The sum of the values cannot be more than 1');
            $('.mosquito_message').addClass('alert-info');
            $('.mosquito_message').removeClass('alert-danger');
            $('.mosquito_message').removeClass('hidden');
        } else {
            $.ajax({
                type: "POST",
                url: "controllers/admin_set_probability.php",
                data: {
                    'action': "mosquito",
                    'fam': fam,
                    'oth': oth,
                    'idk': idk,

                },
                success: function (data) {
                    if (data == 1) {
                        $('#mosquito_text').text('Probability values added');
                        $('.mosquito_message').removeClass('alert-danger');
                        $('.mosquito_message').addClass('alert-success');
                        $('.mosquito_message').removeClass('hidden');
                        setTimeout(function () {
                            location.reload()
                        }, 2000)

                    } else {

                        $('#mosquito_text').text(data);
                        $('.mosquito_message').removeClass('alert-success');
                        $('.mosquito_message').addClass('alert-danger');
                        $('.mosquito_message').removeClass('hidden');

                    }
                }
            });
        }

    })

    $('#medication_variable').click(function () {

        let two_weeks_ago = Number($('[name="two_weeks_ago"]').val());
        let one_month_ago = Number($('[name="one_month_ago"]').val());
        let three_months_ago = Number($('[name="three_months_ago"]').val());
       

        alert(three_months_ago);

        let sum = two_weeks_ago + one_month_ago + three_months_ago;

        if (two_weeks_ago == "" || one_month_ago == "" || three_months_ago == "") {
            $('#medication_text').text('Please fill all fields');
            $('.medication_message').addClass('alert-danger');
            $('.medication_message').removeClass('hidden');
        } else if (sum > 1) {
            $('#medication_text').text('The sum of the values cannot be more than 1');
            $('.medication_message').addClass('alert-info');
            $('.medication_message').removeClass('alert-danger');
            $('.medication_message').removeClass('hidden');
        } else {
            $.ajax({
                type: "POST",
                url: "controllers/admin_set_probability.php",
                data: {
                    'action': "medication",
                    'two_weeks_ago': two_weeks_ago,
                    'one_month_ago': one_month_ago,
                    'three_months_ago': three_months_ago,

                },
                success: function (data) {
                    if (data == 1) {
                        $('#medication_text').text('Probability values added');
                        $('.medication_message').removeClass('alert-danger');
                        $('.medication_message').addClass('alert-success');
                        $('.medication_message').removeClass('hidden');
                        setTimeout(function () {
                            location.reload()
                        }, 2000)

                    } else {

                        $('#medication_text').text(data);
                        $('.medication_message').removeClass('alert-success');
                        $('.medication_message').addClass('alert-danger');
                        $('.medication_message').removeClass('hidden');

                    }
                }
            });
        }

    })

    $('#temperature_variable').click(function () {

        let low = Number($('[name="low"]').val());
        let normal = Number($('[name="normal"]').val());
        let high = Number($('[name="high"]').val());


        alert(high);

        let sum = low + normal + high;

        if (low == "" || normal == "" || high == "") {
            $('#temperature_text').text('Please fill all fields');
            $('.temperature_message').addClass('alert-danger');
            $('.temperature_message').removeClass('hidden');
        } else if (sum > 1) {
            $('#temperature_text').text('The sum of the values cannot be more than 1');
            $('.temperature_message').addClass('alert-info');
            $('.temperature_message').removeClass('alert-danger');
            $('.temperature_message').removeClass('hidden');
        } else {
            $.ajax({
                type: "POST",
                url: "controllers/admin_set_probability.php",
                data: {
                    'action': "temperature",
                    'low': low,
                    'normal': normal,
                    'high': high,

                },
                success: function (data) {
                    if (data == 1) {
                        $('#temperature_text').text('Probability values added');
                        $('.temperature_message').removeClass('alert-danger');
                        $('.temperature_message').addClass('alert-success');
                        $('.temperature_message').removeClass('hidden');
                        setTimeout(function () {
                            location.reload()
                        }, 2000)

                    } else {

                        $('#temperature_text').text(data);
                        $('.temperature_message').removeClass('alert-success');
                        $('.temperature_message').addClass('alert-danger');
                        $('.temperature_message').removeClass('hidden');

                    }
                }
            });
        }

    })

    $('#humidity_variable').click(function () {

        let low = Number($('[name="low_h"]').val());
        let normal = Number($('[name="normal_h"]').val());
        let high = Number($('[name="high_h"]').val());


        alert(high);

        let sum = low + normal + high;

        if (low == "" || normal == "" || high == "") {
            $('#humidity_text').text('Please fill all fields');
            $('.humidity_message').addClass('alert-danger');
            $('.humidity_message').removeClass('hidden');
        } else if (sum > 1) {
            $('#humidity_text').text('The sum of the values cannot be more than 1');
            $('.humidity_message').addClass('alert-info');
            $('.humidity_message').removeClass('alert-danger');
            $('.humidity_message').removeClass('hidden');
        } else {
            $.ajax({
                type: "POST",
                url: "controllers/admin_set_probability.php",
                data: {
                    'action': "humidity",
                    'low': low,
                    'normal': normal,
                    'high': high,

                },
                success: function (data) {
                    if (data == 1) {
                        $('#humidity_text').text('Probability values added');
                        $('.humidity_message').removeClass('alert-danger');
                        $('.humidity_message').addClass('alert-success');
                        $('.humidity_message').removeClass('hidden');
                        setTimeout(function () {
                            location.reload()
                        }, 2000)

                    } else {

                        $('#humidity_text').text(data);
                        $('.humidity_message').removeClass('alert-success');
                        $('.humidity_message').addClass('alert-danger');
                        $('.humidity_message').removeClass('hidden');

                    }
                }
            });
        }

    })
});
