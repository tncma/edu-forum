<!DOCTYPE html>
<?php require_once('connect.php') ?>
<meta charset="utf-8"> 
<html>
<head>
<title>QueriesOverflow | Public</title>
<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
<style type="text/css">
.img-rounded {
  border-radius: 6px;
  
}

</style>
</head>
<body>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
$( document ).ready(function() {
$('#x li a').click(function(){
var x = $(this).attr('rel');
var y = $(this).text();

 $.ajax({ 
type: "GET",   
         url: "a1.php?value1="+x+"&category="+y,   
            dataType: "html",
         success: function(text1)
         {
            $('#para').html(text1);
         }
    });
});


});
 
//
  //  $(this).attr('rel'); // Get the ref attribute from the "a" element
//});
  </script>



<div style="margin:auto 40px;">
<div class=""container"">
<!-- -----------------------------------------------Header Begins-------------------------------------------- -->

<div class="img-rounded" style="width:100%; height:100px; background-image:url('./img/circle.png'); margin-bottom:10px;">
<h1 style="position:relative; top:30px; left:40px;"><a href="#">QueriesOverflow</a></h1>

</div>

<!-- ----------------------------------------------- Header Ends | Body Begins (Query) --------------------------------------- -->
<div class="hero-unit">
<div class="bs-example" style="position:relative; left:45%; width:55%;">
  <div class="navbar navbar-static">
        <div class="navbar-inner">
 <a href="#" class="brand">Select the type of Queries to Browse - </a>
            <ul role="navigation" class="nav">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" id="x">
<?php 
$result = mysql_query("SELECT * FROM categories");

while($tup = mysql_fetch_array($result)){
echo '<li><a href="#" rel="'.$tup[0].'">'.$tup[1].'</a></li>';
}
      ?>                  
                    </ul>
                </li>
            </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
<!-- ----------------------------------------------- Body Continues (Query) Ends | Answers (Begin) --------------------------- -->
<div id="para">

</div>

<!-- ----------------------------------------- Body Continues (Answers) Ends | TextBox for entering answers-------------------- -->

<!-- ----------------------------------------- Body  Ends---------------------------------------------------------------------- -->
<hr>
<div class="footer">
<p>&copy; 2013</p>
</div>
</div>
</div>
</body>
</html>
