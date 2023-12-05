<?php
session_start();
?>
<?php
   include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $Uid = mysqli_real_escape_string($db,$_POST['Uid']);
      $mypassword = mysqli_real_escape_string($db,$_POST['Pass']); 
      $_SESSION["Unid"]=$Uid;
      $_SESSION["pass"]=$mypassword;
      
      $sql = "SELECT * FROM police WHERE pid = '$Uid' and ppass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        // session_register("myusername");
         echo "<script>alert('Login Successful');window.location.href='adminindex.php';</script>";
      }
      else{
        echo "<script>alert('Your Login Name or Password is invalid'); window.location.href='index.html'</script>";
      }
    }
      ?>