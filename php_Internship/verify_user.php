<?php
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
 else if($username  !=$row['username'] OR $password !=$row['password']){

    echo  "<script>
        alert='either username or password is incorrect  ';
        location.replace('login.php');
        </script>" ;

}
else{
    echo  "<script>
   
    location.replace('main.php');
    </script>" ;

}
