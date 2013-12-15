<?php
ob_start();
session_start();
	include ("connection.php");
    $table_name="profile";
    $name=$_POST['uname'];
    $_SESSION['uname']=$name;
    $_SESSION['priv'] = 0;
    echo $name;
    $pwd=$_POST['password'];
    $mail=$_POST['email'];
    $addr=$_POST['address'];
    $sql1="insert into `$table_name`
                values ('$name','$pwd','$mail','$addr')";
	$table_name="login";
	$sql2="insert into `$table_name` values ('$name','$pwd',0)";
    $result1 = mysql_query($sql1);
	$result2 = mysql_query($sql2);
    if($result1){
	echo "sucess";
	echo '<meta http-equiv="refresh" content="1; URL=question_page.php">';
	}
	else{
		echo "failure";
	}
ob_flush();
?>
