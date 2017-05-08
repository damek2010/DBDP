<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
	<link rel="stylesheet" type="text/css" href="ci/layout/zadanie_css.css" />
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="alert-message alert-message-success">
					<h3>Aktualności. Dziś jest <strong><?php echo date("d-m-Y"); ?></strong><h3>
					<!--<h4>Sprinty należące do projektu: <strong> Projekt A </strong></h4>
					<h4>Data realizacji projektu: <strong> 03.01.2017-04.04.2017 </strong></h4>
					<div class="progress">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
							aria-valuemin="0" aria-valuemax="100" style="width:40%">
							40% Czasu na realizacje projektu
						</div>
					</div>-->
					<?=$lookSC?>
					<h2>Adam Stegenda</h2>
					<h3>Lista odpowiedzialność i uczestnictwa</h3>
					
					<p>Wybierz interesującego użytkownika</p>
					<!--<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID uczestnicwa</th>
								<th>Nazwa projektu</th>
								<th>Data startu</th>
								<th>Data zakończenia</th>
								<th>Rola</th>
								<th>ID odpowiedzialności</th>
								<th>Data przydzielenia</th>
								<th>ID zadania</th>
								<th>Procent wykonania</th>
								<th>Czas trwania</th>
								<th>Kupka</th>
								<th>Stan</th>
								
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID uczestnicwa</th>
								<th>Nazwa projektu</th>
								<th>Data startu</th>
								<th>Data zakończenia</th>
								<th>Rola</th>
								<th>ID odpowiedzialności</th>
								<th>Data przydzielenia</th>
								<th>ID zadania</th>
								<th>Procent wykonania</th>
								<th>Czas trwania</th>
								<th>Kupka</th>
								<th>Stan</th>
							</tr>
						</tfoot>
						<tbody>
							
						</tbody>
					    </table>-->
					    <?=$look?>
				</div>
			</div>
		</div>
	<div>			     