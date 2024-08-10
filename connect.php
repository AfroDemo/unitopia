<?php

$con=mysqli_connect('localhost','root','','unitopia');

if (mysqli_connect_error()) {
    echo "Connection Failed".mysqli_connect_error();
}