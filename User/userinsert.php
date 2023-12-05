<?php 
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = mysqli_real_escape_string($db, $_POST['Uid']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass = mysqli_real_escape_string($db, $_POST['pass']);
    $mobile = mysqli_real_escape_string($db, $_POST['phone']);
	
    if($id==NULL || $pass==NULL || $mobile==NULL || $email==NULL)
    {
      echo "<script>alert('All Fields are mandatory');window.location.href='admin.html';</script>";
      return;
    }
    $query = "INSERT INTO user (Userid,upass,umail,uphone) VALUES('$id','$pass','$email','$mobile')";
    $query_run = mysqli_query($db, $query);

       if($query_run)
    {
        echo "<script>alert('Details updated Sucessfully and you can Login');window.location.href='index.html';</script>";
    }
    else
    {
        echo "<script>alert('Your Login Name or Password is invalid');</script>";
		 exit();
    }
	
}

	  
?>