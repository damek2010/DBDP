<?php
class EditUO_m extends CI_Model {

	private $wynik;
	private $query;
	private $queryP;
	private $queryS;
	private $src;
	private $src2;
	private $src3;

        public function start($src,$src2,$src3)
        {
			$this->wynik = '';
			$pytanie2 = 'SELECT * FROM Uczestnicy WHERE id_uczestnicy = "'. $src2 .'"';
			$query2 = $this->db->query($pytanie2);
			$idProj = '';
			foreach ($query2->result() as $row) {
				$idProj = $row->Projekty_id_projektu;
			}
			$pytanie = 'SELECT * FROM Odpowiedzialny';
			$this->query = $this->db->query($pytanie);
			$pytanieP = 'SELECT * FROM Zadania WHERE Projekty_id_projektu = "'.$idProj.'";';
			$this->queryP = $this->db->query($pytanieP);
			$pytanieS = 'SELECT * FROM Uzytkownicy;';
			$this->queryS = $this->db->query($pytanieS);
			$this->src = $src;
			$this->src2 = $src2;
			$this->src3 = $src3;
			$this->edit();
			$this->uzupelnienie();
			return $this->wynik;
        }
	
	private function uzupelnienie()
	{
		if(!empty($this->src3))
		{
			foreach ($this->query->result() as $row)
			{
				if($row->Id_odpowiedzlnosci == $this->src3)
				{echo $row->Zadania_id_zadania;
					$this->wynik .= '<script> 
						document.getElementById("textinput0").value = "' . $row->Id_odpowiedzlnosci . '";
						document.getElementById("textinput1").value = "' . $row->data . '";
						selectBox = document.getElementById("textinput6");
						selectBox.remove(0);
						for (var i = 0; i < selectBox.options.length; i++) 
						{ 
							if(selectBox.options[i].value == "'. $row->Zadania_id_zadania .'") {
								selectBox.options[i].selected = true; 
							}
						} 
						document.getElementById("textinput0").disabled=false;
						document.getElementById("textinput6").disabled=false;					
						document.getElementById("textinput1").disabled=false;					
						document.getElementById("button").disabled=false;
						document.getElementById("k1").disabled=false;
						document.getElementById("k2").disabled=false;
					</script>';
					if($row->aktualne == "1") {
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
			if($row->Id_odpowiedzlnosci == $this->src3)
			{
				$vload .= '<option selected="selected" value="' . $row->Id_odpowiedzlnosci . '">' . $row->Id_odpowiedzlnosci . '</option></br>';
			}
			else
			{
				$vload .= '<option value="' . $row->Id_odpowiedzlnosci . '">' . $row->Id_odpowiedzlnosci . '</option></br>';
			}
		}
		return $vload;
	}
	
	private function loadProject() {
		$vload = '';
		foreach ($this->queryP->result() as $row) {
			$vload .= '<option value="' . $row->id_zadania . '">' . $row->id_zadania . '</option></br>';
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
		$this->wynik.= '<form class="form-horizontal" action="/ci/usero_edit_action" method="POST">
						<fieldset> 

						<!-- Form Name -->
						<center><legend>Edycja Uczestnictwa</legend></center>
						
						<input id="textinput10" name="textinput10" type="hidden" class="form-control input-md" value="' . $this->src . '">
						<input id="textinput11" name="textinput11" type="hidden" class="form-control input-md" value="' . $this->src2 . '">
						
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="selectbasic">Wybierz Odpowiedzialność</label>
						  <div class="col-md-6">
						    <select onchange="document.location=\'/ci/usero_edit/' . $this->src . '/'.$this->src2.'/\'+this.value" id="selectbasic" name="selectbasic" class="form-control">
							<option value="">Wybierz Odpowiedzialność</option></br>
						      ' . $this->ladowanie() . '
						    </select>
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">ID Odpowiedzialności</label>  
						  <div class="col-md-6">
						  <input disabled="disable" id="textinput0" name="textinput0" type="text" placeholder="ID Odpowiedzialności" class="form-control input-md">
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput1">Data</label>  
						  <div class="col-md-6">
						  <input disabled="disable" id="textinput1" name="textinput1" type="text" placeholder="Data" class="form-control input-md data">
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="aktualne">Aktualne</label>  
						  <div class="col-md-4">
						    <div class="radio">
							<label><input type="radio" id="k1" name="aktualne" value="1" disabled="disable" checked>Aktualne</label>
						</div>
						  <div class="radio">
							<label><input type="radio" id="k2" name="aktualne" disabled="disable" value="0">Nieaktualne</label>
						</div>
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput6">ID Zadania</label>  
						  <div class="col-md-6">
						  <select disabled="disable" id="textinput6" name="textinput6" class="form-control">
							<option value="">Wybierz ID Zadania</option></br>
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
						</form>
						<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
						<script>$(".data").mask("0000-00-00");</script>';
	}
}