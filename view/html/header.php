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

    // Bootstrap core CSS
    echo '<link href=" ';
    echo $RootDir;
    echo '/view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">';

    // Custom styles for this template
    echo '<link href=" ';
    echo $RootDir;
    echo '/view/css/one-page-wonder.css" rel="stylesheet">';

    // Custom fonts for this template
    echo '<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">';
    echo '<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">';

    // Google Maps API
    echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFlroMXsGgmRsAgtSmtBqpBLYzpyAWP7Q&callback=myMap"></script>';

    // Javascript/jQuery
    echo '<script src=" ';
    echo $RootDir;
    echo '/view/vendor/jquery/jquery.min.js"></script>';

    // Bootstrap JS
    echo '<script src=" ';
    echo $RootDir;
    echo '/view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>';

    echo '<script src=" ';
    echo $RootDir;
    echo '/view/js/zootopia.js"> </script>';
   ?>

  </head>

  <body>
