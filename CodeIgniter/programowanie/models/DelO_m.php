<?php
class DelO_m extends CI_Model {

	private $wynik;
	private $query;
	private $src;
	private $src2;

        public function start($src,$src2)
        {
			$this->wynik = '';
			$pytanie = 'SELECT * FROM Odpowiedzialny WHERE Uczestnicy_id_uczestnicy = "'.$src2.'";';
			$this->query = $this->db->query($pytanie);
			$this->src = $src;
			$this->src2 = $src2;
			$this->edit();
			return $this->wynik;
        }
	
	private function ladowanie()
	{
		$vload = '';
		
		foreach ($this->query->result() as $row)
		{
			$vload .= '<option value="' . $row->Id_odpowiedzlnosci . '">' . $row->Zadania_id_zadania . '</option></br>';
		}
		
		return $vload;
	}
	
	private function edit()
	{
		$this->wynik.= '<form class="form-horizontal" action="/ci/usero_del_action" method="POST">
						<fieldset> 

						<!-- Form Name -->
						<center><legend>Usuwanie Zadań</legend></center>
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="selectbasic">Wybierz Zadanie</label>
						  <div class="col-md-6">
						    <select id="selectbasic" name="selectbasic" class="form-control">
						      ' . $this->ladowanie() . '
						    </select>
						  </div>
						</div>
						
						<input id="textinput10" name="textinput10" type="hidden" class="form-control input-md" value="' . $this->src . '">
						<input id="textinput11" name="textinput11" type="hidden" class="form-control input-md" value="' . $this->src2 . '">
						
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
