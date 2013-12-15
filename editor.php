<!DOCTYPE html>
<?php require_once('connect.php');
 ob_start();
    session_start();

if(isset($_SESSION["uname"]) && $_SESSION["priv"]==1){
?>
<meta charset="utf-8"> 
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/custom.css"/>
<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
		tinyMCE.init({
                mode : "textareas"
			});
	</script>
</head>
<body>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<div style="margin:auto 40px;">


<div class="hero-unit">
<?php
if(isset($_POST["but"])){
//echo "hello";
$sql="Update `queries` set answers='".$_POST["content"]."',oc=0,unsatisfied=1 where query_id = $_POST[hid]";
//echo $sql;
mysql_query($sql,$con);
echo '<meta http-equiv="refresh" content="1; URL=admin_queries.php">';
}

if(isset($_POST["answer"])){
$data = mysql_query("Select * From `queries` where query_id = "."'".$_POST["hid"]."'",$con);

while($tup = mysql_fetch_array($data)){

echo '
<h3 style="text-style:underline;"> Questions </h3>
    <h4>'.$tup[1].'</h4>
<h5 style="float:left;">'.$tup[2].'</h5>';
}}
?>
</div>


<div class="Editor">
		<h2><a href="#">Add Your Comment Here</a></h2>
	<form method="post" action="" id="questionpageform" style="margin-left: 0px !important">
        <p>     
		<?php 
		echo '<input type="hidden" name="hid" value=';
		echo $_POST["hid"];
		echo '>'; 

		//echo $_POST["hid"];
		?>
                <textarea name="content" cols="50" rows="15" class="tinymceTextarea"></textarea>
                <br>
                <input type="submit" value="Save" class="btn" name="but"/>
        </p>
</div>
</body>
</html>
<?php 

ob_flush();} else{echo '<meta http-equiv="refresh" content="1; URL=admin_login.php">'; }?>
