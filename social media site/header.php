<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles.css">
    
    <title>Document</title>
</head>
<body>

    <header>
        <div>
            <a href = "index.php">home</a>
            
            <?php if(empty($_SESSION)):?>
                <a href = "login.php">login</a>
                <a href = "signup.php">signup</a>
               
            <?php else:?>
                <a href = "profile.php">profile</a>
                <a href = "leaderboard.php">leaderboard</a>
                <a href = "logout.php">logout</a>
            <?php endif;?>
        </div>
    </header>
                
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap');
        *{
            font-family: 'Nunito Sans', sans-serif;
            margin: 0px;
            
        }

        body{
            text-align: center;
        }

        header{
            background-color: white;
            filter: drop-shadow(0 0 1px #a9a9a9);
            padding: 6px;
        }

        div a{
            color: black;
            text-decoration: none;
            padding:  0px 100px;
            font-size: 18px;
        }

        a:hover{
            color:red;
        }
        
    </style>

</body>
</html>