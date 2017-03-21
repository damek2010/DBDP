<?php
class Edit_m extends CI_Model {

	private $wynik;
	private $query;
	private $src;

        public function start($src)
        {
			$this->wynik = '';
			$pytanie = 'SELECT * FROM Projekty;';
			$this->query = $this->db->query($pytanie);
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
				if($row->id_projektu == $this->src)
				{
					$this->wynik .= '<script> 
						document.getElementById("textinput0").value = "' . $row->nazwa_projektu . '";
						document.getElementById("textinput1").value = "' . $row->data_startu . '";
						document.getElementById("textinput2").value = "' . $row->data_zakonczenia . '";
						document.getElementById("textinput1").disabled=false;
						document.getElementById("textinput0").disabled=false;
						document.getElementById("textinput2").disabled=false;
						document.getElementById("button").disabled=false;
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
			if($row->id_projektu == $this->src)
			{
				$vload .= '<option selected="selected" value="' . $row->id_projektu . '">' . $row->id_projektu . '</option></br>';
			}
			else
			{
				$vload .= '<option value="' . $row->id_projektu . '">' . $row->id_projektu . '</option></br>';
			}
		}
		return $vload;
	}
	//onchange="alert(this.value);"
	
	private function edit()
	{
		$this->wynik.= '<form class="form-horizontal" action="/ci/projekt_edit_action" method="POST">
						<fieldset> 

						<!-- Form Name -->
						<center><legend>Edycja Projektu</legend></center>
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="selectbasic">Wybierz Projekt</label>
						  <div class="col-md-6">
						    <select onchange="document.location=\'/ci/projekt_edit/\'+this.value" id="selectbasic" name="selectbasic" class="form-control">
							<option value="">Wybierz projekt</option></br>
						      ' . $this->ladowanie() . '
						    </select>
						  </div>
						</div>
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput0">Nazwa projektu</label>  
						  <div class="col-md-6">
						  <input disabled="disable" id="textinput0" name="textinput0" type="text" placeholder="Wpisz nazwę projeku" class="form-control input-md">
						    
						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput1">Data Startu</label>
						  <div class="col-md-4">
						    <input disabled="disable" id="textinput1" name="textinput1" type="text" placeholder="Wybierz datę startu" class="form-control input-md data">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="textinput2">Data Końca</label>  
						  <div class="col-md-4">
						  <input disabled="disable" id="textinput2" name="textinput2" type="text" placeholder="Wybierz datę końca" class="form-control input-md data">
						    
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
