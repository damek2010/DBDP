<?php
class AddU_m extends CI_Model {

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
						<center><legend>Nowy Użytkownik</legend></center>

						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">ID user</label>  
						  <div class="col-md-6">
						  <input id="textinput0" name="textinput0" type="text" placeholder="Wpisz ID user" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">Podaj hasło</label>  
						  <div class="col-md-6">
						  <input id="textinput0" name="textinput0" type="password" placeholder="Wpisz hasło" class="form-control input-md">
						    
						  </div>
						</div>

						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">Podaj imię</label>  
						  <div class="col-md-6">
						  <input id="textinput0" name="textinput0" type="text" placeholder="Wpisz imię" class="form-control input-md">
						    
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">Podaj nazwisko</label>  
						  <div class="col-md-6">
						  <input id="textinput0" name="textinput0" type="text" placeholder="Wpisz nazwisko" class="form-control input-md">
						    
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput3">Wybierz range </label>  
						  <div class="col-md-4">
						  <!--<input id="textinput3" name="textinput3" type="text" placeholder="Wybierz range" class="form-control input-md data">-->
						    ' . $this->projekty() . '
						   
						    <button id="button" name="button" class="btn btn-success">Dodaj range</button>
						  
						  </div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="button"></label>
						  <div class="col-md-4">
						    <button id="button" name="button" class="btn btn-success">Dodaj user</button>
						  </div>
						</div>
						</fieldset>
						</form> 
						<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
						<script>$(".data").mask("0000-00-00");</script>';
	}
}
