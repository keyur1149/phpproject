<?php

require_once "connect.php";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        
		$uname=$_POST['username'];
		$pass=$_POST['userpassword'];
        $sql = "Select * from user where name='$uname' and password='$pass'";
		if ($result = $link -> query($sql)) {
		session_start();
		while($row = $result->fetch_assoc()) {
			$keyur= $row['name'];
		$_SESSION['user'] = $keyur;
		$_SESSION["userid"] = $row["id"];
      
       header("Location:afterlogin.php");
  }
		
		$result -> free_result();
}
    mysqli_close($link);
}
?>