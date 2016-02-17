<?php include("views/header.php"); ?>


 <html>
 <body style="background-color:#434343 ">

<div class="col-md-4 col-md-offset-3" style="top:60px ">

<h4 class="bg-danger"></h4>

<div class="well">
<h2 style="margin-left:110px;">Login</h2>


<form id="login-id" method="post" action="login/run">
	
<div class="form-group">
	<input type="text" class="form-control" name="username" placeholder="Username"  >

</div>

<div class="form-group">
	<input type="password" class="form-control" name="password" placeholder="Password" >
	
</div>


<div class="form-group">
      <div class="checkbox">
      	<input type="submit" name="submit" value="Login" class="btn btn-success" style="margin-left:240px; height:40px;">
      </div>


</div>


</form>

</div>

</div>

</body>

</html>