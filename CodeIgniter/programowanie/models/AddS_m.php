<?php
class AddS_m extends CI_Model {

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
						<center><legend>Nowy Sprint</legend></center>

						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">ID sprintu</label>  
						  <div class="col-md-6">
						  <input id="textinput0" name="textinput0" type="text" placeholder="Wpisz ID sprintu" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput2">Data Rozpoczęcia</label>
						  <div class="col-md-4">
						    <input id="textinput2" name="textinput2" type="text" placeholder="Wybierz datę rozpoczęcia" class="form-control input-md data">
						  </div>
						</div>
						
						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput4">Data zakończenia</label>
						  <div class="col-md-4">
						    <input id="textinput4" name="textinput4" type="text" placeholder="Wybierz datę zakończenia" class="form-control input-md data">
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
