<?php
    require "functions.php";

    check_login();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
    
        $image_added = false;
        if(!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0){
            //files was uploaded
            $folder = "uploads/";
            if(!file_exists($folder)){
                mkdir($folder, 0777, true);
            }
            $image = $folder . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $image);

            //cant upload the same file or thing crashes
            // if(file_exists($_SESSION['logged']['image'])){
            //     unlink($_SESSION['logged']['image']);
            // }
            $image_added = true;
        }
    
        $username = addslashes($_POST['username']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $date = date('Y-m-d');
        $id = $_SESSION['logged']['id'];

        if($image_added == true){
            $query = "update users set username = '$username', email = '$email', password = '$password', image = '$image' where id = '$id'";
        }
        else{
            $query = "update users set username = '$username', email = '$email', password = '$password' WHERE id = '$id'";
        }
        $result = mysqli_query($con,$query);

        $query = "select * from users where id = '$id'";
        $result = mysqli_query($con,$query);
      
        
       if(mysqli_num_rows($result) > 0)
       {
            $_SESSION['logged'] = mysqli_fetch_assoc($result);
       }
        
        header("Location: profile.php");
        die;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once "header.php";?>

    <?php if(!empty($_GET['action']) && $_GET['action'] == 'edit'):?>
        edit mode

        <form method = "post" enctype="multipart/form-data" style = "margin: 15%;">
        <img src = "<?php echo $_SESSION['logged']['image']?>" style = "width:100px;height:100px;"></img>
        <br>
        image: <input  type="file" name = "image">
        <br>
        <br>
        Username
        <input value = "<?php echo $_SESSION['logged']['username']?>" type = "text" name = "username" placeholder="username" required>
        <br>
        <br>
        Email
        <input value = "<?php echo $_SESSION['logged']['email']?>" type = "email" name = "email" placeholder="email" required>
        <br>
        <br>
        Password
        <input value = "<?php echo $_SESSION['logged']['password']?>" type = "password" name = "password" placeholder="password" required>
        <br>
        <br>

        <button>save</button>
        <a href="profile.php">
            <button type =  "button" >cancel</button>
        </a>
        
    </form>
    <?php else:?>

        <img src = "<?php echo $_SESSION['logged']['image']?>" style = "margin-top: 15%;width:100px;height:100px;">

        <h1><?php echo $_SESSION['logged']['username']?></h1>
        <h4><?php echo $_SESSION['logged']['email']?></h1>

        <br>
        <a href="profile.php?action=edit">
            <button style = "padding: 2px 10px; ">edit</button>
        </a>

    <?php endif;?>

    <style>
    button{
        cursor: pointer;
    }
    </style>


  
</body>
</html>