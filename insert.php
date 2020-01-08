<?php
include('db.php');


?>
<!DOCTYPE html>
<html lang="en">
<style>
.header{
    background-color: grey;
}
.heading{
    text-align : center;
    color : white;
}
.forminputs{
  text-align : center;
  font-weight:bold;
 margin-left: 500px;
 
}
.inputs{
  font-size: 20px;
  width : 400px;
}
#btn{
  margin-top: 2px;
  margin-left: 590px;
  width : 100px;
  font-size: 25px;
}

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
    <h1 class="heading">Crud Operations</h1>
    </div>
    <?php

if(isset($_POST['Submit'])){
 
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];    
    $email = $_POST['email'];    
    $password = $_POST['password'];
    
    $q = mysqli_query($conn,"INSERT INTO `tbl_users`(`fname`, `lname`, `email`, `password`) VALUES ('$fname','$lname','$email','$password')");
    if($q){
        echo"<script>alert('inserted');</script>";
        
        $fname = "";
        $lname = "";    
        $email = "";    
        $password = "";
    }else{
        echo "Failed";
    }
}else{
  
    $fname = "";
    $lname = "";    
    $email = "";    
    $password = "";
}

?>


<table class="forminputs">
<div >

    <form action="" method="post"> 

   <tr class="rows"><th><label >First Name:</label></th><td><input class="inputs" placeholder="Enter Your First Name" type="text" name="firstname" ></td></tr> 
    <tr class="rows"> <th><label >Last Name:</label></th><td><input class="inputs" placeholder="Enter Your Last Name" type="text" name="lastname" ></td></tr>
    <tr class="rows"> <th><label >Email:</label></th><td><input class="inputs" placeholder="Enter Your Email Address " type="email" name="email" ></td></tr> 
    <tr class="rows"><th><label >Password:</label></th><td> <input class="inputs" placeholder="Enter Your Password" type="password" name="password" ></td></tr>

    </table>
    <input type="submit" id="btn" class="btn btn-primary" name="Submit" value="Insert">



        </form>
        </div>

 <div class="container">   
        <table style="margin:20px;" class=" table table-striped table-hover table-bordered">
 
  <thead class="thead-dark">
    <tr>
     
      <th >First Name</th>
      <th>Last Name</th>
      <th >Email</th>
      <th >Password</th>
      <th >Edit</th>
      <th >Delete</th>


    </tr>
  </thead>
  <tbody>
  <?php
  $qf =mysqli_query($conn,"SELECT * FROM `tbl_users`");
  while($row = mysqli_fetch_array($qf)){

  
  ?>
    <tr >
 
    <th><?php echo $row[1]?></th>
      <th><?php echo $row[2]?></th>
      <td ><?php echo $row[3]?></td>
      <td><?php echo $row[4]?></td>
     
      
     <td></a>&nbsp;<a href="update.php?id= <?php echo $row['id']; ?>"  class="btn btn-success">Edit</a>
      </td>
      <td></a>&nbsp;<a href="delete1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
      </td>

    </tr>
 
  <?php
  } 
  ?> 
  </tbody>
</table>
</div>
</body>
</html>