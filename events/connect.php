<?php
$conn =new mysqli("localhost","root","","websitelogin");
if($conn->connect_error){
    echo "failed to connect db".$conn->connect_error;
    }
    ?>