<?php require_once('connect.php') ?> 

<?php
$data=mysql_query("Select * from `queries` where oc=1 and cid ="."'".$_GET["value1"]."'"." Order By date_sub Desc");

while($tup=mysql_fetch_array($data)){
echo '<div class="hero-unit" style="padding-top:10px;" id="para">';
echo '<input type="hidden" name="hid" value="'.$tup[0].'" >';
echo '<h3 style="text-style:underline;"> Queries on  '; echo $_GET["category"]; echo'</h3>
    <h4>'.$tup[1].'</h4> 
<h5 style="float:left;">'.$tup[2].'</h5><br>';
echo '<form action="editor.php" method="POST" id="formid_'.$tup[0].'">
<input type="hidden" name="hid" value="'.$tup[0].'" >
<input type = "submit" class="btn" value="answer" name="answer" >
</form>';
echo '</div>';
echo '<div id="para"></div>';
}
?>
