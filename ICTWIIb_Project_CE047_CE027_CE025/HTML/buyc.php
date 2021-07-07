<?php

require_once "connect.php";
 session_start();

$acc = $ifsc=$rupess= "";
$acc_err = $ifsc_err=$rupess_err= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_acc = trim($_POST["acc"]);
    if(!filter_var($input_acc, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9\s]+$/")))){
        $acc_err = "Please enter a valid account number.";
    } else if($input_acc<1000000000){
        $acc_err = "Please enter a more numbers";
    }else{
        $acc = $input_acc;
    }
    
    $input_ifsc = trim($_POST["ifsc"]);
    if(empty($input_ifsc)){
        $ifsc_err = "Please enter a ifsc.";
    } elseif(!filter_var($input_ifsc, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[A-Z0-9\s]+$/")))){
        $ifsc_err = "Please enter a valid ifsc.";
    } else{
        $ifsc = $input_ifsc;
    }
    

    

    $input_rupess = trim($_POST["rupees"]);
    if(empty($input_rupess)){
        $rupess_err = "Please enter rupess.";
    } elseif($input_rupess!=1000){
        $rupess_err = "Please enter a valid rupess.";
    }else{
        $rupess = $input_rupess;
    }

    
    if(empty($acc_err) && empty($ifsc_err) && empty($rupess_err) ){
        
        $sql = "INSERT INTO bank (userid,accnumber,IFSC,rupess) VALUES (?,?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "iisi", $param_id,$param_acc, $param_ifsc,$param_rupess,);
            
            $param_id=$_SESSION['userid'];
            $param_acc = $acc;
            $param_ifsc = $ifsc;
            $param_rupess = $rupess;
           
            if(mysqli_stmt_execute($stmt)){
                
               
                header("location:buyc2.php");

                // exit();
                // echo "success";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
      
        // mysqli_stmt_close($stmt);
    }
    
  
    mysqli_close($link);
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cool learning</title>
    <style>
       body{
           margin:0px;
           /* background:linear-gradient(red 10%, 30%, blue 90%); */
           background: #ff9966;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ff5e62, #ff9966);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ff5e62, #ff9966); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


            }
       body>div{
        margin: 0px 100px;
           padding: 100px;
       }
       body>div>h2{
           font-size:50px;
           text-align:center;
       }
       body>div>div{
           padding:0px 250px;
       }
       form{
        padding: 90px 75px;
        /* background:#9b8f38;   */
       }
       .label{
           font-size:25px;
           margin:15px 0px;
       }
       .alert{
           color:red;
       }
       form input[type="number"],form input[type="text"]{
        width: 350px;
    height: 35px;
       }
       form input[type="submit"]{
        width: 130px;
    height: 45px;
    font-size: 20px;
    background: thistle;
    border: 2px solid black;
    border-radius: 11px;
       }
       form a{
        color: black;
    background: thistle;
    text-decoration: none;
    padding: 9px 30px;
    border: 2px solid black;
    font-size: 20px;
    border-radius: 10px;
       }
       form input[type="submit"]:hover,form a:hover{
            text-align:center;
            font-size:25px;
       }
      .last{
          padding: 25px 0px;
          display: flex;
          justify-content: space-between;
          align-items: center;
      }
    </style>
</head>
<body>
<div>
<h2>Enter A Bank Detail </h2>
<div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	
	<div <?php echo (!empty($acc_err)); ?>">
    <div class="label">
		<label>BANK Account Number :-</label>
        </div>
		<input type="number" name="acc" value="<?php echo $acc; ?>" required>
        <div class="alert"><span><?php echo $acc_err;?></span></div>
	</div>
    <div <?php echo (!empty($ifsc_err)); ?>">
    <div class="label">
		<label>Bank IFSC Code :-</label>
        </div>
		<input type="text" name="ifsc" value="<?php echo $ifsc; ?>" required>
		<div class="alert"><span><?php echo $ifsc_err;?></span></div>
	</div>
    
	<div <?php echo (!empty($rupess_err)); ?>">
    <div class="label">
		<label>Rupees :-</label>
        </div>
		<input type="number" name="rupees" value="1000" required>
		<div class="alert"><span><?php echo $rupess_err;?></span></div>
	</div>
   
    <div class="last">
   <div >
	<input type="submit" value="PayNow">
    </div>
    <div>
	<a href="afterlogin.php">Cancel</a>
    </div>
    </div>
</form>
</div>
                </div>
</body>
</html>