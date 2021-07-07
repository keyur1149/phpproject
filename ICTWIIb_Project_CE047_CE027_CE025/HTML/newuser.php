<?php

require_once "connect.php";
 

$name = $pass=$cpass=$email = "";
$name_err = $pass_err =$cpass_err=$email_err= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_name = trim($_POST["name"]);
    if(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    $input_pass = trim($_POST["pass"]);
    if(empty($input_pass)){
        $pass_err = "Please enter a password.";
    } elseif(!filter_var($input_pass, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
        $pass_err = "Please enter a valid password.";
    } else{
        $pass = $input_pass;
    }
    

    $input_cpass = trim($_POST["cpass"]);
    if(empty($input_cpass)){
        $cpass_err = "Please enter a confirm password.";
    } elseif(!filter_var($input_pass, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
        $cpass_err = "Please enter a valid confirm password.";
    } else if($input_pass!=$input_cpass){
        $cpass_err = "please enter correct confirm password.";
    }else{
        $cpass = $input_cpass;
    }

    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter your email.";
    // } elseif(!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-z0-9\s]+$/")))){
    //     $email_err = "Please enter a valid email.";
    }else if (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
        $email_err="not valid " ;
    }else{
        $email = $input_email;
    }

    
    if(empty($name_err) && empty($pass_err) && empty($cpass_err) && empty($email_err) ){
        
        $sql = "INSERT INTO user (name,password,email) VALUES (?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_pass,$param_mail,);
            
            
            $param_name = $name;
            $param_pass = $pass;
            $param_mail = $email;
           
            if(mysqli_stmt_execute($stmt)){
               

                header("location: index.php");
                exit();
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
           background: #544a7d;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ffd452, #544a7d);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ffd452, #544a7d); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

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
        display: flex;
    justify-content: center;
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
       form input[type="text"],[type="password"],[type="mail"]{
        width: 350px;
    height: 35px;
       }
       form input[type="submit"],form input[type="reset"]{
        width: 130px;
    height: 45px;
    font-size: 20px;
    background: thistle;
    border: 2px solid black;
    border-radius: 11px;
       }
       form>div{
           display:flex;
           flex-direction: column;
       }
       form input[type="submit"]:hover{
            text-align:center;
            font-size:25px;
       }
      .last{
          padding: 25px 0px;
          display: flex;
          flex-direction: row;
          justify-content: space-between;
      }
    </style>
</head>
<body>
<div>
<h2>Welcome to Udemy</h2>
<div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	
	<div <?php echo (!empty($name_err)); ?>>
    <div class="label">
		<label>Name :-</label>
        </div>
		<input type="text" name="name" value="<?php echo $name; ?>" required>
        <div class="alert"><span><?php echo $name_err;?></span></div>
	</div>
    <div <?php echo (!empty($email_err)); ?>>
    <div class="label">
		<label>Email :-</label>
        </div>
		<input type="mail" name="email" value="<?php echo $email; ?>" required>
		<div class="alert"><span><?php echo $email_err;?></span></div>
	</div>
    
	<div <?php echo (!empty($pass_err)); ?>>
    <div class="label">
		<label>Password :-</label>
        </div>
		<input type="password" name="pass" value="<?php echo $pass; ?>" required>
		<div class="alert"><span><?php echo $pass_err;?></span></div>
	</div>
    <div <?php echo (!empty($cpass_err)); ?>>
    <div class="label">
		<label>Confirm Password :-</label>
	</div>
    	<input type="password" name="cpass" value="<?php echo $cpass; ?>" required>
		<div class="alert"><span><?php echo $cpass_err;?></span></div>
	</div>
    <div class="last">
   <div >
	<input type="submit" value="Sign Up">
    </div>
    <div>
	<input type="reset" value="Reset">
    </div>
    </div>
</form>
</div>
                </div>
</body>
</html>