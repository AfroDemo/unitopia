<?php

$con=mysqli_connect('localhost','root','afrodemoz','unitopia');

if (mysqli_connect_error()) {
    echo "Connection Failed".mysqli_connect_error();
}