<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>User Login</title>
    <link rel="stylesheet" href="css/bootstrap.css"  type="text/css" /> 
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" class="cssdeck">
    <link rel="stylesheet" type="text/css" href="css/social-buttons.css"/>
  </head>
  <body>
<div id="fb-root" style="float:left; width:1px;"></div>
<script>
window.fbAsyncInit = function() {
	FB.init({
	    appId: '659237047431948',
        cookie: true,
       	xfbml: true,
        oauth: true
   });      
};
(function() {
	var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
}());

function fblogin(){
	FB.login(function(response){
	 if (response.authResponse) {
		  window.location='validatefb.php';
	 }
	},{scope: 'publish_stream'});
}
</script>
  		<script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/bootstrap.js"></script>

<div style="margin:auto 40px;">
<div class="img-rounded" style="width:100%; height:100px; background-image:url('./img/circle.png'); margin-bottom:10px;">
<h1 style="position:relative; top:30px; left:40px;"><a href="#">QueriesOverflow</a></h1>
</div>

   <div class="" id="loginModal">
	<div class="modal-header">
		<center><h3>User Login</h3></center>
</div>
	<div class="modal-body">
		<div class="well">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#login" data-toggle="tab">Login</a></li>
				<li><a href="#create" data-toggle="tab">Create Account</a></li>
			</ul>
				
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane active in" id="login">
				<form class="form-horizontal" action="validate.php" method="POST">
						<fieldset>
							<div id="legend">
								<legend class="">Login</legend>
							</div>    
							<div class="control-group">
								<label class="control-label"  for="username">Username</label>
								<div class="controls">
									<input type="text" id="username" name="uname" placeholder="" class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="password">Password</label>
								<div class="controls">
									<input type="password" id="password" name="password" placeholder="" class="input-xlarge">
								</div>
							</div>
							</fieldset>  
							<div class="control-group">	
								<div class="controls">
								<input type="submit" class="btn btn-success" value="login">
									
								</div>
							</div>
							</form>
						   <button class="btn btn-facebook" onClick="fblogin();" style="margin-left:180px">Connect with Facebook</button>  
				</div>
				<div class="tab-pane fade" id="create">
					<form id="tab" action="register.php" method="POST">
						<label>Username</label>
						<input type="text" value="" class="input-xlarge" name="uname">
						<label>Password</label>
						<input type="password" value="" class="input-xlarge" name="password">
						<label>Email</label>
						<input type="text" value="" class="input-xlarge" name="email">
						<label>Address</label>
						<textarea value="Smith" rows="3" class="input-xlarge" name="address">
						</textarea>
						<div>
							<!--<button class="btn btn-primary">Create Account</button> -->
						<input type="submit" class="btn btn-primary" value="Create Account">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> 
</div>
</div>
</body>
</html>

