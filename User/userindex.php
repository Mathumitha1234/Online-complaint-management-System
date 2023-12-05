<?php
session_start();
include("config.php");
?>
<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $id = mysqli_real_escape_string($db,$_POST['id']);
      $name = mysqli_real_escape_string($db,$_POST['name']);
      $gender = mysqli_real_escape_string($db,$_POST['gender']); 
      $dob = mysqli_real_escape_string($db,$_POST['dob']);
      $cname = mysqli_real_escape_string($db,$_POST['cname']);
      $cdes = mysqli_real_escape_string($db,$_POST['cdes']);
      $_SESSION["Unid"]=$id;
      
      if($name == NULL || $gender == NULL || $dob == NULL || $cname == NULL || $cdes == NULL || $id==NULL)
    {
      echo "<script>alert('All Fields are mandatory');window.location.href='userindex.php';</script>";
        return;
    }


      $sql = "INSERT INTO Complaint (id,name,gender,dob,cname,cdes) VALUES('$id','$name','$gender','$dob','$cname','$cdes')";
      $result = mysqli_query($db,$sql);
    
      //$active = $row['active'];
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($result) {         
         echo "<script>alert('Complaint Registered Sucessfully');window.location.href='userindex.php';</script>";
	}
	  else
	  {
         echo "<script>alert('Your Login Name or Password is invalid');</script>";
		 exit();
      }
   }	
?>
<html>
<head>
  <link rel="stylesheet" href="userindex.css">
  <title>User Credentials</title>
</head>
<body >
  <div class="home">
    <div class="row">
      <img src="pol.png" alt="police">
    </div>
    <div class="column">
      <p>Tamil Nadu Police is the primary law enforcement agency of the state of Tamil Nadu, India. It is over 150 years old and is the fifth largest state police force in India. Tamil Nadu has a police-population ratio of 1:632. The Director General of the Tamil Nadu police is Shankar Jiwal.</p>
      <a href="#Reg">Complaint Register</a>
      <a href="#csta">Complaint Status</a>
    </div>
  </div>
  <div class="CReg" id="Reg">
    <form method="POST">
      <table>
        <tr>
          <th>ID </th>
          <td><input type="text" name="id" placeholder="Registered ID"></td>
        </tr>
        <tr>
          <th>Name</th>
          <td><input type="text" name="name" placeholder="Registered Name"></td>
        </tr>
        <tr>
          <th>Gender</th>
          <td><input type="text" name="gender" placeholder="Male/Female/TransGender"></td>
        </tr>
        <tr>
          <th>D.O.B</th>
          <td><input type="text" name="dob" placeholder="dd/mm/yyyy"></td>
        </tr>
        <tr>
          <th>Complaint Name</th>
          <td><input type="text" name="cname" placeholder="Complaint Name"></td>
        </tr>
        <tr>
          <th>Complaint Description</th>
          <td><input type="text" name="cdes" placeholder="Complaint Description"></td>
        </tr>
      </table>
      <button type="submit" class="bbn">Register</button>
    </form>
  </div>
  <div class="csta" id="csta">
  <?php
                    $uid=$_SESSION["Unid"];
										$query2 = "SELECT * FROM Complaint WHERE id='$uid'";
										$query_run2 = mysqli_query($db, $query2);

										if(mysqli_num_rows($query_run2) > 0)
										{
											//$sn=1;
											foreach($query_run2 as $student2)
											{
                                    ?>
                      <table>
                        <tr>
											<th>Name: </th> <td><?= $student2['name'] ?> </td>
                      </tr>
                      <tr>
                      <th> Gender:   </th> <td><?= $student2['gender'] ?></td>
                      </tr>
                      <tr>
                      <th> Complaint Name: </th><td><?= $student2['cname'] ?></td>
                      </tr>
                      <tr>
                      <th>D.O.B: </th><td><?= $student2['dob'] ?></td>
                      </tr>
                      <tr>
                      <th> Complaint Description: </th> <td><?= $student2['cdes'] ?></td>
                      </tr>
                      <tr>
                      <th> Complaint Status: </th><td><?= $student2['cstatus'] ?></td>
                      </tr>
                      </table>
									 <?php
											
											//$sn=$sn+1;
											}
                            }
                            ?>

  </div>
</body>
</html>