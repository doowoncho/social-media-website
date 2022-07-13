<?php
    require "functions.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
       
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);

       
        $query = "select * from users where username = '$username' && password = '$password'";

        $result = mysqli_query($con,$query);

       if(mysqli_num_rows($result) > 0){

          $row = mysqli_fetch_assoc($result);
        
          $_SESSION['logged'] = $row;
        
          print_r($row);

            header("Location: profile.php");
            die;

       }else{
        $error = "wrong password or email";
       }
      
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php require "header.php"; ?>

   

    <?php
        if(!empty($error)){
            echo "<div>".$error."</error>";
        }

    ?>

    <div class = "form">
    
    <form method = "post" style = "margin: 50px;">
    <!-- <h3>Login</h2>    -->
        <input type = "text" name = "username" placeholder="username">
        <br>
        <input type = "password" name = "password" placeholder="password">
        <br>

        <button>login</button>
    </form>

    </div>

    <style>
         *{
            margin: 0px;
            padding: 0px;
        }

        h3{
            font-size: 18px;
            color: white;
        }
        body{
            background-color: #1F1F1F;
        }

        .form{
            max-width: 400px;
            margin: 17% auto; 
            text-align: center;
            border-radius: 30px;
        }

        input{
            border:none;  
            padding:10px;  
            border: 1px solid grey;
            border-radius: 30px;
            margin: 8px 0px;   
            background: none;  
            
        }

        input[type = "text"], input[type = "password"],select{
            color: white;
            
        }

        button{
            padding: 10px 78px;
            border-radius: 30px;
            border: none;
            cursor: pointer;
        }

        button:hover{
            background-color: lightgrey;
        }

        header div a, header{
            background-color: #1F1F1F;
            color: white;
            filter: none;
        }


    </style>

    
</body>
</html>