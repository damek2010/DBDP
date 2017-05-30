<?php
class EditU_m extends CI_Model {

	private $wynik;
	private $query;
	private $queryP;
	private $queryS;
	private $src;

        public function start($src)
        {
			$this->wynik = '';
			$pytanie = 'SELECT * FROM Uzytkownicy;';
			$this->query = $this->db->query($pytanie);
			//$pytanieP = 'SELECT * FROM Projekty;';
			//$this->queryP = $this->db->query($pytanieP);
			//$pytanieS = 'SELECT * FROM Stany;';
			//$this->queryS = $this->db->query($pytanieS);
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
				if($row->identyfikator == $this->src)
				{
					$this->wynik .= '<script> 
						document.getElementById("textinput0").value = "' . $row->identyfikator . '";
						document.getElementById("textinput1").value = "' . $row->imie . '";
						document.getElementById("textinput7").value = "' . $row->haslo . '";
						document.getElementById("textinput8").value = "' . $row->nazwisko . '";
						document.getElementById("textinput1").disabled=false;
						document.getElementById("textinput0").disabled=false;
						document.getElementById("textinput8").disabled=false;
						document.getElementById("textinput7").disabled=false;
						document.getElementById("button").disabled=false;
						document.getElementById("k1").disabled=false;
						document.getElementById("k2").disabled=false;
					</script>';
					if($row->ranga == 'A') {
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
			if($row->identyfikator == $this->src)
			{
				$vload .= '<option selected="selected" value="' . $row->identyfikator . '">' . $row->identyfikator . '</option></br>';
			}
			else
			{
				$vload .= '<option value="' . $row->identyfikator . '">' . $row->identyfikator . '</option></br>';
			}
		}
		return $vload;
	}
	
	private function edit()
	{
		$this->wynik.= '<form class="form-horizontal" action="/ci/user_edit_action" method="POST">
						<fieldset> 

						<!-- Form Name -->
						<center><legend>Edycja Usera</legend></center>
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="selectbasic">Wybierz Usera</label>
						  <div class="col-md-6">
						    <select onchange="document.location=\'/ci/user_edit/\'+this.value" id="selectbasic" name="selectbasic" class="form-control">
							<option value="">Wybierz usera</option></br>
						      ' . $this->ladowanie() . '
						    </select>
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">Identyfikator</label>  
						  <div class="col-md-6">
						  <input disabled="disable" id="textinput0" name="textinput0" type="text" placeholder="Wpisz Identyfikator" class="form-control input-md">
						    
						  </div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput7">Hasło</label>  
						  <div class="col-md-6">
						  <input disabled="disable" id="textinput7" name="textinput7" type="text" placeholder="Hasło" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput1">Imie</label>
						  <div class="col-md-4">
						    <input disabled="disable" id="textinput1" name="textinput1" type="text" placeholder="Wpisz Imie" class="form-control input-md">
						    
						  </div>
						</div>
						
						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput8">Nazwisko</label>
						  <div class="col-md-4">
						    <input disabled="disable" id="textinput8" name="textinput8" type="text" placeholder="Wpisz Nazwisko" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput2">Ranga</label>  
						  <div class="col-md-4">
						    <div class="radio">
							<label><input type="radio" id="k1" name="ranga" value="A" disabled="disable">Administrator</label>
						</div>
						  <div class="radio">
							<label><input type="radio" id="k2" name="ranga" disabled="disable" value="U" checked>Użytkownik</label>
						</div>
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