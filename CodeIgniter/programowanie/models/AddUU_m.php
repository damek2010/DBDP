<?php
class AddUU_m extends CI_Model {

	private $wynik;

        public function start($src)
        {
			$this->wynik = '';
			$this->add($src);
			return $this->wynik;
        }
	
	private function projekty() {
		$projekty = '<select class="form-control" id="projekty" name="projekty">';
		$zapytanie = 'SELECT * FROM Projekty;';
		$query = $this->db->query($zapytanie);
		foreach ($query->result() as $row) {
			$projekty.='<option value="' . $row->id_projektu . '">' . $row->id_projektu . '</option>';
		}
		$projekty.='</select>';
		return $projekty;
	}
	
	private function add($src)
	{
		$zapytanie = 'SELECT * FROM Uzytkownicy WHERE identyfikator="' . $src . '";';
		$query = $this->db->query($zapytanie);
		$imie = '';
		$nazwisko = '';
		foreach ($query->result() as $row) {
			$imie = $row->imie;
			$nazwisko = $row->nazwisko;
		}
		$this->wynik.= '<form class="form-horizontal" action="/ci/useru_add_action" method="POST">
						<fieldset>
						
						<!-- Form Name -->
						<center><h4>Nowe uczestnictwo użytkownika:</h4></center>
						<center><legend>' . $imie . ' ' . $nazwisko . '</legend></center>
						
						<input id="textinput1" name="textinput1" type="hidden" class="form-control input-md" value="' . $src . '">
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">ID Uczestnictwa</label>  
						  <div class="col-md-4">
						  <input id="textinput0" name="textinput0" type="text" placeholder="ID Uczestnictwa" class="form-control input-md">
						    
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="rola">Rola</label>  
						  <div class="col-md-4">
						    <div class="radio">
							<label><input type="radio" id="k1" name="rola" value="gr1" checked>Grafik</label>
						</div>
						  <div class="radio">
							<label><input type="radio" id="k2" name="rola" value="pr1">Programista</label>
						</div>
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="projekty">Wybierz projekt</label>  
						  <div class="col-md-4">
						    ' . $this->projekty() . '
						  </div>
						</div>
						
						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="button"></label>
						  <div class="col-md-6">
						    <button id="button" name="button" class="btn btn-success">Dodaj</button>
						  </div>
						</div>
						</fieldset>
						</form> 
						<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
						<script>$(".data").mask("0000-00-00");</script>';
	}
}
