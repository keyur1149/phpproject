
  <?php
require_once "connect.php";
session_start();
$sql = "UPDATE user SET c=? WHERE id=?";
         
if($stmt = mysqli_prepare($link, $sql)){
   
    mysqli_stmt_bind_param($stmt, "si", $param_lan, $param_id);
    
   
    $param_lan = "View";
    $param_id = $_SESSION["userid"];
    
    
    if(mysqli_stmt_execute($stmt)){
        
        header("location:afterlogin.php");
        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
}

?>