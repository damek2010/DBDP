<?php
class AddZ_m extends CI_Model {

	private $wynik;

        public function start()
        {
			$this->wynik = '';
			$this->add();
			return $this->wynik;
        }
	
	private function stany() {
		$stany = '<div class="form-group">
				<select class="form-control" id="stany" name="stany">';
		$zapytanie = 'SELECT * FROM Stany;';
		$query = $this->db->query($zapytanie);
		foreach ($query->result() as $row) {
			$stany.='<option value="' . $row->id_stanu . '">' . $row->wartosc . '</option>';
		}
		$stany.='</select></div>';
		return $stany;
	}
	
	private function projekty() {
		$projekty = '<div class="form-group">
				<select class="form-control" id="projekty" name="projekty">';
		$zapytanie = 'SELECT * FROM Projekty;';
		$query = $this->db->query($zapytanie);
		foreach ($query->result() as $row) {
			$projekty.='<option value="' . $row->id_projektu . '">' . $row->id_projektu . '</option>';
		}
		$projekty.='</select></div>';
		return $projekty;
	}
	
	private function add()
	{
		$this->wynik.= '<form class="form-horizontal" action="zadanie_add_action" method="POST">
						<fieldset>

						<!-- Form Name -->
						<center><legend>Nowe Zadanie</legend></center>

						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">ID zadania</label>  
						  <div class="col-md-6">
						  <input id="textinput0" name="textinput0" type="text" placeholder="Wpisz ID zadania" class="form-control input-md">
						    
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput">Procent wykonania</label>  
						  <div class="col-md-6">
						  <input id="textinput" name="textinput" type="text" placeholder="Procent wykonania" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput2">Data</label>
						  <div class="col-md-4">
						    <input id="textinput2" name="textinput2" type="text" placeholder="Wybierz datę wykonania" class="form-control input-md data">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput3">Kupka</label>  
						  <div class="col-md-4">
						  <!--<input id="textinput3" name="textinput3" type="text" placeholder="Kupka" class="form-control input-md data">-->
						  <div class="radio">
							<label><input type="radio" name="kupka" value="0" checked>Mała</label>
						</div>
						  <div class="radio">
							<label><input type="radio" name="kupka" value="1">Duża</label>
						</div>
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput3">Stan</label>  
						  <div class="col-md-4">
						  <!--<input id="textinput3" name="textinput3" type="text" placeholder="Stan" class="form-control input-md data">-->
						    ' . $this->stany() . '
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput3">ID projektu</label>  
						  <div class="col-md-4">
						  <!--<input id="textinput3" name="textinput3" type="text" placeholder="ID projektu" class="form-control input-md data">-->
						    ' . $this->projekty() . '
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
						<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
						<script>$(".data").mask("0000-00-00");</script>';
	}
}
