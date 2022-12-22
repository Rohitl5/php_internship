<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
.text-center{

    width:70%;
    margin:auto;
    padding:20px;
    margin-top:10px;

}

</style>
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!-- main page -->
<div class="text-center">
<h1>login page</h1>
<!-- 
<form   action="verify_user.php" method="post" > -->
<form   action="<?=$_SERVER['PHP_SELF'];?>" method="post" >

  <div class="form-group">
    <label for="exampleInputEmail1">USER NAME</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  name="username" aria-describedby="emailHelp" placeholder="Enter name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>


<?php
if(isset($_POST['submit'])){


    $conn = mysqli_connect("localhost","root","","intern","3307");
    if(!$conn){
        echo "cant connect" .mysqli_connect_error($conn);
        exit;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query= "SELECT username, password FROM users WHERE username='$username' AND password='$password';";
    $result = mysqli_query($conn,$query);
    $row= mysqli_fetch_assoc($result);


 
    // here we are checking if wre have same values in our data base or not
    if(!$row){
        echo  "<script>
        alert='first create a user id to login to next page ';
        location.replace('index.php');
        </script>" ;
    }

    //yahan ham check kar rahe h ki row  variable mein jo values aaye hue h vo values login form se aye hue values se match khate h ki nahi 
    else if($username  =$row['username'] AND $password =$row['password']){


        $_SESSION["username"]=$username;
      //  $_SESSION["password"]='$password';
        echo  "<script>
      
         location.replace('main.php');
         </script>" ;

    }
   
}
?>
