<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zootopia</title>

<?php
$PHP_SELF=$_SERVER['PHP_SELF'];

$RootDir='http://'.$_SERVER['HTTP_HOST'].'/zootopia'.substr($PHP_SELF,0,strrpos($PHP_SELF,''));

        // Font awesome version 4.7
        echo '<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">';

        // jQuery date picker CSS
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>';

        // jQuery time picker CSS
        echo'<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">';

        // Bootstrap core CSS
        // echo '<link href=" ';
        // echo $RootDir;
        // echo '/view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">';

        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';

        // Zootopia CSS
        echo '<link href=" ';
        echo $RootDir;
        echo '/view/css/one-page-wonder.css" rel="stylesheet">';

        // Custom fonts for this template
        echo '<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">';
        echo '<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">';

        // ?
        echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>';


    // Google Maps API
    // echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFlroMXsGgmRsAgtSmtBqpBLYzpyAWP7Q&callback=myMap"></script>';

        // jQuery form validation (username & pw)
        echo '<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>';

        // Javascript/jQuery
        // echo '<script src=" ';
        // echo $RootDir;
        // echo '/view/vendor/jquery/jquery.min.js"></script>';

        echo'<script src="http://code.jquery.com/jquery-3.3.1.min.js"
              integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script>';

        // jQuery date picker JS
        echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>';

        // jQuery time picker JS
        echo'<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>';

        // Bootstrap JS
        // echo '<script src=" ';
        // echo $RootDir;
        // echo '/view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>';

        echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';

        // Zootopia JS
        echo '<script src=" ';
        echo $RootDir;
        echo '/view/js/zootopia.js"> </script>';


   ?>

  </head>

  <body>
