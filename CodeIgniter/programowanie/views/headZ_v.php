<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Menu Projekty</title>
        <link href="/ci/layout/css/bootstrap.min.css" rel="stylesheet">
	<link href="/ci/layout/css/projekt_css.css" rel="stylesheet">
	
	<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
	
	<!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
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
							<h1><img src="/ci/layout/images/logo.png">DBDP<h1>
						</center>
					</div>
					<div class="panel-heading">
					    <h3 class="panel-title">
						<span class="glyphicon glyphicon-knight"></span> ZADANIA</h3>
					</div>
					<?= $menu; ?>
					<div class="panel-heading">
					    <h3 class="panel-title">
						<span class="glyphicon glyphicon-cog"></span> KONSOLA</h3>
					</div>