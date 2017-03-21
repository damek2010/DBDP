<?php
class Del_m extends CI_Model {

	private $wynik;
	private $query;

        public function start()
        {
			$this->wynik = '';
			$pytanie = 'SELECT * FROM Projekty;';
			$this->query = $this->db->query($pytanie);
			$this->edit();
			return $this->wynik;
        }
	
	private function ladowanie()
	{
		$vload = '';
		foreach ($this->query->result() as $row)
		{
			$vload .= '<option value="' . $row->id_projektu . '">' . $row->id_projektu . '</option></br>';
		}
		return $vload;
	}
	
	private function edit()
	{
		$this->wynik.= '<form class="form-horizontal" action="/ci/projekt_del_action" method="POST">
						<fieldset> 

						<!-- Form Name -->
						<center><legend>Edycja Projektu</legend></center>
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="selectbasic">Wybierz Projekt</label>
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
