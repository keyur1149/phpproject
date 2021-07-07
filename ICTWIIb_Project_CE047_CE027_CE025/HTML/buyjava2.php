
  <?php
require_once "connect.php";
session_start();
$sql = "UPDATE user SET java=? WHERE id=?";
         
if($stmt = mysqli_prepare($link, $sql)){
   
    mysqli_stmt_bind_param($stmt, "si", $param_name, $param_note);
    
   
    $param_name = "View";
    $param_note = $_SESSION["userid"];
    
    
    if(mysqli_stmt_execute($stmt)){
        
        header("location: afterlogin.php");
        exit();
    } else{
        echo "Something went wrong. Please try again later.";
    }
}

?>