<?php
class EditZ_m extends CI_Model {

	private $wynik;
	private $query;
	private $queryP;
	private $queryS;
	private $src;

        public function start($src)
        {
			$this->wynik = '';
			$pytanie = 'SELECT * FROM Zadania z JOIN Stany s ON z.Stany_id_stanu=s.id_stanu;';
			$this->query = $this->db->query($pytanie);
			$pytanieP = 'SELECT * FROM Projekty;';
			$this->queryP = $this->db->query($pytanieP);
			$pytanieS = 'SELECT * FROM Stany;';
			$this->queryS = $this->db->query($pytanieS);
			$this->src = $src;
			$this->edit();
			$this->uzupelnienie();
			return $this->wynik;
        }
	
	private function uzupelnienie()
	{
		if(!empty($this->src))
		{
			foreach ($this->query->result() as $row)
			{
				if($row->id_zadania == $this->src)
				{
					$this->wynik .= '<script> 
						document.getElementById("textinput0").value = "' . $row->procent_wykoanania . '";
						document.getElementById("textinput1").value = "' . $row->czas_trwania . '";
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
							if(selectBox.options[i].value == "'. $row->Stany_id_stanu .'") {
								selectBox.options[i].selected = true; 
							}
						} 
						document.getElementById("textinput1").disabled=false;
						document.getElementById("textinput0").disabled=false;
						document.getElementById("textinput5").disabled=false;
						document.getElementById("textinput6").disabled=false;
						document.getElementById("button").disabled=false;
						document.getElementById("k1").disabled=false;
						document.getElementById("k2").disabled=false;
					</script>';
					if($row->kupka == 0) {
						$this->wynik.= '<script>document.getElementById("k1").checked = true;</script>';
					} else {
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
			if($row->id_zadania == $this->src)
			{
				$vload .= '<option selected="selected" value="' . $row->id_zadania . '">' . $row->id_zadania . '</option></br>';
			}
			else
			{
				$vload .= '<option value="' . $row->id_zadania . '">' . $row->id_zadania . '</option></br>';
			}
		}
		return $vload;
	}
	//onchange="alert(this.value);"
	
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
			$vload .= '<option value="' . $row->id_stanu . '">' . $row->wartosc . '</option></br>';
		}
		return $vload;
	}
	
	private function edit()
	{
		$this->wynik.= '<form class="form-horizontal" action="/ci/zadanie_edit_action" method="POST">
						<fieldset> 

						<!-- Form Name -->
						<center><legend>Edycja Zadania</legend></center>
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="selectbasic">Wybierz Zadanie</label>
						  <div class="col-md-6">
						    <select onchange="document.location=\'/ci/zadanie_edit/\'+this.value" id="selectbasic" name="selectbasic" class="form-control">
							<option value="">Wybierz zadanie</option></br>
						      ' . $this->ladowanie() . '
						    </select>
						  </div>
						</div>
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">Procent Wykoanania</label>  
						  <div class="col-md-6">
						  <input disabled="disable" id="textinput0" name="textinput0" type="text" placeholder="Wpisz Procent Wykoanania" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput1">Czas Trwania</label>
						  <div class="col-md-4">
						    <input disabled="disable" id="textinput1" name="textinput1" type="text" placeholder="Wybierz Czas Trwania" class="form-control input-md data">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput2">Kupka</label>  
						  <div class="col-md-4">
						  <!--<input disabled="disable" id="textinput2" name="textinput2" type="text" placeholder="Wybierz datę końca" class="form-control input-md data">-->
						    <div class="radio">
							<label><input type="radio" id="k1" name="kupka" value="0" disabled="disable" checked>Mała</label>
						</div>
						  <div class="radio">
							<label><input type="radio" id="k2" name="kupka" disabled="disable" value="1">Duża</label>
						</div>
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput5">Stan</label>  
						  <div class="col-md-6">
						  <select disabled="disable" id="textinput5" name="textinput5" class="form-control">
							<option value="">Wybierz Stan</option></br>
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