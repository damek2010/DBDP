<?php
class AddUO_m extends CI_Model {

	private $wynik;
	private $src;
	private $src2;

        public function start($src,$src2)
        {
			$this->wynik = '';
			$this->src = $src;
			$this->src2 = $src2;
			$this->add();
			return $this->wynik;
        }
	
	private function zadania() {
		
		$zapytanie = 'SELECT * FROM Zadania;';
		$query = $this->db->query($zapytanie);
		$idProj = '';
		foreach ($query->result() as $row) {
			$idProj = $row->Projekty_id_projektu;
		}
		$zadania = '<select class="form-control" id="zadania" name="zadania">';
		$zapytanie = 'SELECT * FROM Zadania WHERE Projekty_id_projektu = "'.$idProj.'";';
		$query = $this->db->query($zapytanie);
		foreach ($query->result() as $row) {
			$zadania.='<option value="' . $row->id_zadania . '">' . $row->id_zadania . '</option>';
		}
		$zadania.='</select>';
		return $zadania;
	}
	
	private function add()
	{
		$zapytanie = 'SELECT * FROM Uzytkownicy WHERE identyfikator="' . $this->src . '";';
		$query = $this->db->query($zapytanie);
		$imie = '';
		$nazwisko = '';
		foreach ($query->result() as $row) {
			$imie = $row->imie;
			$nazwisko = $row->nazwisko;
		}
		$this->wynik.= '<form class="form-horizontal" action="/ci/usero_add_action" method="POST">
						<fieldset>

						<!-- Form Name -->
						<center><legend>Nowa odpowiedzialność użytkownika:</legend></center>
						<center><legend>' . $imie . ' ' . $nazwisko . '</legend></center>
						
						<input id="textinput10" name="textinput10" type="hidden" class="form-control input-md" value="' . $this->src . '">
						<input id="textinput11" name="textinput11" type="hidden" class="form-control input-md" value="' . $this->src2 . '">
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">ID Odpowiedzialnosci</label>  
						  <div class="col-md-4">
						  <input id="textinput0" name="textinput0" type="text" placeholder="ID Odpowiedzialnosci" class="form-control input-md">
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput1">Data</label>  
						  <div class="col-md-4">
						  <input id="textinput1" name="textinput1" type="text" placeholder="Data" class="form-control input-md data">
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="aktualne">Aktualne</label>  
						  <div class="col-md-4">
						    <div class="radio">
							<label><input type="radio" id="k1" name="aktualne" value="1" checked>Aktualne</label>
						</div>
						  <div class="radio">
							<label><input type="radio" id="k2" name="aktualne" value="0">Nie Aktualne</label>
						</div>
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput3">Wybierz zadanie</label>  
						  <div class="col-md-4">
						    ' . $this->zadania() . '
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
