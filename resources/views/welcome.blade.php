<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <title>Cafe Location App</title>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
        <!-- Fonts -->
      <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
        <!-- Styles -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        
        <link href="assets/css/e-commerce/vendor.min.css" rel="stylesheet" />
        <link href="assets/css/e-commerce/app.min.css" rel="stylesheet" />
        <style>
            body {
                font-family: 'Nunito', sans-serif;

            }
            .v-application.v-application--is-ltr.theme--light{
                background-image:url(/images/home.jpg) !important;
                 background-position: buttom;
                  background-repeat: no-repeat;
                  background-size: cover;
                  background-attachment: fixed;
            }
            h3.text-3xl.text-white{
                background-image: url(images/logo.png) !important;
            }
            div.v-card__title.text-h5{
                font-size: 20px !important;
                font-weight: bold;
            }
            div.btn-title,.text-white{
                color:white !important
            }
            @media only screen and (max-width: 600px) {
                .hideMobile {
                    display: none !important;
                }
                }
        </style>
    </head>
    <body>
        <div id="app">
            <root-app></root-app>
        </div>
    </body>
    <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false&libraries=geometry"></script>

<!--  AIzaSyBzlLYISGjL_ovJwAehh6ydhB56fCCpPQw -->
<!--  <script async
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap">
</script> -->
 <!--    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyBRc7rdVFdc09OCpYfODfFFtDn3D_Kvz1o" -->
</script>
</html>
