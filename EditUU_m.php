<?php
class AddUU_m extends CI_Model {

	private $wynik;

        public function start()
        {
			$this->wynik = '';
			$this->add();
			return $this->wynik;
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
		$this->wynik.= '<form class="form-horizontal" action="sprint_add_action" method="POST">
						<fieldset>

						<!-- Form Name -->
						<center><legend>Nowe uczestnictwo użytkownika:</legend></center>
						<center><legend>Adam Stegenda</legend></center>
						
						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput4">Data przydzielenia</label>
						  <div class="col-md-4">
						    <input id="textinput4" name="textinput4" type="text" placeholder="Wybierz datę przydzielenia" class="form-control input-md data">
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput3">Wybierz projekt</label>  
						  <div class="col-md-4">
						  <!--<input id="textinput3" name="textinput3" type="text" placeholder="ID projektu" class="form-control input-md data">-->
						    ' . $this->projekty() . '
						  </div>
						</div>
						

						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="button"></label>
						  <div class="col-md-6">
						    <button id="button" name="button" class="btn btn-success">Dodaj uczestnictwo</button>
						  </div>
						</div>
						</fieldset>
						</form> 
						<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
						<script>$(".data").mask("0000-00-00");</script>';
	}
}
