<?php
class EditS_m extends CI_Model {

	private $wynik;
	private $query;
	private $queryP;
	private $queryS;
	private $src;

        public function start($src)
        {
			$this->wynik = '';
			$pytanie = 'SELECT * FROM Sprinty;';
			$this->query = $this->db->query($pytanie);
			$pytanieP = 'SELECT * FROM Projekty;';
			$this->queryP = $this->db->query($pytanieP);
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
				if($row->id_sprintu == $this->src)
				{
					$this->wynik .= '<script> 
						document.getElementById("textinput1").value = "' . $row->poczatek . '";
						document.getElementById("textinput4").value = "' . $row->koniec . '";
						selectBox = document.getElementById("textinput6");
						selectBox.remove(0);
						for (var i = 0; i < selectBox.options.length; i++) 
						{ 
							if(selectBox.options[i].value == "'. $row->Projekty_id_projektu .'") {
								selectBox.options[i].selected = true; 
							}
						} 
						document.getElementById("textinput1").disabled=false;
						document.getElementById("textinput4").disabled=false;
						document.getElementById("textinput6").disabled=false;
						document.getElementById("button").disabled=false;
						document.getElementById("k1").disabled=false;
						document.getElementById("k2").disabled=false;
					</script>';
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
			if($row->id_sprintu == $this->src)
			{
				$vload .= '<option selected="selected" value="' . $row->id_sprintu . '">' . $row->id_sprintu . '</option></br>';
			}
			else
			{
				$vload .= '<option value="' . $row->id_sprintu . '">' . $row->id_sprintu . '</option></br>';
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
	
	private function edit()
	{
		$this->wynik.= '<form class="form-horizontal" action="/ci/sprint_edit_action" method="POST">
						<fieldset> 

						<!-- Form Name -->
						<center><legend>Edycja Sprintów</legend></center>
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="selectbasic">Wybierz Sprint</label>
						  <div class="col-md-6">
						    <select onchange="document.location=\'/ci/sprint_edit/\'+this.value" id="selectbasic" name="selectbasic" class="form-control">
							<option value="">Wybierz Sprint</option></br>
						      ' . $this->ladowanie() . '
						    </select>
						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput1">Czas Rozpoczęcia</label>
						  <div class="col-md-4">
						    <input disabled="disable" id="textinput1" name="textinput1" type="text" placeholder="Wybierz Czas Rozpoczęcia" class="form-control input-md data">
						    
						  </div>
						</div>
						
						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput4">Czas Zakończenia</label>
						  <div class="col-md-4">
						    <input disabled="disable" id="textinput4" name="textinput4" type="text" placeholder="Wybierz Czas Zakończenia" class="form-control input-md data">
						    
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