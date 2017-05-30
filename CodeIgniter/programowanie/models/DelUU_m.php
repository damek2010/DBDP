<?php
class DelUU_m extends CI_Model {

	private $wynik;
	private $query;
	private $src;

        public function start($src)
        {
			$this->wynik = '';
			$pytanie = 'SELECT * FROM Uczestnicy;';
			$this->query = $this->db->query($pytanie);
			$this->src = $src;
			$this->edit();
			return $this->wynik;
        }
	
	private function ladowanie()
	{
		$vload = '';
		foreach ($this->query->result() as $row)
		{
			if($row->Uzytkownicy_identyfikator == $this->src) {
				$vload .= '<option value="' . $row->id_uczestnicy . '">' . $row->id_uczestnicy . '</option></br>';
			}
		}
		return $vload;
	}
	
	private function edit()
	{
		$this->wynik.= '<form class="form-horizontal" action="/ci/useru_del_action" method="POST">
						<fieldset> 

						<input id="textinput10" name="textinput10" type="hidden" class="form-control input-md" value="' . $this->src . '">
						
						<!-- Form Name -->
						<center><legend>Usuwanie Uczestnictwa</legend></center>
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="selectbasic">Wybierz Uczestnictwo</label>
						  <div class="col-md-6">
						    <select id="selectbasic" name="selectbasic" class="form-control">
						      ' . $this->ladowanie() . '
						    </select>
						  </div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="button"></label>
						  <div class="col-md-4">
						    <button id="button" name="button" class="btn btn-warning">Usuń</button>
						  </div>
						</div>
						</fieldset>
						</form>';
	}
}
