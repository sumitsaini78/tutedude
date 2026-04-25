<?php 
if ($_POST) { 
    $servername = "localhost"; 
    $username   = "digilotu_sumit"; 
    $password   = "sumitsumit"; 
    $database   = "digilotu_dd"; 

    // Establish connection
    $con = mysqli_connect($servername, $username, $password, $database); 

    if ($con) { 
        echo "Successful connection"; 
    } else { 
        die("Connection failed: " . mysqli_connect_error()); 
    } 

    // Validation
    if ($_POST['email'] == "") { 
        echo "Email required"; 
    } else if ($_POST['password'] == "") { // Fixed bracket here
        echo "Password needed"; 
    } 
	else{
		$query="select id from record where email = '".mysqli_real_escape_string($con,$_POST['email'])."'";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0){
			echo "Already present";
		}
		else{
			$query="insert into record(email,password)values('".mysqli_real_escape_string($con,$_POST['email'])."','".mysqli_real_escape_string($con,$_POST['password'])."')";
if(mysqli_query($con,$query)){
	echo "hurray ! Your Signed up !";
}
	}
	}
} 
?> 

<form method="post"> 
    <input type="text" name="email" placeholder="Enter Your Email"> 
    <input type="password" name="password" placeholder="Enter Your Password"> 
    <input type="submit" value="Login"> 
</form>
