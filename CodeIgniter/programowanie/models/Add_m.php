<?php
class Add_m extends CI_Model {

	private $wynik;

        public function start()
        {
			$this->wynik = '';
			$this->add();
			return $this->wynik;
        }
	private function add()
	{
		$this->wynik.= '<form class="form-horizontal" action="projekt_add_action" method="POST">
						<fieldset>

						<!-- Form Name -->
						<center><legend>Nowy Projekt</legend></center>

						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">ID projektu</label>  
						  <div class="col-md-6">
						  <input id="textinput0" name="textinput0" type="text" placeholder="Wpisz ID projeku" class="form-control input-md">
						    
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput">Nazwa projektu</label>  
						  <div class="col-md-6">
						  <input id="textinput" name="textinput" type="text" placeholder="Wpisz nazwę projeku" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput2">Data Startu</label>
						  <div class="col-md-4">
						    <input id="textinput2" name="textinput2" type="text" placeholder="Wybierz datę startu" class="form-control input-md data">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput3">Data Końca</label>  
						  <div class="col-md-4">
						  <input id="textinput3" name="textinput3" type="text" placeholder="Wybierz datę końca" class="form-control input-md data">
						    
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
