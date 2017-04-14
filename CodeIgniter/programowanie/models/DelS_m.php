<?php
class DelS_m extends CI_Model {

	private $wynik;
	private $query;

        public function start()
        {
			$this->wynik = '';
			$pytanie = 'SELECT * FROM Sprinty;';
			$this->query = $this->db->query($pytanie);
			$this->edit();
			return $this->wynik;
        }
	
	private function ladowanie()
	{
		$vload = '';
		foreach ($this->query->result() as $row)
		{
			$vload .= '<option value="' . $row->id_sprintu . '">' . $row->id_sprintu . '</option></br>';
		}
		return $vload;
	}
	
	private function edit()
	{
		$this->wynik.= '<form class="form-horizontal" action="/ci/sprint_del_action" method="POST">
						<fieldset> 

						<!-- Form Name -->
						<center><legend>Usuwanie Sprintu</legend></center>
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="selectbasic">Wybierz Sprint</label>
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
