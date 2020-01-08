<?php
include('db.php');
$id = $_GET['id'];
$qf = mysqli_query($conn,"SELECT * FROM `tbl_users` where `id`='$id'");
if($qf){
    if(mysqli_num_rows($qf)>0){
        while($row = mysqli_fetch_assoc($qf)){
         $fname = $row['fname'];   
         $lname = $row['lname'];   
         $email = $row['email'];   
         $password = $row['password'];  
        }
    }
}else{
    $fname = "";
    $lname = "";
    $email = "";
    $password = "";
}
//update code
if(isset($_POST['Submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // update querry
    $qu= mysqli_query($conn,"UPDATE `tbl_users` SET `fname`='$fname',`lname`='$lname',`email`='$email',`password`='$password' WHERE `id`='$id'");
    if($qu){
        echo "<script>alert('Updated');window.location.href='insert.php';</script>";
    }else{
        echo "<script>alert('Failed');</script>";
    }
}


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
 float: center;
}
.inputs{
  font-size: 20px;
  width : 400px;
}
#btn{
  margin-top: 2px;
  margin-left: 90px;
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
    <h1 class="heading">Update</h1>
    </div>
    

<table >
    <form action="" method="post"> 
<!-- <div class="forminputs"> -->

   <tr class="rows"><th><label >First Name:</label></th><td><input class="inputs" placeholder="Enter Your First Name" type="text" name="firstname" value="<?php echo $fname; ?>" ></td></tr> 
    <tr class="rows"> <th><label >Last Name:</label></th><td><input class="inputs" placeholder="Enter Your Last Name" type="text" name="lastname" value="<?php echo $lname; ?>"></td></tr>
    <tr class="rows"> <th><label >Email:</label></th><td><input class="inputs" placeholder="Enter Your Email Address " type="email" name="email" value="<?php echo $email; ?>"></td></tr> 
    <tr class="rows"><th><label >Password:</label></th><td> <input class="inputs" placeholder="Enter Your Password" type="password" name="password" value="<?php echo $password; ?>"></td></tr>
    <!-- </div> -->

    </table>

    <input type="submit" id="btn" class="btn btn-primary" name="Submit" value="Update">

        </form>


</body>
</html>