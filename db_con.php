<?php
$con = mysqli_connect("localhost","digilotu_dd","vandematram","digilotu_dd
");
$conn = new mysqli($servername, $username, $password, $dbname);

if($con){
    echo "Connected ";
}
else {
    echo "Error";
}

    ?>