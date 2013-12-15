<!DOCTYPE html>
<?php require_once('connect.php');
 ob_start();
    session_start();

if(isset($_SESSION["uname"]) && $_SESSION["priv"]==0)
{
?>
<meta charset="utf-8"> 
<html>
<head>
<title>QueriesOverflow | User </title>
<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
<style type="text/css">
.img-rounded {
  border-radius: 6px;
  
}

.user_hx {
background-color:#c4dae9;
padding:5px;
cursor:pointer;
}

.user_hx:hover{
  background-color:#4a6b82;
}
</style>
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
<div class=""container"">
<!-- -----------------------------------------------Header Begins-------------------------------------------- -->

<div class="img-rounded" style="width:100%; height:100px; background-image:url('./img/circle.png'); margin-bottom:10px;">
<h1 style="position:relative; top:30px; left:40px;"><a href="#">QueriesOverflow</a></h1>
</div>


<?php
if(isset($_POST["btn"])){
mysql_query("Update `queries` set unsatisfied=1, oc=0 where query_id="."'".$_POST["hid"]."'",$con);
}

$data = mysql_query("Select * From `queries` where userid = 'shubham' order by unsatisfied",$con);
$data1 = mysql_query("Select `cid`,`values` From `queries` Natural Join `categories` where userid = 'shubham'");
$arr = array();
while($tup1 = mysql_fetch_array($data1)){
$arr[$tup1[0]]=$tup1[1];

//echo $tup1[0].$tup1[1]."<br>";
}
//echo mysql_num_rows($data);
while($tup = mysql_fetch_array($data)){
?>
<!-- ----------------------------------------------- Header Ends | Body Begins (Query) --------------------------------------- -->
<?php

echo '<div class="hero-unit" style="padding-bottom:50px;">
<h3 style="text-style:underline;"> Questions </h3>
    <h4>'.$tup[1].'</h4> 
<h5 style="float:left;">'.$tup[2].'</h5> <h6 style="position:relative; left:250px; top:10px;"><span style="font-color:#000;">status :
</span>';
if($tup[5]==1)
echo '<span style="color:green">open<span> ';
else
echo '<span style="color:red">closed<span>';
echo '</h6>
<br>
<!-- if else block for either open or close -->

</div>
<!-- ----------------------------------------------- Body Continues (Query) Ends | Answers (Begin) --------------------------- -->

<div class="hero-unit" style="padding-top:10px;">
<h3 style="text-style:underline;"> Answers </h3>
<div style="font-size:10pt; line-height:16px;">'.$tup[3].'</div>

<div style="margin-top:30px;">';


if($tup[9]==0){
echo '<form action="user_queries.php" method="POST">
<input type="hidden" name="hid" value="'.$tup[0].'" >
<input type = "submit" class="btn" value="satisfied" name="btn">
</form>';
}

echo'<span style="font-size:10pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<hx class="user_hx" style="position:relative; left:10%;">tags &nbsp; : &nbsp; '.$arr[$tup[4]].'</hx>
<hx class="user_hx" style="position:relative; left:20%;">importance &nbsp; : &nbsp; '.$tup[7].' </hx>
<hx class="user_hx" style="position:relative; left:30%;">Posted By &nbsp; : &nbsp; '.$tup[8].', &nbsp; on &nbsp; '.$tup[6].'</hx>
</span>
</div>

</div>
';
}
?>
<!-- ----------------------------------------- Body Continues (Answers) Ends | TextBox for entering answers-------------------- -->
<!--<div class="Editor">
		<h2><a href="#">Add Your Comment Here</a></h2>
	<form method="post" action="" id="questionpageform" style="margin-left: 0px !important">
        <p>     
                <textarea name="content" cols="50" rows="15" class="tinymceTextarea"></textarea>
                <br>
                <input type="submit" value="Save" class="btn" />
        </p>
</div>-->
<!-- ----------------------------------------- Body  Ends---------------------------------------------------------------------- -->
<hr>
<div class="footer">
<p>&copy; 2013</p>
</div>
</div>
</div>
</body>
</html>
<?php
ob_flush();}
else
{
echo '<meta http-equiv="refresh" content="1; URL=index.php">'; 
}  ?>
