<!DOCTYPE html>
<?php
require_once('connect.php');
 ob_start();
    session_start();

if(isset($_SESSION["uname"]) && $_SESSION["priv"]==0)
{
?>
<html>
  <head>
    <meta charset = "utf-8">
    <title>User Login</title>
    <link rel="stylesheet" href="css/bootstrap.css"  type="text/css" /> 
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" class="cssdeck">
    <link rel="stylesheet" type="text/css" href="css/social-buttons.css"/>
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
        <div class="img-rounded" style="width:100%; height:100px; background-image:url('./img/circle.png'); margin-bottom:10px;">
		<h1 style="position:relative; top:30px; left:40px;"><a href="#">QueriesOverflow</a></h1>
		</div>
<form action="user_queries.php" method="POST" class="queries">
<input type="submit" class="btn btn-success" value="user queries" style="float:right;">
</form>

<?php if(isset($_POST["logout"])){
session.destroy();
} ?>
<form action="index.php" method="POST" class="logout">
<input type="submit" class="btn btn-success" value="logout"  name="logout">
</form>
        <div class="container">
        	<center><h1><a href="#">Add New Post </a></h1></center>

<?php 

if(isset($_POST["sub"]) && $_POST["title"] != "" && $_POST["content"] != "" && $_POST["selection"] != ""){
$date = date('Y-m-d H:i:s');
$sql="INSERT INTO `queries` (`query_title`,`query_text`,`date_sub`,`cid`,`oc`,`importance`,`userid`,`unsatisfied`) VALUES ("."'".$_POST["title"]."'".","."'".$_POST["content"]."'".","."'".$date."'".","."'".$_POST["selection"]."'".",1,0,'shubham',0)";
mysql_query($sql,$con);
}

?>

<form method="POST" action="question_page.php">  
      	
<h4>Title</h4> 	
	    <input type="text" name="title">
		
		 <h4>Category</h4>


		 <select name="selection">
<option selected='selected' value=''></option>

<?php 
$result = mysql_query("SELECT * FROM categories");

while($tup = mysql_fetch_array($result)){
echo "<option value='".$tup[0]."'>".$tup[1]."</option>";
}

?>

		</select> 
		<br>
		<br>
		<br>
	  </div>

	  <div class="Editor">
	  	
        <p>     


<div id="questionpageform">
                <textarea name="content" cols="50" rows="15" class="tinymceTextarea"></textarea>
                <br>
                <input type="submit" value="Submit" class="btn" name="sub" >
</div>
        </p>


</form>
	  </div>
</div>
</div>
</body>
</head>
</html>
<?php 

 ob_flush();}else {echo '<meta http-equiv="refresh" content="1; URL=index.php">'; }?>
