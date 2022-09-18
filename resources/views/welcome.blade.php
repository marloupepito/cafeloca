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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="assets/css/e-commerce/vendor.min.css" rel="stylesheet" />
        <link href="assets/css/e-commerce/app.min.css" rel="stylesheet" />
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            h3.text-3xl.text-white{
                background-image: url(images/logo.png) !important;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <root-app></root-app>
        </div>
    </body>
    
</html>
