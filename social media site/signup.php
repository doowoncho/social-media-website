<?php
    require "functions.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
       
        $username = addslashes($_POST['username']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $date = date('Y-m-d');


        $query = "SELECT username FROM users WHERE username = '$username'";
        $result = mysqli_query($con,$query);
        $temp = mysqli_fetch_assoc($result); 

        if(empty($temp)){
            $query = "insert into users (username, email, password, date) values ('$username',' $email', '$password', '$date')";

            $result = mysqli_query($con,$query);

            header("Location: login.php");
            die;
        }
        else{
            echo "username already exists";
        }

        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up!</title>
</head>
<body>
    <?php require "header.php"; ?>
    <h1 style = "margin-top: 50px;">
    Join 
    
    <?php 
        $query = "SELECT COUNT(*) from users";

        $result = mysqli_query($con,$query);

        $temp = mysqli_fetch_assoc($result); 

        print_r ($temp['COUNT(*)']);
    
    ?>
         other users!</h1>
   

    <div class = "form">
        
    <form method = "post" style = "margin: 10%;">
        <input type = "text" name = "username" placeholder="username" required>
        <br>
        <br>
        <input type = "email" name = "email" placeholder="email" required>
        <br>
        <br>
        <input type = "password" name = "password" placeholder="password" required>
        <br>

        <button>Submit</button>
    </form>

    </div>
   
    
    <style>

        *{
            margin: 0px;
            padding: 0px;
        }
        .form{
            border: 2px solid black;
            max-width: 400px;
            margin: 70px auto; 
            box-shadow:    10px 10px #888888;
            text-align: center;
        }

        input{
            border:none;  
            padding:10px;  
            border-bottom: 2px solid grey;
            margin: 8px 0px;     
            
        }

        button{
            padding: 10px 78px;
            border: none;
        }

        button:hover{
            background-color: lightgrey;
        }
        
    </style>

</body>
</html>