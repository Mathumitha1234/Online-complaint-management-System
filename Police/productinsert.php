<?php 
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $Pid = mysqli_real_escape_string($db, $_POST['Pid']);
    $Pname = mysqli_real_escape_string($db, $_POST['Pname']);
    $qunt = mysqli_real_escape_string($db, $_POST['qunt']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $mfg = mysqli_real_escape_string($db, $_POST['mfg']);
    $exp = mysqli_real_escape_string($db, $_POST['exp']);
	
    if($Pid==NULL || $Pname==NULL || $qunt==NULL || $price==NULL || $mfg==NULL || $exp==NULL)
    {
      echo "<script>alert('All Fields are mandatory');window.location.href='adminindex.php';</script>";
      return;
    }
    $query = "INSERT INTO products (proId,Pname,qunt,price,mfg,exp) VALUES('$Pid','$Pname','$qunt','$price','$mfg','$exp')";
    $query_run = mysqli_query($db, $query);

       if($query_run)
    {
        echo "<script>alert('Details Registered Sucessfully');window.location.href='adminindex.php';</script>";
    }
    else
    {
        echo "<script>alert('Enter the correct value');</script>";
		 exit();
    }
	
}

	  
?>