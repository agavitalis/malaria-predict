$(document).ready(function(){
    
    //check for authentication first
      $('#getprediction').click(function () {
        
        //$('.normal_slider').addClass('hidden');
        //call the getlocation function
          getLocation();

          if (!getLocation()){
              alert('location unable to be accessed, check connectivity and permissions');
          }
        
      })
    

    function getLocation() {
        //check for internet connectivity
        if (navigator.onLine) {
           if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(showPosition);
           } else {

               $('.res_div').removeClass('hidden');
               $('.normal_slider').addClass('hidden');
               $("#res_header").text("Geolocation is not supported by this browser.");
               $("#res_body").text("You need a geolocation enabled browser to, so that we can access your location");
           }
        }
        else{

              $('.res_div').removeClass('hidden');
              $('.normal_slider').addClass('hidden');
              $("#res_header").text("No Strong Internet Connection!");
              $("#res_body").text("You need a strong internet connection to enable our prediction work. Please get connected to the internet and try again!");
        }
        
    }

    function showPosition(position) {
        $('.normal_slider').addClass('hidden');
        $('.res_div').removeClass('hidden');
        $('.continue-div').removeClass('hidden');
       
        $("#res_header").text("Your current location is")
          $('[name="latitude"]').val(position.coords.latitude);
          $('[name="longitude"]').val(position.coords.longitude);
        $("#res_body").html("Latitude: " + position.coords.latitude + "<br> Longitude: " + position.coords.longitude)
            
    }
})
