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
		$projekty = '<select class="form-control" id="projekty" name="projekty">';
		$projekty.='<option value="A">Administrator</option>';
		$projekty.='<option value="U">Użytkownik</option>';
		$projekty.='</select>';
		return $projekty;
	}
	
	private function add()
	{
		$this->wynik.= '<form class="form-horizontal" action="user_add_action" method="POST">
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
						  <label class="col-md-4 control-label" for="textinput1">Podaj hasło</label>  
						  <div class="col-md-6">
						  <input id="textinput1" name="textinput1" type="password" placeholder="Wpisz hasło" class="form-control input-md">
						    
						  </div>
						</div>

						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput2">Podaj imię</label>  
						  <div class="col-md-6">
						  <input id="textinput2" name="textinput2" type="text" placeholder="Wpisz imię" class="form-control input-md">
						    
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput3">Podaj nazwisko</label>  
						  <div class="col-md-6">
						  <input id="textinput3" name="textinput3" type="text" placeholder="Wpisz nazwisko" class="form-control input-md">
						    
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="projekty">Wybierz range </label>  
						  <div class="col-md-6">
						    ' . $this->projekty() . '
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
