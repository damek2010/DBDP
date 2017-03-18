<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Menu Projekty</title>
        <link href="layout/css/bootstrap.min.css" rel="stylesheet">
	<link href="layout/css/projekt_css.css" rel="stylesheet">
</head>

<body>
<div id="container">
	<div id="body">
		<div class="container">
			    <div class="row">
				<div class="col-md-12">
				    <div class="panel panel-primary">
					<div class="panel-logo">
						<center>
							<h1><img src="layout/images/logo.png">DBDP<h1>
						</center>
					</div>
					<div class="panel-heading">
					    <h3 class="panel-title">
						<span class="glyphicon glyphicon-list-alt"></span> PROJEKTY</h3>
					</div>
					<div class="panel-body">
					    <div class="row">
						<div class="col-xs-6 col-md-6">
						  <a href="projekt_add" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-plus"></span> <br/>Nowy</a>
						  <a href="projekt_look" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-search"></span> <br/>Wyświetl</a>
						  <a href="projekt_edit" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-retweet"></span> <br/>Edytuj</a>
						  <a href="#" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-trash"></span> <br/>Usuń</a>
						</div>
						<div class="col-xs-6 col-md-6">
						  <a href="#" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-knight"></span> <br/>Zadania</a>
						  <a href="#" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-repeat"></span> <br/>Sprinty</a>
						  <a href="/ci/" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>User</a>
						  <a href="wyloguj" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-off"></span> <br/>Wyloguj</a>
						</div>
					    </div>
					</div>
				  
					<div class="panel-heading">
					    <h3 class="panel-title">
						<span class="glyphicon glyphicon-cog"></span> KONSOLA</h3>
					</div>
					<div class="panel-body">
					    <div class="row">
						<form class="form-horizontal">
						<fieldset>

						<!-- Form Name -->
						<center><legend>Nowy Projekt</legend></center>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput">Nazwa projektu</label>  
						  <div class="col-md-6">
						  <input id="textinput" name="textinput" type="text" placeholder="Wpisz nazwę projeku" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="passwordinput">Data Startu</label>
						  <div class="col-md-4">
						    <input id="passwordinput" name="passwordinput" type="password" placeholder="Wybierz datę startu" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput">Data Końca</label>  
						  <div class="col-md-4">
						  <input id="textinput" name="textinput" type="text" placeholder="Wybierz datę końca" class="form-control input-md">
						    
						  </div>
						</div>
						
						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="button"></label>
						  <div class="col-md-4">
						    <button id="button" name="button" class="btn btn-success">Dodaj</button>
						  </div>
						</div>
						</fieldset>
						</form>
					    </div>
					</div>
				    </div>  
				</div>
				<div class="navbar navbar-default navbar-fixed-bottom">
					<div class="container">
						<p class="navbar-text pull-left">© 2017 DBDP SPRINT IS GOOOOD</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
