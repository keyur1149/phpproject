<?php
require_once "connect.php";
session_start();
$username=$_SESSION["user"] ;
$s="SELECT * FROM `user` WHERE `name`='$username'";
        $re=mysqli_query($link,$s);
        $keyur= mysqli_num_rows($re);
        if($keyur==1){
            $row= mysqli_fetch_assoc($re);
            $css=$row['css'];
            $c1=$row['c1'];
            $c=$row['c'];
            $html=$row['html'];
            $js=$row['js'];
            $java=$row['java'];
            $python=$row['python'];
        }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            margin: 0px;
            padding: 0px;
        }
        body>div{
            margin: 20px;
            padding: 25px 100px;
        }
        h1{
            text-align: center;
            font-size: 45px;
        }
        .all{
            display: flex;
            padding: 35px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .product{
            border: 2px solid red;
            padding: 20px   ;
            display: flex;
            flex-direction: column;
    align-items: center;
        }
        .product>img{
            width: 250px;
            height: 250px;
        }
        .product>p{
            font-size: 25px;
        }
        .product>a{
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: black;
            background-color: aqua;
            border-radius: 5px;
            font-size: 25px;
        }
        .log>a{
            text-decoration: none;
            color: white;
            font-size: 25px;
            padding:15px;
            background-color:black;
            text-align:center;
            border:2px solid black;

        }
        .log{
            margin-top:50px;
        }
       
@media only screen and (max-width: 1200px){
       .product>img{
           width:200px;
           height:200px;
       }
}
@media only screen and (max-width: 800px){
        .all {
            padding:0px;
        }
        body>div{
            padding:25px 50px;
            margin:0px;
        }
}
@media only screen and (max-width: 590px){
    .product>img{
           width:150px;
           height:150px;
       }
}
    </style>
</head>

<body>
    <div class="log">
        <a href="logout.php">logout</a>
</div>
  
        <div>
    
        <h1>which course you buy ?</h1>
        <div class="all">
            <div class="product">
                <img src="lan/c++.png">
                <p>C++</p>
                <p>Only 1500₹</p>
                <?php 
                if($c1=="BUY")
                echo "<a href='buyc++.php'>BUY</a>";
                else
                echo "<a href='C++/viewc++.html'>VIEW</a>";
                ?>
            </div>
            <div class="product">
                <img src="lan/c.png">
                <p>C</p>
                <p>Only 1000₹</p>
                <?php 
                if($c=="BUY")
                echo "<a href='buyc.php'>BUY</a>";
                else
                echo "<a href='C/viewc.html'>VIEW</a>";
                ?>
            </div>
            <div class="product">
                <img src="lan/css.png">
                <p>CSS</p>
                <p>Only 2000₹</p>
                <?php 
                if($css=="BUY")
                echo "<a href='buy.php'>BUY</a>";
                else
                echo "<a href='CSS/viewcss.html'>VIEW</a>";
                ?>
            </div>
            <div class="product">
                <img src="lan/html.png">
                <p>HTML</p>
                <p>Only 500₹</p>
                <?php 
                if($html=="BUY")
                echo "<a href='buyhtml.php'>BUY</a>";
                else
                echo "<a href='html/viewhtml.html'>VIEW</a>";
                ?>
            </div>
            <div class="product">
                <img src="lan/js.png">
                <p>JS</p>
                <p>Only 1500₹</p>
                <?php 
                if($js=="BUY")
                echo "<a href='buyjs.php'>BUY</a>";
                else
                echo "<a href='JS/viewjs.html'>VIEW</a>";
                ?>
            </div>
            <div class="product">
                <img src="lan/python.png">
                <p>Python</p>
                <p>Only 5000₹</p>
                <?php 
                if($python=="BUY")
                echo "<a href='buypython.php'>BUY</a>";
                else
                echo "<a href='python/viewpython.html'>VIEW</a>";
                ?>
            </div>
            <div class="product">
                <img src="lan/java.png">
                <p>Java</p>
                <p>Only 2500₹</p>
                <?php 
                if($java=="BUY")
                echo "<a href='buyjava.php'>BUY</a>";
                else
                echo "<a href='JAVA/viewjs.html'>VIEW</a>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>