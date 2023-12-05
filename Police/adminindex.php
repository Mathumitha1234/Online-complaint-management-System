<?php
session_start();
include("config.php");
?>
<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $stat = mysqli_real_escape_string($db,$_POST['status']);
      

      $sql = " UPDATE complaint SET cstatus='$stat' ";
      $result = mysqli_query($db,$sql);
    
      //$active = $row['active'];
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($result) {         
         echo "<script>alert('Complaint Registered Sucessfully');</script>";
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
  <link rel="stylesheet" href="adminindex.css">
</head>
<body >
<div class="topnav">
  <a href="#home" >Home</a>
  <a href="#products">Complaint Details</a>
  <a href="index.html" class="Link">Log-Out</a>
</div> 
<section class="home" id="home">
<?php
                    $uid=$_SESSION["Unid"];
                    $password=$_SESSION["pass"];
										$query2 = "SELECT * FROM police WHERE pid='$uid' and ppass='$password'";
										$query_run2 = mysqli_query($db, $query2);

										if(mysqli_num_rows($query_run2) > 0)
										{
											//$sn=1;
											foreach($query_run2 as $student2)
											{
                                    ?>
                                    <div class="details">
                                    <p align=center style="padding-bottom:30px;">Welcome <?= $student2['pname'] ?> Have a good day!</p>
                                    <table >
                                      <tr><td>Police Name: </td>
                                      <td><?= $student2['pname'] ?> </td>
                                      </tr>
                                      <tr><td>Email: </td>
                                      <td><?= $student2['pmail'] ?> </td>
                                      </tr>
                                      <tr><td>Mobile No: </td>
                                      <td><?= $student2['pphone'] ?> </td>
                                      </tr>
                                      <tr><td>Unique ID:</td>
                                      <td><?= $student2['pid'] ?></td>
                                      </tr>
                      </table>
                      </div>
									 <?php
											
											//$sn=$sn+1;
											}
                            }
                            ?>
</section>
<section class="products" id="products">
  <section class="product">
    <form method="post">
    <table>
    
      <tr>
        <th>Name</th>
        <th>Id</th>
        <th>Gender</th>
        <th>D.O.B</th>
        <th>Complaint Name</th>
        <th>Complaint Description</th>
        <th>Complaint Status</th>
      </tr>
      <?php
      $query2 = "SELECT * FROM complaint";
										$query_run2 = mysqli_query($db, $query2);

										if(mysqli_num_rows($query_run2) > 0)
										{
											//$sn=1;
											foreach($query_run2 as $student2)
											{
                                    ?>
      <tr>
      <td><?=$student2['name'] ?> </td>
      <td><?=$student2['id'] ?> </td>
      <td><?=$student2['gender'] ?> </td>
      <td><?=$student2['dob'] ?> </td>
      <td><?=$student2['cname'] ?> </td>
      <td><?=$student2['cdes'] ?> </td>
      <td><select name="status" id="sts">
        <option value="Viewed">Viewed</option>
        <option value="Investigating">Investigating</option>
        <option value="Completed">Completed</option>
      </select></td>
      </tr>
      

                                     <?php
											
											//$sn=$sn+1;
											}
                            }
                            ?>
    </table>
    <button type="submit">Save</button>
    </form>
  </section>
</section>
</body>
</html>