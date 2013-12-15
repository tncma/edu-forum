<?php
    ob_start();
    session_start();
	echo "started";
    include("connection.php");
    $id=$_POST['uname'];
    $pwd=$_POST['password'];
    $table_name="login";
	echo $id;
if($id !="" || $pwd !=""){
    $sql="SELECT * FROM `login` WHERE userid=$id";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $name=$row['userid'];
    $password=$row['password'];
    echo $pwd;
	if(!($id || $_POST['pwd']))
    {
        echo "user name or password wrong could not sign in";
    }
    if($password!=$_POST['pwd'])
    {
        echo $_POST['pwd'];
        echo "password not right";
        echo $password;
        //header("Location: http://localhost/ourweb/index_error.php");
        exit;
    }    
	if($password==$_POST['pwd'])
    {
        echo 'success';
        $_SESSION['uname']=$id;
	$_SESSION['priv'] = 0;
        header("Location: http://localhost/bootstrap/question_page.php");  
     }
    else
    {
        echo 'enter password';
    }
ob_flush();}else{
header("Location: http://localhost/bootstrap/index.php"); 
}
    
?>
