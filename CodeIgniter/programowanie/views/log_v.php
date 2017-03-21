<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Logowanie</title>
    <link href="layout/css/bootstrap.min.css" rel="stylesheet">
    <link href="layout/css/log_css.css" rel="stylesheet">
</head>
<body>

<div id="container">
	 

	<div id="body">

		
		
								<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
						<div class="main">
						    
						    
						    <div class="container">
						<center>
						<div class="middle">
						      <div id="login">

							<form action="/ci/" method="POST" accept-charset="utf-8">

							  <fieldset class="clearfix">

							    <p ><span class="fa fa-user"></span><input name="login" type="text"  Placeholder="Login" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
							    <p><span class="fa fa-lock"></span><input name="password" type="password"  Placeholder="Hasło" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
							    
							     <div>
									
										<span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Zaloguj się"></span>
										<p style="font-size: 20px; color: white;"><br />Login: 1111<br />Hasło: 1111</p>
									    </div>

							  </fieldset>
						<div class="clearfix"></div>
							</form>

							<div class="clearfix"></div>

						      </div> <!-- end login -->
						      <div class="logo"> 
								<img src="layout/images/logo.png">
								DBDP
							  <div class="clearfix"></div>
						      </div>
						      
						      </div>
						</center>
						    </div>

						</div>
		
		
		
		
		
		
		
		
		
		
		
		
</div>
			<script src="http://code.jquery.com/jquery.js"></script>
			<script src="layout/js/bootstrap.min.js"></script>
</body>
</html>
