<?php
    require "functions.php";

    if($_SERVER['REQUEST_METHOD'] == "POST" ){
        $id = $_SESSION['logged']['id'];
        $query = "select score from scores where userID = '$id'";
        $result = mysqli_query($con,$query);
        $count = mysqli_fetch_assoc($result);


        if(empty($count)) {
            $score = 1;
            $query = "insert into scores (userID, score) values ('$id',' $score')";
            
        }
        else{   
            $score = $count['score'] + 1;
            $query = "update scores set score = '$score' where userID = '$id'";
        }     
        $result = mysqli_query($con,$query);    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>My website</title>
</head>
<body>
    
    <?php require_once "header.php";?>

    <h1 style = "margin-top: 5%">Top Ten Clicks</h1>
    <table>
        <thead> 
            <tr>
                <th>Name</th> 
                <th>Place</th> 
                <th>Clicks</th> 
            </tr>
        </thead>
            <tr>
                  <!-- Gets the highest clicks having account and shows the name in the table -->
                <td>    
                        <?php 
                             $query = "SELECT userID FROM scores ORDER BY score DESC";
                             $result = mysqli_query($con,$query);
                              

                             $temp = mysqli_fetch_assoc($result);
                             $id = $temp['userID'];

                             $query = "select username from users where id = '$id'";

                             $result = mysqli_query($con,$query);
                             $temp = mysqli_fetch_assoc($result); 


                            print_r($temp['username']);
                         ?>  
                       
                </td>
                <td>1st</td>

                <!-- Gets the highest clicks having account and shows the clicks in the table -->
                <td>   <?php 
                             $query = "SELECT score FROM scores ORDER BY score DESC";
                             $result = mysqli_query($con,$query);
                             $rank = mysqli_fetch_assoc($result);

                             print_r($rank['score']);
                         ?>     </td>
            </tr>
            <tr>
                <td>
                <?php 
                             $query = "SELECT userID FROM scores ORDER BY score DESC LIMIT 1,2";
                             $result = mysqli_query($con,$query);
                              

                             $temp = mysqli_fetch_assoc($result);
                             $id = $temp['userID'];

                             $query = "select username from users where id = '$id'";

                             $result = mysqli_query($con,$query);
                             $temp = mysqli_fetch_assoc($result); 


                            print_r($temp['username']);
                         ?>      
                </td>
                <td>2nd</td>
                <td><?php 
                             $query = "SELECT score FROM scores ORDER BY score DESC LIMIT 1,2";
                             $result = mysqli_query($con,$query);
                             $rank = mysqli_fetch_assoc($result);

                             print_r($rank['score']);
                         ?> </td>
            </tr>
            <tr>
                <td>
                <?php 
                             $query = "SELECT userID FROM scores ORDER BY score DESC LIMIT 2,3";
                             $result = mysqli_query($con,$query);
                              

                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                $id = $temp['userID'];

                                $query = "select username from users where id = '$id'";
   
                                $result = mysqli_query($con,$query);
                                $temp = mysqli_fetch_assoc($result); 
                                print_r($temp['username']);
                             } 
                            
                         ?>      
                </td>
                <td>3rd</td>
                <td><?php 
                             $query = "SELECT score FROM scores ORDER BY score DESC LIMIT 2,3";
                             $result = mysqli_query($con,$query);
                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                print_r($temp['score']);
                             }
                             
                         ?> </td>
            </tr>
            <tr>
                <td>
                <?php 
                             $query = "SELECT userID FROM scores ORDER BY score DESC LIMIT 3,4";
                             $result = mysqli_query($con,$query);
                              

                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                $id = $temp['userID'];

                                $query = "select username from users where id = '$id'";
   
                                $result = mysqli_query($con,$query);
                                $temp = mysqli_fetch_assoc($result); 
                                print_r($temp['username']);
                             }
                         ?>      
                </td>
                <td>4th</td>
                <td><?php 
                             $query = "SELECT score FROM scores ORDER BY score DESC LIMIT 3,4";
                             $result = mysqli_query($con,$query);
                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                print_r($temp['score']);
                             }
                         ?> </td>
            </tr>
            <tr>
                <td>
                <?php 
                             $query = "SELECT userID FROM scores ORDER BY score DESC LIMIT 4,5";
                             $result = mysqli_query($con,$query);
                              

                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                $id = $temp['userID'];

                                $query = "select username from users where id = '$id'";
   
                                $result = mysqli_query($con,$query);
                                $temp = mysqli_fetch_assoc($result); 
                                print_r($temp['username']);
                             }
                         ?>      
                </td>
                <td>5th</td>
                <td><?php 
                             $query = "SELECT score FROM scores ORDER BY score DESC LIMIT 4,5";
                             $result = mysqli_query($con,$query);
                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                print_r($temp['score']);
                             }
                         ?> </td>
            </tr>
            <tr>
                <td>
                <?php 
                             $query = "SELECT userID FROM scores ORDER BY score DESC LIMIT 5,6";
                             $result = mysqli_query($con,$query);
                              

                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                $id = $temp['userID'];

                                $query = "select username from users where id = '$id'";
   
                                $result = mysqli_query($con,$query);
                                $temp = mysqli_fetch_assoc($result); 
                                print_r($temp['username']);
                             }
                         ?>     
                </td>
                <td>6th</td>
                <td><?php 
                             $query = "SELECT score FROM scores ORDER BY score DESC LIMIT 5,6";
                             $result = mysqli_query($con,$query);
                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                print_r($temp['score']);
                             }
                         ?> </td>
            </tr>
            <tr>
                <td>
                <?php 
                             $query = "SELECT userID FROM scores ORDER BY score DESC LIMIT 6,7";
                             $result = mysqli_query($con,$query);
                              

                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                $id = $temp['userID'];

                                $query = "select username from users where id = '$id'";
   
                                $result = mysqli_query($con,$query);
                                $temp = mysqli_fetch_assoc($result); 
                                print_r($temp['username']);
                             }
                         ?> 
                </td>
                <td>7th</td>
                <td><?php 
                             $query = "SELECT score FROM scores ORDER BY score DESC LIMIT 6,7";
                             $result = mysqli_query($con,$query);
                             if(!empty($temp)){
                                print_r($temp['score']);
                             }
                         ?> </td>
            </tr>
            <tr>
                <td>
                <?php 
                             $query = "SELECT userID FROM scores ORDER BY score DESC LIMIT 7,8";
                             $result = mysqli_query($con,$query);
                              

                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                $id = $temp['userID'];

                                $query = "select username from users where id = '$id'";
   
                                $result = mysqli_query($con,$query);
                                $temp = mysqli_fetch_assoc($result); 
                                print_r($temp['username']);
                             }
                         ?>      
                </td>
                <td>8th</td>
                <td><?php 
                             $query = "SELECT score FROM scores ORDER BY score DESC LIMIT 7,8";
                             $result = mysqli_query($con,$query);
                             if(!empty($temp)){
                                print_r($temp['score']);
                             }
                         ?> </td>
            </tr>
            <tr>
                <td>
                <?php 
                             $query = "SELECT userID FROM scores ORDER BY score DESC LIMIT 8,9";
                             $result = mysqli_query($con,$query);
                              

                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                $id = $temp['userID'];

                                $query = "select username from users where id = '$id'";
   
                                $result = mysqli_query($con,$query);
                                $temp = mysqli_fetch_assoc($result); 
                                print_r($temp['username']);
                             }
                         ?>      
                </td>
                <td>9th</td>
                <td><?php 
                             $query = "SELECT score FROM scores ORDER BY score DESC LIMIT 8,9";
                             $result = mysqli_query($con,$query);
                             if(!empty($temp)){
                                print_r($temp['score']);
                             }
                         ?> </td>
            </tr>
            <tr>
                <td>
                <?php 
                             $query = "SELECT userID FROM scores ORDER BY score DESC LIMIT 9,10";
                             $result = mysqli_query($con,$query);
                              

                             $temp = mysqli_fetch_assoc($result);
                             if(!empty($temp)){
                                $id = $temp['userID'];

                                $query = "select username from users where id = '$id'";
   
                                $result = mysqli_query($con,$query);
                                $temp = mysqli_fetch_assoc($result); 
                                print_r($temp['username']);
                             }
                         ?>      
                </td>
                <td>10th</td>
                <td><?php 
                             $query = "SELECT score FROM scores ORDER BY score DESC LIMIT 9,10";
                             $result = mysqli_query($con,$query);
                             if(!empty($temp)){
                                print_r($temp['score']);
                             }
                         ?> </td>
            </tr>
            
   
        <form method = "post" >
            <button style = "margin: auto;">Click!</button>
        </form>


    </table>
    
    <style>
        table{ 
           margin: 1% auto;
           border-collapse: collapse;  
           border-radius: 40%; 
           filter:drop-shadow(0px 0px 4px lightgrey);
           
        }

        th, td{
            padding: 0 100px;
            border:none;
            background-color: white;
            padding: 10px 80px;
            
            
        }
        thead tr th{
           color: white;
           background-color: #50B2D8;
        }

        button{
                border: none;
                padding: 3px 16px;
                cursor: pointer;
        }

        button:hover{
            background-color: lightgrey;
        }



        
    </style>

</body>
</html>