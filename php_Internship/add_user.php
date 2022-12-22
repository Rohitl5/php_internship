<?php
    $conn = mysqli_connect("localhost","root","","intern","3307");
    if(!$conn){
        echo "cant connect" .mysqli_connect_error($conn);
        exit;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "INSERT INTO users(username , password) VALUES('$username','$password')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "<script>
        alert('try again!'); 
        </script>" .mysqli_error($conn);
    }
    else{
    echo "<script>
    location.href = 'index.php';
    </script>";
    }
?>
