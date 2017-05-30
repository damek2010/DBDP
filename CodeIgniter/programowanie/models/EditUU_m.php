<?php
class EditUU_m extends CI_Model {

	private $wynik;
	private $query;
	private $queryP;
	private $queryS;
	private $src;
	private $src2;

        public function start($src,$src2)
        {
			$this->wynik = '';
			$pytanie = 'SELECT * FROM Uczestnicy';
			$this->query = $this->db->query($pytanie);
			$pytanieP = 'SELECT * FROM Projekty;';
			$this->queryP = $this->db->query($pytanieP);
			$pytanieS = 'SELECT * FROM Uzytkownicy;';
			$this->queryS = $this->db->query($pytanieS);
			$this->src = $src;
			$this->src2 = $src2;
			$this->edit();
			$this->uzupelnienie();
			return $this->wynik;
        }
	
	private function uzupelnienie()
	{
		if(!empty($this->src2))
		{
			foreach ($this->query->result() as $row)
			{
				if($row->id_uczestnicy == $this->src2)
				{
					$this->wynik .= '<script> 
						document.getElementById("textinput0").value = "' . $row->id_uczestnicy . '";
						selectBox = document.getElementById("textinput6");
						selectBox.remove(0);
						for (var i = 0; i < selectBox.options.length; i++) 
						{ 
							if(selectBox.options[i].value == "'. $row->Projekty_id_projektu .'") {
								selectBox.options[i].selected = true; 
							}
						} 
						selectBox = document.getElementById("textinput5");
						selectBox.remove(0);
						for (var i = 0; i < selectBox.options.length; i++) 
						{ 
							if(selectBox.options[i].value == "'. $row->Uzytkownicy_identyfikator .'") {
								selectBox.options[i].selected = true; 
							}
						} 
						document.getElementById("textinput0").disabled=false;
						document.getElementById("textinput5").disabled=false;
						document.getElementById("textinput6").disabled=false;					
						document.getElementById("button").disabled=false;
						document.getElementById("k1").disabled=false;
						document.getElementById("k2").disabled=false;
					</script>';
					if($row->Role_id_roli == "gr1") {
						$this->wynik.= '<script>document.getElementById("k1").checked = true;</script>';
					} else if($row->Role_id_roli == "pr1") {
						$this->wynik.= '<script>document.getElementById("k2").checked = true;</script>';
					}
					break;
				}
			}
		}
		$this->wynik .= '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
				<script>$(".data").mask("0000-00-00");</script>';
	}
	
	private function ladowanie()
	{
		$vload = '';
		foreach ($this->query->result() as $row)
		{
			if($row->id_uczestnicy == $this->src2)
			{
				$vload .= '<option selected="selected" value="' . $row->id_uczestnicy . '">' . $row->id_uczestnicy . '</option></br>';
			}
			else if($row->Uzytkownicy_identyfikator == $this->src)
			{
				$vload .= '<option value="' . $row->id_uczestnicy . '">' . $row->id_uczestnicy . '</option></br>';
			}
		}
		return $vload;
	}
	
	private function loadProject() {
		$vload = '';
		foreach ($this->queryP->result() as $row) {
			$vload .= '<option value="' . $row->id_projektu . '">' . $row->id_projektu . '</option></br>';
		}
		return $vload;
	}
	
	private function loadStatus() {
		$vload = '';
		foreach ($this->queryS->result() as $row) {
			$vload .= '<option value="' . $row->identyfikator . '">' . $row->identyfikator . '</option></br>';
		}
		return $vload;
	}
	
	private function edit()
	{
		$this->wynik.= '<form class="form-horizontal" action="/ci/userU_edit_action" method="POST">
						<fieldset> 

						<!-- Form Name -->
						<center><legend>Edycja Uczestnictwa</legend></center>
						
						<input id="textinput10" name="textinput10" type="hidden" class="form-control input-md" value="' . $this->src . '">
						<input id="textinput11" name="textinput11" type="hidden" class="form-control input-md" value="' . $this->src2 . '">
						
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="selectbasic">Wybierz Uczestnictwo</label>
						  <div class="col-md-6">
						    <select onchange="document.location=\'/ci/useru_edit/' . $this->src . '/\'+this.value" id="selectbasic" name="selectbasic" class="form-control">
							<option value="">Wybierz Uczestnictwo</option></br>
						      ' . $this->ladowanie() . '
						    </select>
						  </div>
						</div>
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">ID Uczestnictwa</label>  
						  <div class="col-md-6">
						  <input disabled="disable" id="textinput0" name="textinput0" type="text" placeholder="ID Uczestnictwa" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="rola">Rola</label>  
						  <div class="col-md-4">
						    <div class="radio">
							<label><input type="radio" id="k1" name="rola" value="gr1" disabled="disable" checked>Grafik</label>
						</div>
						  <div class="radio">
							<label><input type="radio" id="k2" name="rola" disabled="disable" value="pr1">Programista</label>
						</div>
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput5">Użytkownik</label>  
						  <div class="col-md-6">
						  <select disabled="disable" id="textinput5" name="textinput5" class="form-control">
							<option value="">Wybierz Użytkownika</option></br>
						      ' . $this->loadStatus() . '
						    </select>
						    
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput6">ID Projektu</label>  
						  <div class="col-md-6">
						  <select disabled="disable" id="textinput6" name="textinput6" class="form-control">
							<option value="">Wybierz ID Projektu</option></br>
						      ' . $this->loadProject() . '
						    </select>
						    
						  </div>
						</div>
						
						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="button"></label>
						  <div class="col-md-4">
						    <button disabled="disable" id="button" name="button" class="btn btn-warning">Edytuj</button>
						  </div>
						</div>
						</fieldset>
						</form>';
	}
}